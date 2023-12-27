<?php

/** @noinspection ALL */

class Venueo extends SP {

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_venueo()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function scanner() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            //! This part only gets data from the Fetch request in JS
            $json_data = file_get_contents("php://input");

            // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
            $php_data = json_decode($json_data);

            $ticket_secret = "AkilaHansiThisaraNipun";

            // Generate a hash and compare with the hash stored in the database
            $ticket_id = $php_data->ticket_id;
            $scanned_hash = $php_data->hash;

            if(empty($ticket_id) OR empty($scanned_hash)) {
                echo "Data not recieved";
                die;
            }

            $ticket = new Tickets();
            $ticket_data = $ticket->where(['ticket_id' => $ticket_id]);

            if(!$ticket_data) {
                echo "error";
                die;
            } else {
                $ticket_data = $ticket_data[0];
            }

            if($scanned_hash == $ticket_data->hash) {
                echo "valid";
                // Increase the participant count
                // To compare with no of tickets sold
            } else {
                echo "error-altered";
            }

            die;


//            $row = new stdClass();
//
//            $row->ticket_id = 3;
//            $row->event_id = EVENT_dsadasd;
//            $row->user_id = 38;
//            $row->hash = "";
//            $row->type = 4;
//            $row->price = 44;
//
//             $generated_hash = strtoupper(
//                 md5(
//                     $row->ticket_id .
//                     $row->event_id .
//                     $row->user_id .
//                     $row->type .
//                     $row->price .
//                     strtoupper(md5($ticket_secret))
//                 )
//             );
//
//             show($generated_hash);
//
//             die;
//
//            if($scanned_hash == $ticket_data->hash) {
//                echo "valid";
//            }
//
//            die;

        } else {

            $this->view("venue_operator/scanner");

        }

    }
}
