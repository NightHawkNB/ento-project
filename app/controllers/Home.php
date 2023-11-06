<?php

class Home extends Controller{
    public function index() {
        $this->view('home');
    }

    public function events($id = null, $method = null) {

        $event = new Event();
        $data['record'] = $event->where(['pending' => 0]);

        if(empty($id)) $this->view('events', $data);
        else if (is_numeric($id)) {
            if(empty($method)) {
                $this->view('common/events/details');
            } else if($method == "pay") {

                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    // Constants
                    $merchant_id = "1224517";
                    $merchant_secret = "MTAyMTQ4NTEyNzM0ODAwNzU2NDgxODk4ODgyNzQyMjg1ODU1NjA4OQ==";
                    $currency = "LKR";

//                    $_POST['user_id'] = Auth::getUser_id();
                    $_POST['event_id'] = $id;
                    $_POST['amount'] = $_POST['tickets'] * $_POST['count'];

                    $payment = new Payment();
//                    $payment->insert($_POST);
//                    $order = $payment->first(['event_id' => $_POST['event_id'], 'user_id' => $_POST['user_id']]);
//                    if(empty($order)) {
//                        message("Order Creation Failed - Payment was not performed");
//                        redirect('home/events');
//                    }

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
        } else {
            message("No such page exists");
            redirect('home/events');
        }
    }

    public function ads($method = null, $id = null) {

        $data = get_all_ads();

        $this->view('pages/ads', $data);
    }

    public function complaint($method=NULL, $id = null) {

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

}