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
            ');

            $data['bands'] = $ads->query('
                SELECT ADS.ad_id, ADS.user_id, ADS.title, ADS.details, ADS.image, B.band_id
                FROM ads ADS
                JOIN serviceprovider SP ON ADS.user_id = SP.user_id
                JOIN band B ON SP.sp_id = B.sp_id
            ');

            $data['singers'] = $ads->query('
                SELECT ADS.ad_id, ADS.user_id, ADS.title, ADS.details, ADS.image, S.singer_id
                FROM ads ADS
                JOIN serviceprovider SP ON ADS.user_id = SP.user_id
                JOIN singer S ON SP.sp_id = S.sp_id
            ');

//        show($data);
//        die;

            $this->view('common/events/create_event', $data);

        } else if($_SERVER['REQUEST_METHOD'] == "POST") {

            $_POST['creator_id'] = Auth::getUser_id();


            show($_POST);
            die;
        }

    }

}