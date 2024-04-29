<?php

class Eventm extends controller
{
    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("please login");
            redirect('home');
        }
        if (!Auth::is_eventm()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function index(): void
    {
        $this->view('common/dashboard');
    }

    public function create_event($page = null): void
    {
        $db = new Database();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $ads = new Ad();

            $data['venues'] = $ads->query('
                SELECT ADS.ad_id, ADS.user_id, ADS.title, ADS.details, ADS.image, V.seat_count, V.location, V.other, V.venue_id
                FROM ads ADS
                JOIN ad_venue ADV ON ADS.ad_id = ADV.ad_id
                JOIN venue V ON ADV.venue_id = V.venue_id
                WHERE ADS.deleted = 0
            ');

            $data['bands'] = $ads->query('
                SELECT ADS.ad_id, ADS.user_id, ADS.title, ADS.details, ADS.image, B.band_id
                FROM ads ADS
                JOIN serviceprovider SP ON ADS.user_id = SP.user_id
                JOIN band B ON SP.sp_id = B.sp_id
                WHERE ADS.deleted = 0
            ');

            $data['singers'] = $ads->query('
                SELECT ADS.ad_id, ADS.user_id, ADS.title, ADS.details, ADS.image, S.singer_id
                FROM ads ADS
                JOIN serviceprovider SP ON ADS.user_id = SP.user_id
                JOIN singer S ON SP.sp_id = S.sp_id
                WHERE ADS.deleted = 0
            ');

            $this->view('common/events/create_event', $data);

        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $custom_band = true;

            $_POST['event_id'] = "EVENT_" . rand(1000, 100000) . "_" . time();
            $ads = new Ad();

            $_POST['creator_id'] = Auth::getUser_id();

            // Adding the venue data
            if ($_POST['venue_id'] == 'custom') {
                $_POST['custom_venue'] = $_POST['custom_venue_address'];
                unset($_POST['venue_id']);
            } else {
                unset($_POST['custom_venue']);
                $venue_data = $db->query('
                    SELECT VM.sp_id AS sp_id, ADV.ad_id
                    FROM venue V
                    JOIN venuemanager VM ON V.venueM_id = VM.venueM_id
                    JOIN ad_venue ADV ON V.venue_id = ADV.venue_id
                    WHERE V.venue_id = :venue_id
                ', ['venue_id' => $_POST['venue_id']])[0];

                createReservation($venue_data->sp_id, $venue_data->ad_id);
            }

            // Image Uploading part
            $allowed_types = ['image/jpeg', 'image/png'];
            $direct_folder = getcwd() . "\assets\images" . DIRECTORY_SEPARATOR . "event" . DIRECTORY_SEPARATOR;
            $remote_folder = "/assets/images/event/";

            if (!empty($_FILES['image']['name'])) {

                if ($_FILES['image']['error'] == 0) {
                    if (in_array($_FILES['image']['type'], $allowed_types)) {
                        $temp_name = explode(".", $_FILES['image']['name']);
                        $destination = $direct_folder . $_POST['event_id'] . "." . end($temp_name);
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                        resize_image($destination);

                        $_POST['image'] = $remote_folder . $_POST['event_id'] . "." . end($temp_name);
                    } else {
                        message("Image type should be JPG/JPEG/PNG");
                        redirect("eventm/create_event");
                    }
                } else {
                    message("Error occurred - Couldn't upload the file", false, "failed");
                    redirect("eventm/create_event");
                }
            } else {
                if (empty($_POST['image'])) {
                    $_POST['image'] = "/assets/images/event/event1.png";
                }
            }


            // Adding the band and the singer list
            foreach ($_POST as $key => $value) {
                // Check if the key contains 'BAND_AD_'
                if (str_contains($key, 'band_data') && $value != 'custom') {
                    $custom_band = false;

                    $band = $ads->query('
                        SELECT B.band_id, B.sp_id, ADS.ad_id
                        FROM ads ADS
                        JOIN serviceprovider SP ON ADS.user_id = SP.user_id
                        JOIN band B ON SP.sp_id = B.sp_id
                        WHERE ADS.ad_id = :ad_id AND ADS.deleted = 0
                    ', ['ad_id' => $value])[0];

                    // Creating the reservation for the band
                    createReservation($band->sp_id, $band->ad_id);

                    // Inserting the data to the POST variable
                    $_POST['band_id'] = $band->band_id;

                } else if (str_contains($key, 'SING_AD_')) {
                    $singers[] = $ads->query('
                        SELECT S.singer_id, S.sp_id, ADS.ad_id
                        FROM ads ADS
                        JOIN serviceprovider SP ON ADS.user_id = SP.user_id
                        JOIN singer S ON SP.sp_id = S.sp_id
                        WHERE ADS.ad_id = :ad_id AND ADS.deleted = 0
                    ', ['ad_id' => $value])[0];
                }
            }
            if (!$custom_band) unset($_POST['custom_band']);

            // Adding the ticketing plan
            $ticketing = [];
            if (!empty($_POST['basic_ticket_price'])) $ticketing[] = strval($_POST['basic_ticket_price']) . '*' . strval($_POST['basic_ticket_count']);
            if (!empty($_POST['premium_ticket_price'])) $ticketing[] = strval($_POST['premium_ticket_price']) . '*' . strval($_POST['premium_ticket_count']);

            $_POST['ticketing_plan'] = implode("|", $ticketing);


            // Data formatting
            $_POST['province'] = ucfirst(strtolower($_POST['province']));
            $_POST['district'] = ucfirst(strtolower($_POST['district']));

            $event = new Event();
            $event_singers = new Event_singers();

            $event->insert($_POST);

            // Ticket creation part
            $all_tickets = new All_tickets();

            for ($count = 0; $count < $_POST['basic_ticket_count']; $count++) {
                $ticket_id = "T_".rand(1000, 100000) . "_" . time();
                $all_tickets->insert([
                    'ticket_id' => $ticket_id,
                    'event_id' => $_POST['event_id'],
                    'type' => 'basic',
                    'price' => $_POST['basic_ticket_price']
                ]);
            }

            for ($count = 0; $count < $_POST['premium_ticket_count']; $count++) {
                $ticket_id = "T_".rand(1000, 100000) . "_" . time();
                $all_tickets->insert([
                    'ticket_id' => $ticket_id,
                    'event_id' => $_POST['event_id'],
                    'type' => 'premium',
                    'price' => $_POST['premium_ticket_price']
                ]);
            }


            foreach ($singers as $singer) {
                $event_singers->insert(['event_id' => $_POST['event_id'], 'singer_id' => $singer->singer_id]);
                createReservation($singer->sp_id, $singer->ad_id);
            }

            message("Event Created Successfully", false, 'success');
            redirect('eventm');

        } else if ($_SERVER['REQUEST_METHOD'] == "PUT") {
            $json_data = file_get_contents("php://input");
            $php_data = json_decode($json_data);

            $venues = new Venue();

            $data = $venues->where(['location' => strtolower($php_data->district)]);
            if (!empty($data)) {
                echo json_encode($data);
            } else {
                echo "no_venues";
            }

            die;
        }

    }

    public function manage_events($event_id = null, $page = null): void
    {

        $db = new Database();
        $event = new Event();

        if (empty($event_id)) {
            $data['events'] = $event->where(['creator_id' => Auth::getUser_id(), 'status' => 'Pending']);
            $data['events_completed'] = $event->where(['creator_id' => Auth::getUser_id(), 'status' => 'Completed']);

            $this->view('common/events/view_events', $data);
        } else {
            $event_data = $event->where(['event_id' => $event_id])[0];

            // Provides the time remaining in days for the event to start
            $timeleft = (strtotime($event_data->start_time) - time()) / 60 / 60 / 24;

            if ($timeleft <= 0) {
                $event->update($event_id, ['status' => 'Completed']);
            }

            $custom = new stdClass();
            $custom->band = 0;
            $custom->venue = 0;
            $reservations['band'] = 0;
            $reservations['venue'] = 0;

            if (empty($event_data->custom_band)) {
                $band_data = $db->query('
                    SELECT *
                    FROM event E
                    JOIN band B ON E.band_id = B.band_id
                    JOIN serviceprovider SP ON B.sp_id = SP.sp_id
                    JOIN ads ADS ON SP.user_id = ADS.user_id
                    JOIN resrequest RR ON SP.sp_id = RR.sp_id
                    WHERE RR.user_id = :user_id AND RR.deleted = 0 && E.event_id = :event_id
                ', ['user_id' => Auth::getUser_id(), 'event_id' => $event_id])[0] ?? [];

                if (empty($band_data)) $reservations['band'] = 0;
                else $reservations['band'] = 1;
            } else {
                $band_data = $event_data->custom_band;
                $custom->band = 1;
            }

            $event_data = $event->where(['event_id' => $event_id])[0];
            $event_data->time_left = $timeleft;

            if (empty($event_data->custom_venue)) {
                $venue_data = $db->query('
                    SELECT V.name, E.province, E.district, V.image, V.seat_count,
                           V.packages, V.other, SP.last_response_time, ADS.views, 
                           ADS.contact_email, ADS.contact_num, RR.*
                    FROM event E
                    JOIN venue V ON E.venue_id = V.venue_id
                    JOIN venuemanager VM ON V.venueM_id = VM.venueM_id
                    JOIN serviceprovider SP ON VM.sp_id = SP.sp_id
                    JOIN ad_venue ADV ON V.venue_id = ADV.venue_id
                    JOIN ads ADS ON ADV.ad_id = ADS.ad_id
                    JOIN resrequest RR ON SP.sp_id = RR.sp_id AND RR.location_id = V.venue_id
                    WHERE RR.user_id =:user_id AND RR.deleted = 0
                ', ['user_id' => Auth::getUser_id()])[0] ?? [];

                if (empty($venue_data)) $reservations['venue'] = 0;
                else $reservations['venue'] = 1;
            } else {
                $venue_data = $event_data->custom_venue;
                $custom->venue = 1;
            }

            $data['venue_set'] = $db->query('
                SELECT 
                    V.venue_id, 
                    V.image, 
                    V.name, 
                    V.seat_count, 
                    V.packages, 
                    V.other, 
                    V.location,
                    SP.sp_id, 
                    AD.ad_id,  
                    AD.title, 
                    AD.details
                FROM ads AD
                JOIN ad_venue ADV ON AD.ad_id = ADV.ad_id
                JOIN venue V ON ADV.venue_id = V.venue_id
                JOIN serviceprovider SP ON AD.user_id = SP.user_id
                WHERE V.location = :location AND AD.deleted = 0 AND V.deleted = 0
            ', ['location' => $event_data->district]);

            $data['band_set'] = $db->query('
                SELECT 
                    SP.sp_id, 
                    ADB.*, 
                    AD.*
                FROM ads AD
                JOIN ad_band ADB ON AD.ad_id = ADB.ad_id
                JOIN serviceprovider SP ON AD.user_id = SP.user_id
                WHERE AD.deleted = 0
            ');


            // Getting the singer details relevant to the event
            $data['singers'] = $db->query("
                SELECT 
                    E.*, 
                    ES.*, 
                    S.*, 
                    U.image AS singer_image,
                    U.fname AS fname,
                    U.lname AS lname
                FROM event E
                JOIN event_singer ES ON E.event_id = ES.event_id
                JOIN singer S ON ES.singer_id = S.singer_id
                JOIN serviceprovider SP ON S.sp_id = SP.sp_id
                JOIN user U ON SP.user_id = U.user_id
                WHERE E.event_id = :event_id
            ", ['event_id' => $event_id]);

            $data['event'] = $event_data;
            $data['band'] = $band_data ?? [];
            $data['venue'] = $venue_data ?? [];
            $data['custom'] = $custom;
            $data['reservations'] = $reservations;

            $this->view('common/events/pages/event_status', $data);
        }
    }

    public function cancel_request(): void
    {
        try {
            $json_data = file_get_contents("php://input");
            $php_data = json_decode($json_data);

//            show($php_data);

            if (count((array)$php_data) == 3) {
                $rr = new Resrequest();
                $rr->update($php_data->req_id, ['deleted' => 1]);

                $event = new Event();

                if ($php_data->type == "venue") {
                    $event->update($php_data->event_id, ['venue_id' => NULL]);
                } else if ($php_data->type == "band") {
                    $event->update($php_data->event_id, ['band_id' => NULL]);
                }

            } else if (count((array)$php_data) == 2) {
                $event = new Event();

                if ($php_data->type == "venue") {
                    $event->update($php_data->event_id, ['custom_venue' => NULL]);
                } else if ($php_data->type == "band") {
                    $event->update($php_data->event_id, ['custom_band' => NULL]);
                }
            }


            echo "success";
        } catch (Exception $error) {
            echo "failed";
        }
    }

    // Function to add custom band
    public function add_custom_band($page = null): void
    {
        $json_data = file_get_contents("php://input");
        $php_data = json_decode($json_data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            try {
                $event = new Event();
                $event->update($php_data->event_id, ['band_id' => NULL, 'custom_band' => $php_data->custom_band]);

                echo "success";
            } catch (Exception $error) {
                echo "failed";
            }

        }
    }

    // Function to add custom venue
    public function add_custom_venue($page = null): void
    {
        $json_data = file_get_contents("php://input");
        $php_data = json_decode($json_data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            try {
                $event = new Event();
                $event->update($php_data->event_id, ['venue_id' => NULL, 'custom_venue' => $php_data->custom_venue]);

                echo "success";
            } catch (Exception $error) {
                echo "failed";
            }

        }
    }

    public function add_venue($page = null): void
    {
        $json_data = file_get_contents("php://input");
        $php_data = json_decode($json_data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            try {
                $event = new Event();
                $event->update($php_data->event_id, ['venue_id' => $php_data->venue_id, 'custom_venue' => NULL]);
                $event_data = $event->where(['event_id' => $php_data->event_id])[0];

                $_POST['details'] = "Reservation for the event: " . $event_data->name;
                $_POST['province'] = $event_data->province;
                $_POST['district'] = $event_data->district;
                $_POST['start_time'] = $event_data->start_time;
                $_POST['end_time'] = $event_data->end_time;
                $_POST['venue_id'] = $php_data->venue_id;

                createReservation($php_data->sp_id, $php_data->ad_id);

                echo "success";
            } catch (Exception $error) {
                echo "failed";
            }

        }
    }

    public function add_band($page = null): void
    {
        $json_data = file_get_contents("php://input");
        $php_data = json_decode($json_data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            try {
                $event = new Event();

                $db = new Database();
                $band_data = $db->query("
                    SELECT B.band_id, B.sp_id, ADS.ad_id
                    FROM ads ADS
                    JOIN serviceprovider SP ON ADS.user_id = SP.user_id
                    JOIN band B ON SP.sp_id = B.sp_id
                    WHERE ADS.ad_id = :ad_id 
                      AND ADS.deleted = 0
                ", ['ad_id' => $php_data->ad_id])[0];

                $event->update($php_data->event_id, ['band_id' => $band_data->band_id, 'custom_band' => NULL]);
                $event_data = $event->where(['event_id' => $php_data->event_id])[0];

                $_POST['details'] = "Reservation for the event: " . $event_data->name;
                $_POST['province'] = $event_data->province;
                $_POST['district'] = $event_data->district;
                $_POST['start_time'] = $event_data->start_time;
                $_POST['end_time'] = $event_data->end_time;

                createReservation($php_data->sp_id, $php_data->ad_id);

                echo "success";
            } catch (Exception $error) {
                echo "failed";
            }

        }
    }

    //reports for event details
    public function reports($id = NULL)
    {
        $event = new Event();
        if (empty($id)) {
            $data['events'] = $event->query("
            SELECT *
            FROM event 
            WHERE creator_id = :user_id",
                ['user_id' => Auth::getUser_id()]);

            $this->view('eventm/events_details', $data);
        } elseif (!empty($id)) {
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
           WHERE E.event_id = :event_id
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
           WHERE E.event_id = :event_id
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


            $data['payment'] = $event->query("
        SELECT *
        FROM event E
        JOIN payment_log P ON E.event_id = P.event_id
        WHERE E.event_id = :id", ['id' => $id]);

            $this->view('eventm/reports',$data);
        }


    }
}


// Function to send a reservation request when creating an event
function createReservation($sp_id, $ad_id): void
{

    $resreq = new Resrequest();

    $inputs = [
        'req_id' => "RESREQ_" . rand(10, 100000) . "_" . time(),
        'user_id' => Auth::getUser_id(),
        'sp_id' => $sp_id,
        'ad_id' => $ad_id,
        'type' => 'Event',
        'details' => $_POST['details'],
        'location' => $_POST['province'] . ", " . $_POST['district'],
        'location_id' => (array_key_exists('venue_id', $_POST) and is_numeric($_POST['venue_id'])) ? $_POST['venue_id'] : NULL,
        'start_time' => $_POST['start_time'],
        'end_time' => $_POST['end_time']
    ];

    $resreq->insert($inputs);
}