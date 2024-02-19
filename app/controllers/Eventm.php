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
//        show($page);
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

//        show($data);
//        die;

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
            }

//            if(!empty($_POST['venue_id'])) {
//                $ad_venue = new Ad_venue();
//                $venue = $ad_venue->where(['venue' => $_POST['venue_id']])[0];
//                show($venue);
//                $_POST['venue_id'] = $venue->venue_id;
//            } else {
//                $_POST['custom_venue'] = $_POST['custom_venue_address'];
//            }

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
                if (str_contains($key, 'BAND_AD_')) {
                    $custom_band = false;

                    $_POST['band_id'] = $ads->query('
                        SELECT B.band_id
                        FROM ads ADS
                        JOIN serviceprovider SP ON ADS.user_id = SP.user_id
                        JOIN band B ON SP.sp_id = B.sp_id
                        WHERE ADS.ad_id = :ad_id AND ADS.deleted = 0
                    ', ['ad_id' => $value])[0];
                } else if(str_contains($key, 'SING_AD_')) {
                    $singers[] = $ads->query('
                        SELECT S.singer_id
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
            show($singers);
            show($ticketing);
            show($_POST);
//            die;

            $event = new Event();
            $event_singers = new Event_singers();

            $event->insert($_POST);

            foreach ($singers as $singer) {
                $event_singers->insert(['event_id' => $_POST['event_id'], 'singer_id' => $singer->singer_id]);
            }


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



//            show($php_data);
            die;
        }

    }

}