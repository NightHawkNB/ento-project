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

        if (empty($method)) {
            $data['users'] = $user->where(['user_type'=>'venueo']);

            $this->view('venuem/staff/manage_staff', $data);
        } else if ($method == 'insert'){

            if($_SERVER['REQUEST_METHOD'] == "POST"){

                if($user->validate_vo($_POST)){

                    $_POST['user_id'] = "USER_".rand(1000, 100000) . "_" . time();
                    $_POST['user_type'] = 'venueo';
                    $user_id = $_POST['user_id'];

                    $user_status = $user->insert($_POST);
                    show($user_status);
                    $sp_status = $db->query("INSERT INTO serviceprovider (user_id, sp_type) VALUES (:user_id, :sp_type)", ['user_id' => $user_id, 'sp_type' => 'venueo']);
                    show($sp_status);
                    $sp_id = $db->query("SELECT * FROM serviceprovider WHERE user_id = :user_id LIMIT 1", ['user_id' => $user_id])[0]->sp_id;
                    show($sp_id);
                    $vo_status = $db->query("INSERT INTO venueoperator (sp_id) VALUES ($sp_id)");
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
            $this->view('admin/usermanagement');
        }
    }
}
