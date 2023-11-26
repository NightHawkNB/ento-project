<?php

/** @noinspection ALL */

class Band extends SP {

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_band()) {
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
}
