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
        $data['view_count'] = $db->query('SELECT views FROM ads WHERE user_id = :user_id', ['user_id' => Auth::getUser_id()])[0]->views ?? 0;
        $data['request_count'] = $db->query('SELECT COUNT(*) AS "count" FROM resrequest JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id WHERE serviceprovider.user_id = :user_id', ['user_id' => Auth::getUser_id()])[0]->count ?? 0;

        $this->view('common/reports/stats', $data);
    }
}
