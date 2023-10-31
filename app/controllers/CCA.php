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
    public function complaints($method = null){
      
        if($method == "assist"){
            $req = new  Comp_assist();
            $data['assists'] = $req->get_all();
            this->view("pages/complaints/single");
        } else{
            $complaints =new Complaint();
            $data['complaints'] =$complaints->get_all();    
            $this->view("CCA/complaints",$data);
        }
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
    public function request_assistance($id = null){
        $req = new Comp_assist();
        $req->insert(['comp_id' => $id]);

        message("Assistance Request Created");
        redirect("cca/complaints");
        
    } 
}