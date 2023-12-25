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


            $db = new Database();
            $ticket = $db->query("SELECT * FROM tickets JOIN event ON tickets.event_id = event.event_id JOIN venue ON event.venue_id = venue.venue_id WHERE tickets.ticket_id = :ticket_id LIMIT 1", ['ticket_id' => $ticket_id]);

            if(!$ticket) {
                echo "error";
                die;
            } else {
                $ticket = $ticket[0];
            }

            // $generated_hash = strtoupper(
            //     md5(
            //         $ticket->ticket_id .
            //         $ticket->event_id .
            //         $ticket->user_id .
            //         $ticket->type .
            //         $ticket->price .
            //         strtoupper(md5($ticket_secret))
            //     )
            // );

            if($scanned_hash == $ticket->serial_num) {
                echo "valid";
            }

            die;

        } else {
            $this->view("venue_operator/scanner");
        }

    }
}
