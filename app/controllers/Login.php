<?php

class Login extends Controller{
    public function index() {
        $data['errors'] = [];

        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $row = $user->first([
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ]);

            if($row) {
                if($row->password === $_POST['password']) {
                    $_SESSION['USER_DATA'] = $row;

                    message("Logged in Successfully");
                    redirect('home');
                }
            } else {
                $data['errors']['email'] = "Wrong email or password";
                message("Logging Failed");
                redirect('login');
            }
        }

        
        $data['title'] = "ENTO | Login";
        $this->view('login', $data);
    }
}