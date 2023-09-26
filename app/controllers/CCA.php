<?php

class CCA extends Controller{

    public function index(){
        $this->view("CCA/dashboard");
    }

    public function profile(){

        $user = new User();

        $data['user'] = $row = $user->first(['user_id' => Auth::getUser_id()]);

        $this->view("common/profile/overview", $data);
    }
}