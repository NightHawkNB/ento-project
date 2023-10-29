<?php

/** @noinspection ALL */

class Singer extends Controller
{

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

    public function index()
    {
        $this->view('common/dashboard');
    }

    //! Previous singer/profile method
    // public function profile($id = null) {

    //     $id = $id ?? Auth::getUser_id();

    //     $user = new User();

    //     $data['user'] = $user->first(['user_id' => $id]);
    //     $this->view('singer/profile', $data);
    // }
    

    // Errors in the Details Page TODO

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
