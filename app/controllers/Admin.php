<?php

class Admin extends Controller
{

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_admin()) {
            message("Access Denied");
            redirect('home');
        }
    }


    public function index()
    {
        $this->view('common/dashboard');
    }

    public function ccareq($id = null, $method = null)
    {

        $assists = new Assist_req();

        if (!empty($id) && !empty($method)) {
            if ($method == 'handled') {

                if(empty($_POST['comment'])){
                    $_POST['comment'] = "no comments";
                }

                echo($_POST);

                $assists->update($id, ['comment'=>$_POST['comment']]);
                $assists->update($id, ['status'=>'Handled']);

                message("Assistant complaint handled");
                redirect("Admin/ccareq");

            }elseif($method=='todo'){

                if(empty($_POST['comment'])){
                    $_POST['comment'] = "no comments";
                }

                $assists->update($id, ['comment'=>$_POST['comment']]);
                $assists->update($id, ['status'=>'Todo']);

                message("Send to Todo list", false , 'success');
                redirect('Admin/ccareq');

            } else {
                $update = $assists->query("UPDATE complaint_assist SET status = 'handled' WHERE comp_id = :comp_id", ['comp_id' => $id]);


                redirect("Admin/ccareq");
                message("Handled");

            }
        } elseif (!empty($id)) {
            $data['requests'] = $assists->query("
    SELECT 
        complaint_assist.comp_id AS assist_comp_id, 
        complaint_assist.date_time AS assist_date_time, 
        complaint_assist.status, 
        complaint_assist.comment, 
        complaints.details, 
        complaints.user_id,
        complaints.date_time AS complaint_date_time, 
        complaints.cca_user_id 
    FROM 
        complaint_assist 
    INNER JOIN 
        complaints 
    ON 
        complaint_assist.comp_id = complaints.comp_id 
    WHERE 
        complaint_assist.deleted = 0 
        AND 
        complaints.comp_id = :comp_id",
                ['comp_id' => $id]
            );

            $this->view('admin/singleassrequest', $data);

        } else {
            $data['idlerequests'] = $assists->query("SELECT complaint_assist.comp_id, complaint_assist.date_time, complaint_assist.status, complaint_assist.comment, complaints.user_id, complaints.cca_user_id 
        FROM complaint_assist 
        INNER JOIN complaints 
        ON complaint_assist.comp_id = complaints.comp_id 
        WHERE complaint_assist.deleted = 0 
        AND complaint_assist.status='idle'");

            $data['assistrequests'] = $assists->query("SELECT complaint_assist.comp_id, complaint_assist.date_time, complaint_assist.status, complaint_assist.comment, complaints.user_id, complaints.cca_user_id 
        FROM complaint_assist 
        INNER JOIN complaints 
        ON complaint_assist.comp_id = complaints.comp_id 
        WHERE complaint_assist.deleted = 0 
        AND complaint_assist.status='Todo'");

            $data['handledrequests'] = $assists->query("SELECT complaint_assist.comp_id, complaint_assist.date_time, complaint_assist.status, complaint_assist.comment, complaints.user_id, complaints.cca_user_id 
        FROM complaint_assist 
        INNER JOIN complaints 
        ON complaint_assist.comp_id = complaints.comp_id 
        WHERE complaint_assist.deleted = 0 
        AND complaint_assist.status='handled'");

            $this->view('admin/ccarequests', $data);
        }
    }




    public function usermng($method = null, $id = null)
    {
        if ($method == 'add-user') {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $user = new User();
                show($_POST);
                $_POST['terms'] = 1;
                if ($user->validate($_POST)) echo "Valid";
                else show($user->errors);
                if ($user->validate($_POST)) {

                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $user->insert($_POST);

                    message(msg: "Account created succesfully");
                    redirect(link: "admin/usermng");
                } else {
                    $data['errors'] = $user->errors;
                }
            }
            $this->view('admin/add-user');
        } else if ($method == 'update-user') {

            $user = new User();
            $data['user'] = $user->first(['user_id' => $id]);

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($user->validate_vo($_POST)) {
                    $_POST['user_id'] = $id;
                    $user->update($id, $_POST);
                    message("User Account updated Succesfully");
                    redirect("Admin/usermng");
                } else {
                    message("Update Failed");
                    redirect("Admin/usermng");
                }
            } else {
                $data['user_id'] = $id;
                $this->view('admin/update-user', $data);

            }

        } else if ($method == 'delete-user') {

            $user = new User();

            $user->query("DELETE FROM user WHERE user_id = :user_id", ['user_id' => $id]);

            message("Delete succesfully", false, "success");
            redirect("Admin/usermng");


        } else {
            $user = new User();

            $data['users'] = $user->query("SELECT  user_id,user_type, fname, lname, image, email FROM user ; ");


            $this->view('admin/useraccounts', $data);
        }
    }

    public function adverify($id = null, $method = null)
    {
        $ad = new Ad();

        if (empty($id) && empty($method)) {

            $data['singerads'] = $ad->query("SELECT ad_id, title, user_id, category, datetime FROM ads WHERE pending=1 and category='singer'");
            $data['bandads'] = $ad->query("SELECT ad_id, title, user_id, category, datetime FROM ads WHERE pending=1 and category='band'");
            $data['venueads'] = $ad->query("SELECT ad_id, title, user_id, category, datetime FROM ads WHERE pending=1 and category='venue'");

            $this->view('admin/adverification', $data);

        } elseif (!empty($id) && empty($method)) {

            $data['ads'] = $ad->query("SELECT ads.ad_id, ads.datetime, ads.image, ads.details, ads.title, ads.user_id,
                     ads.contact_num, ads.category, ads.contact_email, user.email, user.fname, user.lname, user.nic_num
                     FROM ads 
                     INNER JOIN user 
                     ON ads.user_id = user.user_id  
                     WHERE ads.pending = 1 AND ads.ad_id = :ad_id", ['ad_id' => $id]);

            $this->view('admin/singlead', $data);

        } elseif (!empty($id) && $method === 'verify') {

            $update = $ad->query("UPDATE ads SET pending = 0 WHERE ad_id = :ad_id", ['ad_id' => $id]);


            redirect("Admin/adverify");
            message("Verification Successfully");


        } elseif (!empty($id) && $method === 'decline') {


        } elseif (empty($id) && $method === 'back') {


        } else {

        }
    }

    public function profile($method = null): void
    {
        $user = new User();

        $data['user'] = $row = $user->first(['user_id' => Auth::getUser_id()]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
            $user->update($row->user_id, $_POST);
            redirect("singer/profile/edit-profile/" . $row->user_id);
        }

        if (empty($method)) $this->view('common/profile/overview', $data);
        else if ($method === 'edit-profile') $this->view('common/profile/edit', $data);
        else if ($method === 'settings') $this->view('common/profile/settings', $data);
        else if ($method === 'verify') $this->view('common/profile/verify', $data);
        else if ($method === 'change-password') $this->view('common/profile/change-password', $data);
        else {
            message("Page not found");
            redirect('admin/profile');
        }

    }

    public function reservations($method = null, $id = null, $action = null): void
    {

        $db = new Database();

        if (empty($method)) {
//            Getting all reservations for listing
            $data['records'] = $db->query("SELECT * FROM reservations");
            $this->view('common/reservations/your-reservations', $data);
        }
    }

    public function advertisements($method = null)
    {

        if (empty($method)) $this->view('common/ads/your-ads');

    }

}