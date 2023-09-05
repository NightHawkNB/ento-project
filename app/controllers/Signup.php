<?php

class Signup extends Controller{
    public function index() {
        $data['errors'] = [];

        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if($user->validate($_POST)) {
                $user->insert($_POST);

                message("Your profile was created successfully. Please Login");
                redirect('login');
            } else {
                $data['errors'] = $user->errors;
            }
        }

        
        $data['title'] = "ENTO | Signup";
        $this->view('signup', $data);
    }
}