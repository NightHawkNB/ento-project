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

                // Add user info to the database (and to the service provider table)
                if(!$this->insertingUser($user, $db)) {
                    message("Initial user creation failed", false, 'failed');
                    redirect('signup');
                }

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

                // Add user info to the database (and to the service provider table)
                if(!$this->insertingUser($user, $db, 'singer',true)) {
                    message("Initial user creation failed", false, 'failed');
                    redirect('signup');
                }

                if($this->insertingServiceProvider($db, 'singer')) {
                    message("Your profile was created successfully. Please Verify Email to Continue", false, "success");
                    redirect('mailer/email_verification');
                } else {
                    message("Error - Service Provider creation failed", false, 'failed');
                    redirect('signup');
                }

            } else {
                message("Your profile was created Failed", false, "failed");
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

                // Add user info to the database (and to the service provider table)
                if(!$this->insertingUser($user, $db, 'band',true)) {
                    message("Initial user creation failed", false, 'failed');
                    redirect('signup');
                }

                if($this->insertingServiceProvider($db, 'band')) {
                    message("Your profile was created successfully. Please Verify Email to Continue", false, "success");
                    redirect('mailer/email_verification');
                } else {
                    message("Error - Service Provider creation failed", false, 'failed');
                    redirect('signup');
                }

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

                // Add user info to the database (and to the service provider table)
                if(!$this->insertingUser($user, $db, 'venuem',true)) {
                    message("Initial user creation failed", false, 'failed');
                    redirect('signup');
                }

                if($this->insertingServiceProvider($db, 'venuem')) {
                    message("Your profile was created successfully. Please Verify Email to Continue", false, "success");
                    redirect('mailer/email_verification');
                } else {
                    message("Error - Service Provider creation failed", false, 'failed');
                    redirect('signup');
                }

            } else {
                message("Your profile was created failed", false, "failed");
                $data['errors'] = $user->errors;
                $data['prev'] = $_POST;
            }

        }

        $data['prev'] = (object)$data['prev'];
        $this->view('includes/auth/signup_client', $data);
    }


    private function insertingUser(User $user, Database $db, String $user_type = 'client', Bool $service_provider = false): bool
    {
        try {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();

            $_POST['user_type'] = $user_type;

            // Inserting data to the user table
            $user->insert($_POST);

            // Inserting session data for email_verification process
            $_SESSION['email_verification']['user_id'] = $_POST['user_id'];
            $_SESSION['email_verification']['email'] = $_POST['email'];
            $_SESSION['email_verification']['name'] = $_POST['fname'] . " " . $_POST['lname'];

            if($service_provider) {
                // Inserting data to the service provider table
                $db->query("
                    INSERT INTO serviceprovider(user_id, sp_type) 
                    VALUES (:user_id, :sp_type)",
                    ['user_id' => $_POST['user_id'], 'sp_type' => $user_type]);
            }

            return true;
        } catch (Exception $e) {
            message("Error occurred", false, 'failed');
            show($e);
            return false;
        }
    }

    private function insertingServiceProvider(Database $db, $user_type): bool
    {
        try {
            // Getting the sp_id from the inserted record
            $sp_id = $db->query("SELECT * FROM serviceprovider WHERE user_id = :user_id LIMIT 1", ['user_id' => $_POST['user_id']])[0]->sp_id;

            // Inserting the user to the relevant user_type table

            switch ($user_type) {
                case 'venuem':
                    $db->query("INSERT INTO venuemanager (sp_id) VALUES (:sp_id)", ['sp_id' => $sp_id]);
                    break;

                case 'band':
                    $db->query("INSERT INTO band (sp_id, location) VALUES (:sp_id, :location)", ['sp_id' => $sp_id, 'location' => $_POST['location']]);
                    break;

                case 'singer':
                    $db->query("INSERT INTO singer (sp_id, rate) VALUES (:sp_id, :rate)", ['sp_id' => $sp_id, 'rate' => $_POST['rate']]);
                    break;

                default:
                    break;
            }

            return true;

        } catch (Exception $e) {

            // If the sp_id was not found, delete the inserted user data to go back to the previous state
            $db->query("DELETE FROM user WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);

            return false;

        }
    }

}