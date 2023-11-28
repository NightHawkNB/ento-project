<?php

class Signup extends Controller{
    public function index(): void
    {
        $data['errors'] = [];

        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if($user->validate($_POST)) {

                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();

                $user->insert($_POST);

                message("Your profile was created successfully. Please Login");
                redirect('login');
            } else {
                $data['errors'] = $user->errors;
            }
        }

        
        $data['title'] = "ENTO | Signup";
        $this->view('includes/signup', $data);
    }
}