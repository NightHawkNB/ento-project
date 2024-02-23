<?php
class Eventm extends controller{
    public function __construct()
    {
        if(!Auth::logged_in())
        {
            message("please login");
            redirect('home');
        }
        if(!Auth::is_eventm())
        {
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

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
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

        } else if($_SERVER['REQUEST_METHOD'] == "POST") {

            $custom_band = true;

            $_POST['event_id'] = "EVENT_".rand(1000, 100000) . "_" . time();
            $ads = new Ad();

            $_POST['creator_id'] = Auth::getUser_id();

            // Adding the venue data
            if($_POST['venue_id'] == 'custom') {
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
            $direct_folder = getcwd() . "\assets\images".DIRECTORY_SEPARATOR."event" . DIRECTORY_SEPARATOR;
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
                if(empty($_POST['image'])) {
                    $_POST['image'] = "/assets/images/event/event1.png";
                }
            }


            // Adding the band and the singer list
            foreach ($_POST as $key => $value) {
                // Check if the key contains 'BAND_AD_'
                if (str_contains($key, 'band_data')) {
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

                } else if(str_contains($key, 'SING_AD_')) {
                    $singers[] = $ads->query('
                        SELECT S.singer_id, S.sp_id, ADS.ad_id
                        FROM ads ADS
                        JOIN serviceprovider SP ON ADS.user_id = SP.user_id
                        JOIN singer S ON SP.sp_id = S.sp_id
                        WHERE ADS.ad_id = :ad_id AND ADS.deleted = 0
                    ', ['ad_id' => $value])[0];
                }
            }
            if(!$custom_band) unset($_POST['custom_band']);

            // Adding the ticketing plan
            $ticketing = [];
            if(!empty($_POST['basic_ticket_price'])) $ticketing[] = strval($_POST['basic_ticket_price']).'*'.strval($_POST['basic_ticket_count']);
            if(!empty($_POST['premium_ticket_price'])) $ticketing[] = strval($_POST['premium_ticket_price']).'*'.strval($_POST['premium_ticket_count']);

            $_POST['ticketing_plan'] = implode("|", $ticketing);


            // Data formatting
            $_POST['province'] = ucfirst(strtolower($_POST['province']));
            $_POST['district'] = ucfirst(strtolower($_POST['district']));

            $event = new Event();
            $event_singers = new Event_singers();

            $event->insert($_POST);

            foreach ($singers as $singer) {
                $event_singers->insert(['event_id' => $_POST['event_id'], 'singer_id' => $singer->singer_id]);
                createReservation($singer->sp_id, $singer->ad_id);
            }

            message("Event Created Successfully", false, 'success');
            redirect('eventm');

        } else if($_SERVER['REQUEST_METHOD'] == "PUT") {
            $json_data = file_get_contents("php://input");
            $php_data = json_decode($json_data);

            $venues = new Venue();

            $data = $venues->where(['location' => strtolower($php_data->district)]);
            if(!empty($data)) {
                echo json_encode($data);
            } else {
                echo "no_venues";
            }

            die;
        }

    }

    public function manage_events($event_id = null): void
    {

        $event = new Event();

        if(empty($event_id)) {
            $data['events'] = $event->where(['creator_id' => Auth::getUser_id()]);

            $this->view('common/events/view_events', $data);
        } else {
            $data['events'] = $event->where(['event_id' => $event_id])[0];

            $this->view('common/events/pages/event_status', $data);
        }

    }

}

// Function to send a reservation request when creating an event
function createReservation($sp_id, $ad_id) : void
{

    $resreq = new Resrequest();

    $inputs = [
        'req_id' => "RESREQ_" . rand(10, 100000) . "_" . time(),
        'user_id' => Auth::getUser_id(),
        'sp_id' => $sp_id,
        'ad_id' => $ad_id,
        'type' => 'Event',
        'details' => $_POST['details'],
        'location' => $_POST['province'].", ".$_POST['district'],
        'location_id' => (is_numeric($_POST['venue_id'])) ? $_POST['venue_id'] : NULL,
        'start_time' => $_POST['start_time'],
        'end_time' => $_POST['end_time']
    ];

    $resreq->insert($inputs);
}