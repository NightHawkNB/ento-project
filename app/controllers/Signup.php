<?php

class Signup extends Controller{
    public function index($method = null): void
    {
        $data['errors'] = [];

        $user = new User();
        $db = new Database();

        if(empty($method)) {
            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if($user->validate($_POST)) {

                    $user_type_check = false;

                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();

                    // Data from the form containing common information are stored in the session
                    // For saving previous state of data
                    $_SESSION['user_data'] = $_POST;

                    // Inserting data to the user table
                    $user->insert($_POST);


                    if($_POST['user_type'] != 'client' AND $_POST['user_type'] != 'event_manager') {

                        // Inserting data to the service provider table
                        $db->query("
                            INSERT INTO serviceprovider(user_id, sp_type) 
                            VALUES (:user_id, :sp_type)",
                            ['user_id' => $_POST['user_id'], 'sp_type' => $_POST['user_type']]);

                        $sp_id = $db->query("
                                        SELECT * FROM serviceprovider 
                                        WHERE user_id = :user_id LIMIT 1",
                            ['user_id' => $_POST['user_id']]);

                        if($sp_id) $sp_id = $sp_id[0]->sp_id;
                        else {
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
                    }


                    if($_POST['user_type'] != 'event_manager') {
                        // TODO
                        // Content related to Event_manager
                        show('');
                    }
                    message("Your profile was created successfully. Please Login", false, "success");
                        redirect('login');
//                    if($user_type_check) {
//                        message("Your profile was created successfully. Please Login", false, "success");
//                        redirect('login');
//                    } else {
//                        $db->query("DELETE FROM user WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);
//                        $db->query("DELETE FROM serviceprovider WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);
//
//                        message("Your profile creation failed - user type check", false, "failed");
//                        redirect('signup');
//                    }


                } else {
                    message("Your profile creation failed", false, 'failed');
                    $data['errors'] = $user->errors;
                    show($user->errors);
                }
            }
        }

        
        $data['title'] = "ENTO | Signup";
        $this->view('includes/auth/signup', $data);
    }
}