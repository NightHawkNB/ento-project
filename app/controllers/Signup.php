<?php

class Signup extends Controller{

    public function index($method = null): void
    {
        // View the user type selection page before redirecting to the signup form

        $this->view('includes/auth/user_type');
    }

    public function client(): void
    {
        // Client's signup form

        $user = new User();
        $db = new Database();

        $data['prev'] = [
            'fname' => '',
            'lname' => '',
            'email' => '',
            'contact_num' => '',
            'province' => '',
            'district' => '',
            'address1' => '',
            'address2' => '',
            'user_type' => ''
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

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            if($user->validate($_POST)) {

                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();

                // Data from the form containing common information are stored in the session
                // For saving previous state of data
                $_SESSION['user_data'] = $_POST;

                // Inserting data to the user table
                $user->insert($_POST);

                $_SESSION['email_verification']['user_id'] = $_POST['user_id'];
                $_SESSION['email_verification']['email'] = $_POST['email'];
                $_SESSION['email_verification']['name'] = $_POST['fname'] . " " . $_POST['lname'];

                message("Your profile was created successfully. Please Verify Email to Continue", false, "success");
                redirect('mailer/email_verification');

            } else {
                message("Your profile creation failed", false, 'failed');
                $data['errors'] = $user->errors;
                $data['prev'] = $_POST;
            }
        }

        $data['prev'] = (object)$data['prev'];
        $this->view('includes/auth/signup_client', $data);
    }

    public function singer(): void
    {
        // Service providers signup form

        $user = new User();
        $db = new Database();

        $data['prev'] = [
            'fname' => '',
            'lname' => '',
            'email' => '',
            'contact_num' => '',
            'province' => '',
            'district' => '',
            'address1' => '',
            'address2' => '',
            'user_type' => ''
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

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            if($user->validate($_POST)) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();

                $_POST['user_type'] = "singer";

                // Data from the form containing common information are stored in the session
                // For saving previous state of data
                $_SESSION['user_data'] = $_POST;

                // Inserting data to the user table
                $user->insert($_POST);

                // Inserting session data for email_verification process
                $_SESSION['email_verification']['user_id'] = $_POST['user_id'];
                $_SESSION['email_verification']['email'] = $_POST['email'];
                $_SESSION['email_verification']['name'] = $_POST['fname'] . " " . $_POST['lname'];

                // Inserting data to the service provider table
                $db->query("
                            INSERT INTO serviceprovider(user_id, sp_type) 
                            VALUES (:user_id, :sp_type)",
                    ['user_id' => $_POST['user_id'], 'sp_type' => "singer"]);

                // Getting the sp_id from the inserted record
                $sp_id = $db->query("
                                        SELECT * FROM serviceprovider 
                                        WHERE user_id = :user_id LIMIT 1",
                    ['user_id' => $_POST['user_id']]);

                // Checking whether the sp_id was received
                if($sp_id) $sp_id = $sp_id[0]->sp_id;
                else {
                    // If the sp_id was not found, delete the inserted user data to go back to the previous state

                    $db->query("DELETE FROM user WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);
                    $db->query("DELETE FROM serviceprovider WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);

                    message("User Creation Error - Singer", false, 'failed');
                    redirect('signup');
                }

                $user_type_check = $db->query("INSERT INTO singer (sp_id, rate) VALUES (:sp_id, :rate)", ['sp_id' => $sp_id, 'rate' => $_POST['rate']]);

                message("Your profile was created successfully. Please Verify Email to Continue", false, "success");
                redirect('mailer/email_verification');

            } else {
                message("Your profile was created Failed", false, "failed");
                show($user->errors);die;
                $data['errors'] = $user->errors;
                $data['prev'] = $_POST;
            }


        }

        $data['prev'] = (object)$data['prev'];
        $this->view('includes/auth/signup_singer', $data);
    }

    public function band(): void
    {
        // Service providers signup form

        $user = new User();
        $db = new Database();

        $data['prev'] = [
            'fname' => '',
            'lname' => '',
            'email' => '',
            'contact_num' => '',
            'province' => '',
            'district' => '',
            'address1' => '',
            'address2' => '',
            'user_type' => ''
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

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            if($user->validate($_POST)) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();

                // Data from the form containing common information are stored in the session
                // For saving previous state of data
                $_SESSION['user_data'] = $_POST;

                // Inserting data to the user table
                $user->insert($_POST);

                // Inserting data to the service provider table
                $db->query("
                    INSERT INTO serviceprovider(user_id, sp_type) 
                    VALUES (:user_id, :sp_type)",
                    ['user_id' => $_POST['user_id'], 'sp_type' => "band"]);

                // Getting the sp_id from the inserted record
                $sp_id = $db->query("
                    SELECT * FROM serviceprovider 
                    WHERE user_id = :user_id LIMIT 1",
                    ['user_id' => $_POST['user_id']]);

                // Checking whether the sp_id was received
                if($sp_id) $sp_id = $sp_id[0]->sp_id;
                else {
                    // If the sp_id was not found, delete the inserted user data to go back to the previous state

                    $db->query("DELETE FROM user WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);
                    $db->query("DELETE FROM serviceprovider WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);

                    message("User Creation Error - Band", false, 'failed');
                    redirect('signup');
                }

                $user_type_check = $db->query("INSERT INTO singer (sp_id, rate) VALUES (:sp_id, :rate)", ['sp_id' => $sp_id, 'rate' => $_POST['rate']]);

                message("Your profile was created successfully. Please Verify Email to Continue", false, "success");
                redirect('login');

            } else {
                message("Your profile was created failed", false, "failed");
                $data['errors'] = $user->errors;
                $data['prev'] = $_POST;
            }

        }

        $data['prev'] = (object)$data['prev'];
        $this->view('includes/auth/signup_band', $data);
    }

    public function venuem(): void
    {
        // Service providers signup form

        $user = new User();
        $db = new Database();

        $data['prev'] = [
            'fname' => '',
            'lname' => '',
            'email' => '',
            'contact_num' => '',
            'province' => '',
            'district' => '',
            'address1' => '',
            'address2' => '',
            'user_type' => ''
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

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            if($user->validate($_POST)) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();

                // Data from the form containing common information are stored in the session
                // For saving previous state of data
                $_SESSION['user_data'] = $_POST;

                // Inserting data to the user table
                $user->insert($_POST);

                // Inserting data to the service provider table
                $db->query("
                    INSERT INTO serviceprovider(user_id, sp_type) 
                    VALUES (:user_id, :sp_type)",
                    ['user_id' => $_POST['user_id'], 'sp_type' => "venuem"]);

                // Getting the sp_id from the inserted record
                $sp_id = $db->query("
                    SELECT * FROM serviceprovider 
                    WHERE user_id = :user_id LIMIT 1",
                    ['user_id' => $_POST['user_id']]);

                // Checking whether the sp_id was received
                if($sp_id) $sp_id = $sp_id[0]->sp_id;
                else {
                    // If the sp_id was not found, delete the inserted user data to go back to the previous state

                    $db->query("DELETE FROM user WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);
                    $db->query("DELETE FROM serviceprovider WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);

                    message("User Creation Error - Venue Manager", false, 'failed');
                    redirect('signup');
                }

                $user_type_check = $db->query("INSERT INTO singer (sp_id, rate) VALUES (:sp_id, :rate)", ['sp_id' => $sp_id, 'rate' => $_POST['rate']]);

                message("Your profile was created successfully. Please Verify Email to Continue", false, "success");
                redirect('login');

            } else {
                message("Your profile was created failed", false, "failed");
                $data['errors'] = $user->errors;
                $data['prev'] = $_POST;
            }

        }

        $data['prev'] = (object)$data['prev'];
        $this->view('includes/auth/signup_client', $data);
    }

}