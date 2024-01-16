<?php

class Signup extends Controller{

    public function index($method = null): void
    {

        if(empty($method)) {
            // View the user type selection page before redirecting to the signup form
            $this->view('includes/auth/user_type');
        } else {

            // Stores the user type selected at the type selection window
            $_SESSION['temp_data']['user_type'] = $method;

            // Predefined data
            $data['prev'] = (object)[
                'fname' => '',
                'lname' => '',
                'email' => '',
                'contact_num' => '',
                'province' => '',
                'district' => '',
                'address1' => '',
                'address2' => '',
                'user_type' => $method
            ];

            $data['errors'] = [
                'fname' => '',
                'lname' => '',
                'email' => '',
                'contact_num' => '',
                'address1' => '',
                'address2' => '',
                'user_type' => '',
                'password' => '',
                'confirmPass' => ''
            ];


            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Handle the data

            } else {
                // View the form
                $this->view('includes/auth/signup', $data);
            }

        }

    }

}