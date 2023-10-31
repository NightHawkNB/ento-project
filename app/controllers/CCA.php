<?php

class CCA extends Controller{
    public function __construct()
{
    if (!Auth::logged_in()) {
        message("Please Login");
        redirect('home');
    }

    if (!Auth::is_cca()) {
        message("Access Denied");
        redirect('home');
        }
}

    public function index(){
        $this->view("common/dashboard");
    }
    public function complaints(){
        $com = new Complaint();
        $data['complaints'] = $com->get_all();

        $this->view("CCA/complaints", $data);
    }
    public function chat(){
        $this->view("CCA/chats");
    }
    public function verify(){
        $this->view("CCA/verify");
    }
    public function admanage(){
        $this->view("CCA/admanage");
    }
}