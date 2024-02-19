<?php

class Home extends Controller{
    public function index(): void
    {
        $this->view('home');
    }

    public function events($id = null, $method = null): void
    {

        $event = new Event();
        $data['record'] = $event->query("
            SELECT *
            FROM event
            WHERE status != 'Pending'
        ");

        if(empty($id)) $this->view('events', $data);
        else {
            if(empty($method)) {
                $this->view('common/events/details');
            } else if($method == "pay") {

                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    // Constants
                    $merchant_id = "1224517";
                    $merchant_secret = "MTAyMTQ4NTEyNzM0ODAwNzU2NDgxODk4ODgyNzQyMjg1ODU1NjA4OQ==";
                    $currency = "LKR";

                    $_POST['user_id'] = Auth::getUser_id();
                    $_POST['event_id'] = $id;
                    $_POST['amount'] = $_POST['tickets'] * $_POST['count'];

                    $payment = new Payment();
                    $payment->insert($_POST);
                    $order = $payment->first(['event_id' => $_POST['event_id'], 'user_id' => $_POST['user_id']]);

                    $ticket = new Tickets();

                    $ticket_secret = "AkilaHansiThisaraNipun";

                    $params = [
                        'event_id' => $id,
                        'user_id' => Auth::getUser_id(),
                        'hash' => 'hash',
                        'type' => 'default',
                        'price' => $_POST['tickets']
                    ];
                    $ticket->insert($params);
                    $ticket_id = $ticket->query("SELECT * FROM tickets WHERE user_id = :user_id AND event_id = :event_id ORDER BY ticket_id DESC", ['user_id' => Auth::getUser_id(), 'event_id' => $id])[0]->ticket_id ?: NULL;

                    $generated_hash = strtoupper(
                        md5(
                            $ticket_id .
                            $id .
                            Auth::getUser_id() .
                            'default' .
                            $_POST['tickets'] .
                            strtoupper(md5($ticket_secret))
                        )
                    );

                    $ticket->update($ticket_id, ['hash' => $generated_hash, 'ticket_id' => $ticket_id]);

                    if(empty($order)) {
                        message("Order Creation Failed - Payment was not performed");
                        redirect('home/events');
                    }

                    $amount = $_POST['amount'];
                    $order_id = rand(10, 1000).$_POST['amount'];

                    $data['event_id'] = $id;
                    $data['order_id'] = $order_id;
                    $data['merchant_id'] = $merchant_id;
                    $data['amount'] = $amount;
                    $data['hash'] = strtoupper(
                        md5(
                            $merchant_id .
                            $order_id .
                            number_format($amount, 2, '.', '') .
                            $currency .
                            strtoupper(md5($merchant_secret))
                        )
                    );

                    $this->view("common/events/buy-tickets-confirm", $data);
                } else {
                    $this->view("common/events/buy-tickets", $data);
                }
            } else if($method = "return") {
                message("Failed");
                $this->view('common/events/buy-tickets');
            } else if($method = "notify") {
                $merchant_id         = $_POST['merchant_id'];
                $order_id            = $_POST['order_id'];
                $payhere_amount      = $_POST['payhere_amount'];
                $payhere_currency    = $_POST['payhere_currency'];
                $status_code         = $_POST['status_code'];
                $md5sig              = $_POST['md5sig'];

                $merchant_secret = 'MTAyMTQ4NTEyNzM0ODAwNzU2NDgxODk4ODgyNzQyMjg1ODU1NjA4OQ=='; // Replace with your Merchant Secret

                $local_md5sig = strtoupper(
                    md5(
                        $merchant_id .
                        $order_id .
                        $payhere_amount .
                        $payhere_currency .
                        $status_code .
                        strtoupper(md5($merchant_secret))
                    )
                );

                if(($local_md5sig === $md5sig) AND ($status_code == 2) ){
                    message("Payment Successful");
                    $payment = new Payment();

                    $_POST['user_id'] = Auth::getUser_id();
                    $_POST['event_id'] = $id;
                    $_POST['amount'] = $_POST['tickets'] * $_POST['count'];

                    $payment->insert($_POST);
                } else {
                    message("Payment Failed");
                }

                $this->view('common/events/buy-tickets');
            }
        }
    }

    public function ads($method = null, $id = null): void
    {

        if($_SERVER['REQUEST_METHOD'] == "PATCH") {
            // Content
            $json_data = file_get_contents("php://input");

            // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
            $php_data = json_decode($json_data);


            $ad = new Ad();
            $data = $ad->first(['ad_id' => $php_data->ad_id]);

            $user_id = $data->user_id;
//            show($data);

            $ad->update($php_data->ad_id, ['ad_id' => $php_data->ad_id,'views' => ($data->views+1)]);

            // Get current month and year
            $currentYear = date('Y');
            $currentMonth = date('n');

            $views = new Ad_view();
            $ad_view = $views->first(['user_id' => $user_id, 'month' => $currentMonth, 'year' => $currentYear]) ?: NULL;

//            show($ad_view);

            if($ad_view) {
                $views->update($ad_view->id, ['count' => $ad_view->count+1, 'id' => $ad_view->id]);
            } else {
                $views->insert(['user_id' => $user_id, 'count' => $data->views+1, 'month' => $currentMonth, 'year' => $currentYear]);
            }

            die;
        }

        // get_all_ads() function is declared in the controller within the core folder
        $data = get_all_ads();

        $this->view('pages/advertisements/ads', $data);
    }

    public function complaint($method=NULL, $id = null): void
    {

        if(empty($method))
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $_POST['user_id'] = Auth::getUser_id();
                $complain = new Complaint();
                $complain->insert($_POST);
                message("Complaint Created Successfully");
                redirect('support');
            }

            $this->view('pages/complaints/create_complaint');
        }
        else if($method == "list_complaint")
        {

            $complain = new Complaint();
            $data['complaints'] = (Auth::is_admin() || Auth::is_cca()) ? $complain->get_all() : $complain->where(['user_id'=>Auth::getUser_id()]);

            $this->view('pages/complaints/list_complaint', $data);
        }
        else if($method == "update_complaint")
        {
            if(empty($id)) {
                message("No complaint selected");
                redirect('support');
            }

            $complain = new Complaint();

            if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $db = new Database();
                $_POST['comp_id'] = $id;
                $db->query("UPDATE complaints SET details = :details WHERE comp_id = :comp_id", $_POST);
                message("Complaint Updated Successfully");
                redirect('support');
            }


            $data['row'] = $complain->first(['comp_id'=>$id]);

            $this->view('pages/complaints/update_complaint', $data);
        }
        else if($method == "delete_complaint") {
            if ($_SERVER['REQUEST_METHOD'] == "GET")
            {
                $db = new Database();
                $_POST['comp_id'] = $id;
                $db->query("DELETE FROM complaints WHERE comp_id = :comp_id", $_POST);
                message("Complaint Deleted Successfully");
                redirect('support');
            }
        }
    }

//    notification
    public function notification(): void
    {
        if($_SERVER['REQUEST_METHOD'] == 'PATCH'){
            $notify = new Notifications();
            $notifications = $notify->where(['user_id'=>Auth::getUser_id()]);

            if (!empty($notifications)) {
                echo json_encode($notifications); // Encode retrieved data as JSON
            } else {
                echo "no-new-notifications";
            }
        }else if($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $json_data = file_get_contents("php://input");
            // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
            $php_data = json_decode($json_data);//json object

            $notify = new Notifications();
            $dataToUpdate = ['viewed' => 1];
            $notify->update($php_data->notification_id,$dataToUpdate);
            echo "Notification viewed status updated successfully.";

            }

    }

}