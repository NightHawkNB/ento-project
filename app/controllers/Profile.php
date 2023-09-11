<?php

class Profile extends Controller{
    public function index() {
        switch($_SESSION['USER_DATA']->user_type) {
            case 'client':
                $this->view('profile.client');
                break;
            case 'sp':
                $this->view('profile.sp');
        }
    }
}