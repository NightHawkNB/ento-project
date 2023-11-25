<?php

/** @noinspection ALL */

class SP extends Controller {

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (Auth::is_client() || Auth::is_cca()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function index()
    {

        // Dashboard Viewing Controller - Gets all events and reservation data and sends to the dashboard

        $db = new Database();

        $data['calendar_events'] = [];

        if($_SESSION['USER_DATA']->user_type == "venuem") {
            $input = ["user_id" => Auth::getUser_id()];
            $data['calendar_events'] = $db->query("
                SELECT event.name, event.start_time, event.end_time FROM user
                    JOIN serviceprovider ON user.user_id = serviceprovider.user_id
                    JOIN venuemanager ON venuemanager.sp_id = serviceprovider.sp_id
                    JOIN venue ON venue.venueM_id = venuemanager.venueM_id
                    JOIN event ON event.venue_id = venue.venue_id
                WHERE user.user_id = :user_id
            ", $input);

            $input = ["user_id" => Auth::getUser_id()];
            $data['calendar_reservations'] = $db->query("
                SELECT reservations.reservation_id, resrequest.start_time, resrequest.end_time FROM user
                    JOIN serviceprovider ON serviceprovider.user_id = user.user_id
                    JOIN reservations ON reservations.sp_id = serviceprovider.sp_id
                    JOIN resrequest ON reservations.reservation_id = resrequest.reservation_id
                    WHERE serviceprovider.user_id = :user_id
            ", $input);
        } else {
            $user_type = $_SESSION['USER_DATA']->user_type;
            $input = [$user_type."_id" => Auth::getUser_id()];
            $data['calendar_events'] = $db->query("
                SELECT event.name, event.start_time, event.end_time FROM event
                        JOIN event_singer ON event.event_id = event_singer.event_id
                        WHERE ".$user_type."_id = :".$user_type."_id
            ", $input);

            $input = ["user_id" => Auth::getUser_id()];
            $data['calendar_reservations'] = $db->query("
                SELECT reservations.reservation_id, resrequest.start_time, resrequest.end_time FROM reservations
                        JOIN resrequest ON reservations.reservation_id = resrequest.reservation_id
                        JOIN serviceprovider ON serviceprovider.sp_id = reservations.sp_id
                        WHERE serviceprovider.user_id = :user_id
            ", $input);
        }

        $this->view('common/dashboard', $data);
    }

    public function events($method = null)
    {

        $db = new Database();

        if (empty($method)) {
            $data['records'] = $db->query("SELECT * FROM event");
            $this->view('singer/events/your-events', $data);
        } else {
            message("Page not found");
            redirect('singer/events');
        }
    }
}
