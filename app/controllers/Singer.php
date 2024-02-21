<?php

class Singer extends SP {

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_singer()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function events($method = null): void
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

    public function stat($method = null): void
    {
        $db = new Database();

        // Calling a Stored procedure named 'report_singer(user_id)'
        $data['stats'] = $db->query("CALL report_singer(:user_id)",['user_id' => Auth::getUser_id()])[0] ?: NULL;

        $data['rate'] = $db->query('
            SELECT rate FROM singer
            JOIN serviceprovider ON serviceprovider.sp_id = singer.sp_id
            WHERE serviceprovider.user_id = :user_id
            ', ['user_id' => Auth::getUser_id()])[0]->rate;

        // Query to get the total views of the ads owned by this user
        // They will be automatically ordered based on the id which is an auto incremented field

        $ad_views = new Ad_view();
        $data['views'] = $ad_views->where(['user_id' => Auth::getUser_id()]) ?: 0;
        if($data['views']) $data['views'] = json_encode($data['views']);

        $this->view('common/reports/stats', $data);

    }
}
