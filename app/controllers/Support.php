<?php

class Support extends Controller {
//    public function index() {
//        $this->view('pages/support/overview');
//    }

    public function  index(){
        $complaint = new Complaint();
        $data['complaints'] = $complaint->where(['user_id' => Auth::getUser_id()]);
        $this->view('pages/support/overview', $data);
    }
}