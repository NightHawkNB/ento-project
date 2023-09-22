<?php

class Sp extends Controller{

    public function __construct() {
        if(!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if(!Auth::is_sp()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function index() {
        $this->view('sp/dashboard');
    }

    //! Previous sp/profile method
    // public function profile($id = null) {

    //     $id = $id ?? Auth::getUser_id();
        
    //     $user = new User();

    //     $data['user'] = $user->first(['user_id' => $id]);
    //     $this->view('sp/profile', $data);
    // }

    public function profile($method = null) {

        $user = new User();

        $data['user'] = $user->first(['user_id' => Auth::getUser_id()]);

        if(empty($method)) $this->view('profile/overview', $data);
        else if($method === 'edit-profile') $this->view('profile/edit', $data);
        else if($method === 'settings') $this->view('profile/settings', $data);
        else if($method === 'change-password') $this->view('profile/change-password', $data);
        else {
            message("Page not found");
            redirect('sp/profile');
        }
    }

    public function reservations($method = null) {

        $db = new Database();

        if(empty($method)) {
            $data['records'] = $db->query("SELECT * FROM reservations");
            $this->view('sp/reservations/your-reservations', $data);
        } else if($method === 'reservation-requests') {
            $data['records'] = $db->query("SELECT * FROM resrequest");
            $this->view('sp/reservations/reservation-requests', $data);
        } else {
            message("Page not found");
            redirect('sp/reservations');
        }
    }

    public function advertisements($method = null) {
        
        if(empty($method)) $this->view('includes/advertisements/your-ads');
        else if($method == 'all-ads') $this->view('includes/advertisements/all-ads');
        else {
            message("Page not found");
            redirect('sp/advertisements');
        }
    }

    public function events($method = null) {

        $db = new Database();

        if(empty($method)) {
            $data['records'] = $db->query("SELECT * FROM event");
            $this->view('sp/events/your-events', $data);
        } else {
            message("Page not found");
            redirect('sp/events');
        }
    }
}