<?php

class Signup extends Controller{
    public function index($method = null): void
    {

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

        if(empty($method)) {
            // View the user type selection page before redirecting to the signup form

            $this->view('includes/auth/user_type');

        } else if($method == "client") {
            // Client's signup form

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if($user->validate($_POST)) {

                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();

                    // Data from the form containing common information are stored in the session
                    // For saving previous state of data
                    $_SESSION['user_data'] = $_POST;

                    // Inserting data to the user table
                    $user->insert($_POST);


                    message("Your profile was created successfully. Please Login", false, "success");
                    redirect('login');

                } else {
                    message("Your profile creation failed", false, 'failed');
                    $data['errors'] = $user->errors;
                    $data['prev'] = $_POST;
                }
            }

            $data['prev'] = (object)$data['prev'];
            $this->view('includes/auth/signup_client', $data);

        } else if($method == "serviceprovider") {
            // Service providers signup form

            if($_SERVER['REQUEST_METHOD'] == "POST") {
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
                    ['user_id' => $_POST['user_id'], 'sp_type' => $_POST['user_type']]);

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

                    message("User Creation Error - SP", false, 'failed');
                    redirect('signup');
                }

                // Inserting data to the specific user type
                switch ($_POST['user_type']) {
                    case 'singer':
                        $user_type_check = $db->query("INSERT INTO singer (sp_id, rate) VALUES (:sp_id, :rate)", ['sp_id' => $sp_id, 'rate' => $_POST['rate']]);
                        break;

                    case 'band':
                        $user_type_check = $db->query("INSERT INTO band (sp_id, packages, location) VALUES (:sp_id, :packages, :location)", ['sp_id' => $sp_id, 'packages' => $_POST['packages'], 'location' => $_POST['location']]);
                        break;

                    case 'venuem':
                        $user_type_check = $db->query("INSERT INTO venuemanager (sp_id) VALUES (:sp_id)", ['sp_id' => $sp_id]);
                        break;

                    default:
                        message("Invalid User Type", false, 'failed');
                        redirect('signup');
                        break;
                }


                if($_POST['user_type'] != 'event_manager') {
                    // TODO
                    // Content related to Event_manager
                    show('Event Manager Data');
                }
            }

            $data['prev'] = (object)$data['prev'];
            $this->view('includes/auth/signup_sp', $data);

        }

    }
}