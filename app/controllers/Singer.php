<?php

/** @noinspection ALL */

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

    public function stat($method = null) {
        $db = new Database();

        // Getting data for the charts
//        $data['view_count'] = $db->query('SELECT SUM(views) AS "views" FROM ads WHERE user_id = :user_id', ['user_id' => Auth::getUser_id()])[0]->views ?? 0;
//        $data['request_count'] = $db->query('SELECT COUNT(*) AS "count" FROM resrequest JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id WHERE serviceprovider.user_id = :user_id', ['user_id' => Auth::getUser_id()])[0]->count ?: 0;
//        $data['accepted_request_count'] = $db->query('SELECT COUNT(*) AS "count" FROM resrequest JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id WHERE serviceprovider.user_id = :user_id AND resrequest.status = "Accepted"', ['user_id' => Auth::getUser_id()])[0]->count ?: 0;
//        $data['pending_request_count'] = $db->query('SELECT COUNT(*) AS "count" FROM resrequest JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id WHERE serviceprovider.user_id = :user_id AND resrequest.status = "Pending"', ['user_id' => Auth::getUser_id()])[0]->count ?: 0;

        // Calling a Stored procedure named 'report_singer(user_id)'
        $data['stats'] = $db->query("CALL report_singer(:user_id)",['user_id' => Auth::getUser_id()])[0] ?: NULL;
//        show($data);
//        die;

        // Query to get the total views of the ads owned by this user
        // They will be automatically ordered based on the id which is an auto incremented field

        $ad_views = new Ad_view();
        $data['views'] = $ad_views->where(['user_id' => Auth::getUser_id()]) ?: 0;
        if($data['views']) $data['views'] = json_encode($data['views']);
//        show($data['views']);
//        die;

        $this->view('common/reports/stats', $data);
    }
}
