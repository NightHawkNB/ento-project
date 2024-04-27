<?php

class Home extends Controller
{
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


        if (empty($id)) $this->view('events', $data);

        else if (empty($method)) {
            $data['event'] = $event->query("
            SELECT *
            FROM event 
            WHERE event_id = :event_id
        ", ['event_id' => $id])[0];

            $data['venue'] = $event->query("
           SELECT
           V.name AS venue_name,
           V.image AS venue_image,
           E.custom_venue
           FROM event E
           JOIN venue V ON E.venue_id = V.venue_id
           WHERE event_id = :event_id
       ", ['event_id' => $id]);
            $data['venue'] = (!empty($data['venue'])) ? $data['venue'][0] : NULL;

            $data['band'] = $event->query("
           SELECT 
           CONCAT(U.fname,' ',U.lname) AS band_name,
           U.image AS band_image,   
           E.custom_band
           FROM event E
           JOIN band B ON E.band_id = B.band_id
           JOIN serviceprovider SP ON B.sp_id = SP.sp_id
           JOIN user U ON SP.user_id = U.user_id
           WHERE event_id = :event_id
       ", ['event_id' => $id]);
            $data['band'] = (!empty($data['band'])) ? $data['band'][0] : NULL;

            $data['singers'] = $event->query("
           SELECT 
           CONCAT(U.fname, ' ', U.lname) AS singer_name,
           U.image AS singer_image
           FROM event E
           JOIN event_singer ES ON E.event_id = ES.event_id
           JOIN singer S ON ES.singer_id = S.singer_id
           JOIN serviceprovider SP ON S.sp_id = SP.sp_id
           JOIN user U ON SP.user_id = U.user_id
           WHERE E.event_id = :event_id
       ", ['event_id' => $id]);


            $this->view('common/events/details', $data);


        } else if ($method == "pay") {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                // Constants
                $merchant_id = "1224517";
                $merchant_secret = "MTAyMTQ4NTEyNzM0ODAwNzU2NDgxODk4ODgyNzQyMjg1ODU1NjA4OQ==";
                $currency = "LKR";

                $_POST['user_id'] = Auth::getUser_id();
                $_POST['event_id'] = $id;
                $_POST['amount'] = $_POST['tickets'] * $_POST['count'];
                $_POST['type'] = 'default';

                $payment = new Payment();
                $payment->insert($_POST);
                $order = $payment->first(['event_id' => $_POST['event_id'], 'user_id' => $_POST['user_id']]);

                $ticket = new Tickets();

                $ticket_secret = "AkilaHansiThisaraNipun";

                $ticket_data = $ticket->query("
                    SELECT * 
                    FROM tickets T
                    JOIN all_tickets AT ON T.ticket_id = AT.ticket_id
                    WHERE AT.status = 'New' LIMIT 1
                ")[0] ?: NULL;

                $generated_hash = strtoupper(
                    md5(
                        $ticket_data->ticket_id .
                        $_POST['event_id'] .
                        Auth::getUser_id() .
                        $ticket_data->type .
                        $ticket_data->price .
                        strtoupper(md5($ticket_secret))
                    )
                );

                $ticket->update($ticket_data->ticket_id, ['hash' => $generated_hash, 'ticket_id' => $ticket_data->ticket_id]);

                if (empty($order)) {
                    message("Order Creation Failed - Payment was not performed");
                    redirect('home/events');
                }

                $amount = $_POST['amount'];
                $order_id = "ODR_" . rand(10, 1000);

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
        }elseif ($method = "return") {
                message("Failed");
                $this->view('common/events/buy-tickets');
            } else if ($method = "notify") {
                $merchant_id = $_POST['merchant_id'];
                $order_id = $_POST['order_id'];
                $payhere_amount = $_POST['payhere_amount'];
                $payhere_currency = $_POST['payhere_currency'];
                $status_code = $_POST['status_code'];
                $md5sig = $_POST['md5sig'];

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

                if (($local_md5sig === $md5sig) and ($status_code == 2)) {
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

        public
        function ads($method = null, $id = null): void
        {

            if ($_SERVER['REQUEST_METHOD'] == "PATCH") {
                // Content
                $json_data = file_get_contents("php://input");

                // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
                $php_data = json_decode($json_data);


                $ad = new Ad();
                $data = $ad->first(['ad_id' => $php_data->ad_id]);

                $user_id = $data->user_id;
//            show($data);

                $ad->update($php_data->ad_id, ['ad_id' => $php_data->ad_id, 'views' => ($data->views + 1)]);

                // Get current month and year
                $currentYear = date('Y');
                $currentMonth = date('n');

                $views = new Ad_view();
                $ad_view = $views->first(['user_id' => $user_id, 'month' => $currentMonth, 'year' => $currentYear]) ?: NULL;

//            show($ad_view);

                if ($ad_view) {
                    $views->update($ad_view->id, ['count' => $ad_view->count + 1, 'id' => $ad_view->id]);
                } else {
                    $views->insert(['user_id' => $user_id, 'count' => $data->views + 1, 'month' => $currentMonth, 'year' => $currentYear]);
                }

                die;
            }

            // get_all_ads() function is declared in the controller within the core folder
            $data = get_all_ads();

//            show($data);
//            die;

            $this->view('pages/advertisements/ads', $data);
        }

        public
        function complaint($method = NULL, $id = null): void
        {

            if (empty($method)) {
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $_POST['user_id'] = Auth::getUser_id();
                    $complain = new Complaint();
                    $complain->insert($_POST);
                    message("Complaint Created Successfully");
                    redirect('support');
                }

                $this->view('pages/complaints/create_complaint');
            } else if ($method == "list_complaint") {

                $complain = new Complaint();
                $data['complaints'] = (Auth::is_admin() || Auth::is_cca()) ? $complain->get_all() : $complain->where(['user_id' => Auth::getUser_id()]);

                $this->view('pages/complaints/list_complaint', $data);
            } else if ($method == "update_complaint") {
                if (empty($id)) {
                    message("No complaint selected");
                    redirect('support');
                }

                $complain = new Complaint();

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $db = new Database();
                    $_POST['comp_id'] = $id;
                    $db->query("UPDATE complaints SET details = :details WHERE comp_id = :comp_id", $_POST);
                    message("Complaint Updated Successfully");
                    redirect('support');
                }


                $data['row'] = $complain->first(['comp_id' => $id]);

                $this->view('pages/complaints/update_complaint', $data);
            } else if ($method == "delete_complaint") {
                if ($_SERVER['REQUEST_METHOD'] == "GET") {
                    $db = new Database();
                    $_POST['comp_id'] = $id;
                    $db->query("DELETE FROM complaints WHERE comp_id = :comp_id", $_POST);
                    message("Complaint Deleted Successfully");
                    redirect('support');
                }
            }
        }

//    notification
        public
        function notification($method = NULL): void
        {
            if (empty($method)) {
                $this->view('common/notifications');
            } else if ($_SERVER['REQUEST_METHOD'] == 'PATCH' && $method == 'fetch') {
                $result = [];
                $reservation_notifications = [];
                $reminder_notifications = [];
                $db = new database();
//for type = Reservation(Res_Accepted,Res_Denied)
                $reservation_notifications = $db->query("SELECT *,
                rr.type AS reservation_type,
                n.type AS type
                FROM
                notifications n
                JOIN resrequest rr
                ON n.id= rr.reservation_id
                JOIN ads a
                ON rr.ad_id = a.ad_id
                WHERE (n.user_id = :user_id AND (n.type = 'Res_Accepted' OR n.type = 'Res_Denied'))", ['user_id' => Auth::getUser_id()]);
                if ($reservation_notifications !== false) {
                    foreach ($reservation_notifications as $reservation_notification) {
                        $result[] = $reservation_notification;
                    }
                }
//for type = Reminder
                $reminder_notifications = $db->query("SELECT *,
                rr.type AS reservation_type,
                n.type AS type
                FROM
                notifications n
                JOIN reservations r
                ON n.id= r.reservation_id
                JOIN resrequest rr
                ON r.reservation_id = rr.reservation_id
                JOIN ads a
                ON rr.ad_id = a.ad_id
                WHERE n.user_id = :user_id && n.type = 'Reminder'", ['user_id' => Auth::getUser_id()]);
                if ($reminder_notifications !== false) {
                    foreach ($reminder_notifications as $reminder_notification) {
                        $result[] = $reminder_notification;
                    }
                }
//for type = other
                $notify = new Notifications();
                $other_notifications = $notify->query("
                SELECT *
                FROM notifications
                WHERE user_id = :user_id AND type != :type1 AND type != :type2 AND type != :type3
            ", ['user_id' => Auth::getUser_id(), 'type1' => 'Res_Accepted', 'type2' => 'Res_Denied', 'type3' => 'Reminder']);
                if ($other_notifications !== false) {
                    foreach ($other_notifications as $notification) {
                        $result[] = $notification;
                    }
                }


                if (!empty($result)) {
                    echo json_encode($result); // Encode retrieved data as JSON
                } else {
                    echo "no-new-notifications";
                }
            } else if ($_SERVER['REQUEST_METHOD'] == 'PUT' && $method == 'fetch') {
                $json_data = file_get_contents("php://input");
                // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
                $php_data = json_decode($json_data);//json object

                $notify = new Notifications();
                $dataToUpdate = ['viewed' => 1];
                $notify->update($php_data->notification_id, $dataToUpdate);
                echo "Notification viewed status updated successfully.";
            }
        }

//notifications details for page
        public
        function all_notifications($method = null, $id = null, $action = null): void
        {
            $db = new Database();

            $data['all_notifications'] = $db->query("SELECT *,
                rr.type AS reservation_type,
                n.type AS type
                FROM
                notifications n
                JOIN resrequest rr
                ON n.id = rr.reservation_id
                JOIN ads a
                ON rr.ad_id = a.ad_id
                WHERE (n.user_id = :user_id AND (n.type = 'Res_Accepted' OR n.type = 'Res_Denied'))", ['user_id' => Auth::getUser_id()]);

            $this->view('common/notifications', $data);
        }


    }