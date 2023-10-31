<?php

/** @noinspection ALL */

class SP extends Controller {

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (Auth::is_client() || Auth::is_cca()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function index()
    {
        $this->view('common/dashboard');
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
