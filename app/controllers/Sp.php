<?php

class Sp extends Controller{
    public function index() {
        $this->view('sp/dashboard');
    }

    public function profile($id = null) {

        $id = $id ?? Auth::getUser_id();
        
        $user = new User();

        $data['user'] = $user->first(['user_id' => $id]);
        $this->view('sp/profile', $data);
    }

    public function reservations() {

        $db = new Database();
        $data['records'] = $db->query("SELECT * FROM resrequest");

        $this->view('sp/reservations', $data);
    }
}