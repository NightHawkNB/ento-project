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

        // Inserting the custom events to the database
        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $json_data = file_get_contents("php://input");

            // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
            $php_data = json_decode($json_data);

            $start_time = $php_data->date." ".date("G:i:s", strtotime($php_data->start_time));
            $end_time = $php_data->date." ".date("G:i:s", strtotime($php_data->end_time));

            show($start_time);
            show($end_time);

            $input = [
                'user_id' => Auth::getUser_id(),
                'name' => $php_data->name,
                'start_time' => $start_time,
                'end_time' => $end_time
            ];

            $db->query("INSERT INTO calendar_schedule (user_id, name, start_time, end_time) VALUES (:user_id, :name, :start_time, :end_time)", $input);

            die;
        }

        // Getting data for the charts
        $data['view_count'] = $db->query('SELECT views FROM ads WHERE user_id = :user_id', ['user_id' => Auth::getUser_id()])[0]->views ?? 0;
        $data['request_count'] = $db->query('SELECT COUNT(*) AS "count" FROM resrequest JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id WHERE serviceprovider.user_id = :user_id', ['user_id' => Auth::getUser_id()])[0]->count ?? 0;

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

            // BUG join_tables works, but reduced no of lines is less
            $test = $db->join_tables(
                ['reservations.reservation_id', 'resrequest.start_time', 'resrequest.end_time'],
                'reservations',
                [
                    ['resrequest', 'reservations.reservation_id = resrequest.reservation_id'],
                    ['serviceprovider', 'serviceprovider.sp_id = reservations.sp_id']
                ],
                "serviceprovider.user_id = :user_id",
                ["user_id" => Auth::getUser_id()]
            );

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

        $data['personal_schedule'] = $db->query("
                SELECT name, start_time, end_time FROM calendar_schedule 
                WHERE user_id = :user_id", ['user_id' => Auth::getUser_id()]);

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

//    To check reservation that sp already have when booking
//    public function reserve($method = NULL): void
//    {
//        if (empty($method)) {
//            $this->view('home/ads');
//        } else if ($_SERVER['REQUEST_METHOD'] == 'PATCH' && $method == 'fetch') {
//            $result = [];
//            $reservations = [];
//            $db = new database();
//
//            $reservations = $db->query("SELECT *,
//                rr.type AS reservation_type
//                FROM
//                reservations r
//                JOIN resrequest rr
//                ON r.reservation_id= rr.reservation_id
//                WHERE (r.sp_id = :sp_id) ORDER BY rr.start_time DESC", ['sp_id' => $_SESSION['USER_DATA']->sp_id]);
//            if ($reservations !== false) {
//                foreach ($reservations as $reservation) {
//                    $result[] = $reservation;
//                }
//            }
//            else{
//                echo "no data";
//            }
//
//            if (!empty($result)) {
//                echo json_encode($result); // Encode retrieved data as JSON
//            } else {
//                echo "no-new-notifications";
//            }
//        }
//    }
}
