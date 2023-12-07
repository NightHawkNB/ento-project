<?php

Class Admin extends Controller{

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




    public function index(){
        $this->view('common/dashboard');
    }

    public function ccareq($id=null, $method=null){

        $assists = new Assist_req();

       if(empty($id)){
        $data['requests'] = $assists->query("SELECT complaint_assist.comp_id, complaint_assist.date_time, complaint_assist.status, complaint_assist.comment, complaints.user_id, complaints.cust_id 
        FROM complaint_assist 
        INNER JOIN complaints 
        ON complaint_assist.comp_id = complaints.comp_id 
        WHERE complaint_assist.deleted = 0");
        

        $this->view('admin/ccarequests', $data);
       }
       else{
        $data['requests'] = $assists->query("SELECT complaint_assist.comp_id, complaint_assist.date_time, complaint_assist.status, complaint_assist.comment, complaints.user_id, complaints.cust_id 
        FROM complaint_assist 
        INNER JOIN complaints 
        ON complaint_assist.comp_id = complaints.comp_id 
        WHERE complaint_assist.deleted = 0 AND complaints.comp_id = :comp_id" , ['comp_id'=>$id]); 

        $this->view('admin/singleassrequest', $data);

       }
    }

    public function usermng($method = null, $id = null) {
        if ($method == 'cca') {
            $user = new User();

            $data['users'] = $user->where(['user_type'=>'cca']);

            $this->view('admin/useraccounts', $data);
        } else if ($method == 'admin'){
            $user = new User();

            $data['users'] = $user->where(['user_type'=>'admin']);

            $this->view('admin/useraccounts', $data);
        }else if ($method == 'singer'){
            $user = new User();

            $data['users'] = $user->where(['user_type'=>'singer']);

            $this->view('admin/useraccounts', $data);
        }else if ($method == 'client'){
            $user = new User();

            $data['users'] = $user->where(['user_type'=>'client']);

            $this->view('admin/useraccounts', $data);
        }else if ($method == 'add-user'){

            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $user = new User();
                show($_POST);
                $_POST['terms']=1;
                if($user->validate($_POST)) echo "Valid";
                else show($user->errors);
                if($user->validate($_POST)) {
    
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
                    $user->insert($_POST);
    
                    message(msg:"Account created succesfully");
                    redirect(link:"admin/usermng/".strtolower($_POST['user_type']));
                } else {
                    $data['errors'] = $user->errors;
                }
            }

            $this->view('admin/add-user');
        }else if ($method == 'update-user'){

            $user = new User();
            $data['user'] = $user->first(['user_id'=>$id]);

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $_POST['terms']=1;
                if($user->validate($_POST)) echo "valid";
                else show($user->errors);
                if($user->validate($_POST)){
                    $_POST['user_id'] = $id;
                    $user->update($id, $_POST);
                    message("User Account Updated Successfully");
                    redirect('admin/usermng');
                }


        
            }


            $this->view('admin/update-user', $data);
        }else if ($method == 'delete-user'){

            $user = new User();

            if($_SERVER['REQUEST_METHOD'] == "GET"){
                
                $_POST['user_id'] = $id;
                $user->query("DELETE FROM user WHERE user_id = :user_id", $_POST);
                message("User Account Deleted Successfully");
                redirect('admin/usermng');
        
            }

        }else {
            $this->view('admin/usermanagement');
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

        if(empty($method)) {
//            Getting all reservations for listing
            $data['records'] = $db->query("SELECT * FROM reservations");
            $this->view('common/reservations/your-reservations', $data);
        }
    }

    public function advertisements($method = null) {
        
        if(empty($method)) $this->view('common/ads/your-ads');

    }
    
}