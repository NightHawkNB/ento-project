<?php

Class Admin extends Controller{




    public function index(){
        $this->view('admin/dashboard');
    }

    public function profile($method = null){

        $user = new User();

        $data['user'] = $row = $user->first(['user_id' => Auth::getUser_id()]);

        if(empty($method)) $this->view('common/profile/overview', $data);



    }

}