<?php

class Login extends Controller{
    public function index() {
        $data['errors'] = [];

        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $row = $user->first([
                'email' => $_POST['email']
            ]);
            
            if($row) {
                $pass = $_POST['password'];
                if(password_verify($pass, $row->password)) {
                    // For Authentication
                    Auth::authenticate($row);

                    message("Logged in Successfully");
                    redirect('home');
                } else {
                    $data['errors']['email'] = "Wrong email or password";
                    $data['errors']['password'] = "Wrong email or password";

                    message("Logging Failed | Incorrect Email or Password");
                }
            } else {
                $data['errors']['email'] = "Wrong email or password";
                $data['errors']['password'] = "Wrong email or password";

                message("Logging Failed | No User Account with the given email");
            }
        }

        $this->view('includes/login');
    }
}