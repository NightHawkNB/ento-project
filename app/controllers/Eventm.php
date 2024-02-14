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
            SELECT ADS.ad_id, ADS.user_id, ADS.title, ADS.details, ADS.image, V.seat_count, V.location, V.other
            FROM ads ADS
            JOIN serviceprovider SP ON SP.user_id = ads.user_id
            JOIN venuemanager VM ON VM.sp_id = SP.sp_id
            RIGHT JOIN venue V ON V.venueM_id = VM.venueM_id
        ');

        show($data);
        die;

        $this->view('common/events/create_event');

    }

}