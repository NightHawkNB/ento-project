<?php

Class Admin extends Controller{




    public function index(){
        $this->view('common/dashboard');
    }

    public function ccareq(){
        $this->view('admin/ccarequests');
    }

    public function usermng($method = null) {
        if ($method == 'cca') {
            $user = new User();

            $data['users'] = $user->where(['user_type'=>'cca']);

            $this->view('admin/ccaaccounts', $data);
        } else if ($method == 'admin'){
            $user = new User();

            $data['users'] = $user->where(['user_type'=>'admin']);

            $this->view('admin/ccaaccounts', $data);
        }else if ($method == 'sp'){
            $this->view('admin/spaccounts');
        }else if ($method == 'client'){
            $this->view('admin/clientaccounts');
        }else if ($method == 'add-user'){
            show($_POST);

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                
                    $user = new User();
                    $user->insert($_POST);
                    message("User Account Created Successfully");
                    redirect('admin/usermng');
            
            }

            $this->view('admin/add-user');
        }else {
            $this->view('admin/usermanagement');
        }
    }

    public function profile($method = null){
        $user = new User();

        $data['user'] = $row = $user->first(['user_id' => Auth::getUser_id()]);

        if(empty($method)) $this->view('common/profile/overview', $data);

    }

    public function reservations($method = null, $id = null){
        
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