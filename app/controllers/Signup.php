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
            $user_type = $method;

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

                $user = new User();
                $db = new Database();

                if($user->validate($_POST)) {

                    // Inserting data to the user table
                    try {
                        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();

                        $_POST['user_type'] = $method;

                        $_POST['fname'] = ucfirst($_POST['fname']);
                        $_POST['lname'] = ucfirst($_POST['lname']);

                        // Inserting data to the user table
                        $user->insert($_POST);

                        // Inserting session data for email_verification process
//                        $_SESSION['email_verification']['user_id'] = $_POST['user_id'];
//                        $_SESSION['email_verification']['email'] = $_POST['email'];
//                        $_SESSION['email_verification']['name'] = $_POST['fname'] . " " . $_POST['lname'];

                        // TODO Event manager is temporary
                        if($method != 'client' || $method != 'eventm') {
                            // Inserting data to the service provider table
                            $db->query("
                                INSERT INTO serviceprovider(user_id, sp_type) 
                                VALUES (:user_id, :sp_type)",
                                ['user_id' => $_POST['user_id'], 'sp_type' => $method]);
                        }
                    } catch (Exception $e) {
                        message("Error occurred", false, 'failed');
                        show($e);
                        redirect('login');
                    }

                    // Add user info to the database (and to the service provider table)
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

                                // Generating a unique ad_id
                                $ad_id = "AD_" . rand(10, 100000) . "_" . time();

                                $user_id = $_POST['user_id'];
                                $name = ucfirst($_POST['fname']).' '.ucfirst($_POST['lname']);
                                $details = "Introducing the mesmerizing singer with a voice that resonates with passion and soul. Captivating audiences with every note, $name brings an unforgettable blend of talent and emotion to every performance. Experience the magic of music with $name.";
                                $category = "singer";

                                // Inserting the default ad for this user upon account creation with visibility set to 1 by default
                                $db->query("
                                    INSERT INTO ads VALUES
                                        (:ad_id, :user_id, :name, :category, :details, NULL, 0, 0, NULL, CURRENT_TIMESTAMP, 0, NULL, NULL, 1)
                                ", [
                                    'ad_id' => $ad_id,
                                    'user_id' => $user_id,
                                    'name' => $name,
                                    'category' => $category,
                                    'details' => $details
                                ]);

                                $db->query("
                                    INSERT INTO ad_singer VALUES (:ad_id, NULL)
                                ", ['ad_id' => $ad_id]);
                                break;

                            case 'eventm':

                                // Generating a unique ad_id
                                $ad_id = "AD_" . rand(10, 100000) . "_" . time();

                                $user_id = $_POST['user_id'];
                                $name = ucfirst($_POST['fname']).' '.ucfirst($_POST['lname']);
                                $details = "Introducing the mesmerizing singer with a voice that resonates with passion and soul. Captivating audiences with every note, $name brings an unforgettable blend of talent and emotion to every performance. Experience the magic of music with $name.";
                                $category = "eventm";

                                // Inserting the default ad for this user upon account creation with visibility set to 1 by default
                                $db->query("
                                    INSERT INTO ads VALUES
                                        (:ad_id, :user_id, :name, :category, :details, '/assets/images/ads/general.png', 0, 0, NULL, CURRENT_TIMESTAMP, 0, NULL, NULL, 1)
                                ", [
                                    'ad_id' => $ad_id,
                                    'user_id' => $user_id,
                                    'name' => $name,
                                    'category' => $category,
                                    'details' => $details
                                ]);

//                                $db->query("
//                                    INSERT INTO ad_singer VALUES (:ad_id, NULL)
//                                ", ['ad_id' => $ad_id]);
                                break;

                            default:
                                break;
                        }

                    } catch (Exception $e) {

                        // If the sp_id was not found, delete the inserted user data to go back to the previous state
                        $db->query("DELETE FROM user WHERE user_id = :user_id", ['user_id' => $_POST['user_id']]);

                        message("Your profile creation failed", false, "failed");
                        redirect('login');
                    }

                    message("Your profile was created successfully", false, "success");
                    redirect('login');

                } else {
                    message("Your profile creation failed", false, 'failed');
                    $data['errors'] = $user->errors;
                    $data['prev'] = (object)$_POST;
                    $this->view('includes/auth/signup', $data);
                }

            } else {
                // View the form
                $this->view('includes/auth/signup', $data);
            }

        }

    }

}