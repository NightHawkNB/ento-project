<?php

/** @noinspection ALL */

class Venuem extends SP {

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_venuem()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function events($method = null)
    {

        $db = new Database();

        if (empty($method)) {
            $data['records'] = $db->query("SELECT * FROM event");
            $this->view('venuem/events/your-events', $data);
        } else {
            message("Page not found");
            redirect('venuem/events');
        }
    }

    public function staff($method = null, $id = null) {

        $user = new User();
        $db = new Database();
        $venue = new Venue();

        if ($method == 'insert'){

            if($_SERVER['REQUEST_METHOD'] == "POST"){

                if($user->validate_vo($_POST)){

                    $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();
                    $_POST['user_type'] = 'venueo';
                    $user_id = $_POST['user_id'];

                    $venueM_id = $db->query("
                        SELECT * FROM user 
                            JOIN serviceprovider ON serviceprovider.user_id = user.user_id
                            JOIN venuemanager ON serviceprovider.sp_id = venuemanager.sp_id
                        WHERE user.user_id = :user_id
                        ", ['user_id' => Auth::getUser_id()])[0]->venueM_id;

                    $user_status = $user->insert($_POST);
                    show($user_status);
                    $sp_status = $db->query("INSERT INTO serviceprovider (user_id, sp_type) VALUES (:user_id, :sp_type)", ['user_id' => $user_id, 'sp_type' => 'venueo']);
                    show($sp_status);
                    $sp_id = $db->query("SELECT * FROM serviceprovider WHERE user_id = :user_id LIMIT 1", ['user_id' => $user_id])[0]->sp_id;
                    show($sp_id);
                    $vo_status = $db->query("INSERT INTO venueoperator (sp_id, venueM_id) VALUES ($sp_id, $venueM_id)");
                    show($vo_status);

                    message("User Inserted Successfully", false, "success");
                    redirect('venuem/staff');
                } else {
                    message("Data validation failed", false, "failed");
                }
            }

            $this->view('venuem/staff/insert_staff');

        } else if ($method == 'delete'){

            if(!empty($id)) {
                $user->query("DELETE FROM user WHERE user_id = :user_id", ['user_id' => $id]);
                message("User deleted !", false, "success");
            } else {
                message("Invalid User ID !", false, "failed");
            }

            redirect("venuem/staff");

        } else if ($method == 'update'){

            if(!empty($id)) {

                $data['user'] = $user->first(['user_id' => $id]);

                if($_SERVER['REQUEST_METHOD'] == "POST"){

                    $data['user'] = $user->first(['user_id' => $id]);

                    $_POST['terms'] = 1;

//                    Debug Lines
//                    if($user->validate($_POST)) echo "valid";
//                    else show($user->errors);

                    if($user->validate_vo($_POST)){
                        $_POST['user_id'] = $id;

                        $user->update($id, $_POST);

                        message("User Updated Successfully", false, "success");
                        redirect('venuem/staff');
                    } else {
                        message("Data validation failed", false, "failed");
                    }
                }

            } else {
                message("Invalid User ID", false, "failed");
                redirect("venuem/staff");
            }

            $this->view('venuem/staff/update_staff', $data);

        } else {
            // BUG Possible vulnarability

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $json_data = file_get_contents("php://input");

                // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
                $php_data = json_decode($json_data);

                $venueO_id = $php_data->venueO_id;

                if($php_data->venue_id != "not-set") {
                    $venue_id = $php_data->venue_id;
                } else {
                    $venue_id = NULL;
                }

                $db->query("
                    UPDATE venueoperator SET venue_id = :venue_id
                        WHERE venueO_id = :venueO_id",
                    ['venue_id' => $venue_id, 'venueO_id' => $venueO_id]);

                die;
            }

            $venuem_data = $db->query("
                SELECT * FROM user 
                    JOIN serviceprovider ON serviceprovider.user_id = user.user_id
                    JOIN venuemanager ON serviceprovider.sp_id = venuemanager.sp_id
                WHERE user.user_id = :user_id
                ", ['user_id' => Auth::getUser_id()])[0];

            $data['users'] = $user->query("
                SELECT * FROM user 
                         JOIN serviceprovider ON user.user_id = serviceprovider.user_id
                         JOIN venueoperator ON serviceprovider.sp_id = venueoperator.sp_id
                         WHERE venueoperator.venueM_id = :venueM_id", ['venueM_id' => $venuem_data->venueM_id]);

            $data['venues'] = $venue->where(['venueM_id' => $venuem_data->venueM_id]);

            $this->view('venuem/staff/manage_staff', $data);
        }
    }
}
