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

    public function event($page = null): void
    {
//        show($page);
        $ads = new Ad();

        $data['venues'] = $ads->query('
            SELECT ADS.ad_id, ADS.user_id, ADS.title, ADS.details, ADS.image, V.seat_count, V.location, V.other, V.venue_id
            FROM ads ADS
            JOIN ad_venue ADV ON ADS.ad_id = ADV.ad_id
            JOIN venue V ON ADV.venue_id = V.venue_id
        ');

//        show($data);
//        die;

        $this->view('common/events/create_event', $data);

    }

}