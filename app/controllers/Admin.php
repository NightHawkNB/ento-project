<?php

Class Admin extends Controller{




    public function index(){
        $this->view('common/dashboard');
    }

    public function ccareq(){
        $this->view('admin/ccarequests');
    }

    public function usermng($method = null) {
        if ($method == 'CCA') {
            $this->view('admin/ccaaccounts');
        } else if ($method == 'Admin'){
            $this->view('admin/adminaccounts');
        }else if ($method == 'SP'){
            $this->view('admin/spaccounts');
        }else if ($method == 'Client'){
            $this->view('admin/clientaccounts');
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