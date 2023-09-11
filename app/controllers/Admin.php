<?php

class Admin extends Controller{
    public function index() {
        $this->view('admin/dashboard');
    }

    public function profile($id = null) {

        $id = $id ?? Auth::getUser_id();
        
        $user = new User();

        $data['user'] = $user->first(['user_id' => $id]);
        $this->view('admin/profile', $data);
    }
}