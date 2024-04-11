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
        $comp = new Complaint();
        $data["complaints"] = $comp->query("SELECT * FROM complaints WHERE deleted = :deleted LIMIT 3", ["deleted"=>0]);
        $uservreq = new Uservreq();
        $data["uservreqs"] = $uservreq->query("SELECT * FROM uservreq ORDER BY timestamps DESC LIMIT 3");
        $this->view("CCA/dashboard",$data);
    }

    public function complaints($method = null, $id = null, $id2 = null){
        if($method == "assists"){
            if(empty($id)){
    
                $req = new Assist_req();
                $data['assists'] = $req->get_all();
                $this->view("cca/assist_requests", $data);
    
            } else if(is_numeric($id)) {
    
                $req = new Assist_req();
    
                if(!$req->where(['comp_id' => $id])) $req->insert(['comp_id' => $id]);
    
                $complaint = new Complaint();
                $complaint->update($id, ['comp_id' => $id, 'status' => "Assist"]);
    
                message("Assistance Request Created");
                redirect("cca/complaints");
    
            } else if($id == "delete") {
    
                $complaint = new Complaint();
                $complaint->update($id2, ['comp_id' => $id2, 'status' => "Accepted"]);
    
                $req = new Assist_req();
                $req->query("DELETE FROM complaint_assist WHERE comp_id = :comp_id", ['comp_id' => $id2]);
    
                message("Assistace Request Deleted Successfully");
                redirect("cca/complaints/assists");
    
            } else if($id == "update") {
    
                $req = new Assist_req();
    
                if($_SERVER['REQUEST_METHOD'] == "POST") {
    
                    $req->query("UPDATE complaint_assist SET comment = :comment WHERE comp_id = :comp_id", ['comp_id' => $id2, 'comment' => $_POST['comment']]);
    
                    message("Assistace Request Updated Successfully");
                    redirect("cca/complaints/assists");
                }
    
                $row = $req->where(['comp_id' => $id2]);
                $data['assists'] = $row[0];
                $this->view("pages/complaints/update_assist", $data);
    
            } else {
    
                message("Invalid URL");
                redirect("cca/complaints");
    
            }
        } else if($method == "handle") {
    
            $req = new Assist_req();
            $req->query("DELETE FROM complaint_assist WHERE comp_id = :comp_id", ['comp_id' => $id]);
    
            $complaints = new Complaint();
            $complaints->update($id, ['comp_id' => $id, 'status' => "Handled"]);
    
            message("Complaint Handled");
            redirect("cca/complaints");
    
        } else {
    
            $complaints = new Complaint();
            $data['acc'] =$complaints->where(['status' => 'Accepted']);
            $data['idl'] =$complaints->where(['status' => 'Idle']);
            $data['assi'] =$complaints->where(['status' => 'Assist']);
            $data['hand'] =$complaints->where(['status' => 'Handled']);
            $this->view("CCA/view_complaints",$data);
    
    
        }
    }

    public function chat(){
        $this->view("CCA/chats");
    }

    public function verify($uservid=null){

        if(empty($uservid)){
            $ur = new Uservreq();
            $data['assists'] = $ur->get_all();
            $this->view("CCA/verify", $data);
        }else{
            $ur = new Uservreq();
            $data['assists'] = $ur->query("
            SELECT * FROM uservreq
            JOIN user
            ON user.user_id = uservreq.user_id
            WHERE uservreq.userVreq_id = :userVreq_id
        ", ['userVreq_id' => $uservid])[0];
           
            $this->view("CCA/verifydetails", $data);
        }
    }

    public function admanage(){
        $this->view("CCA/admanage");
    }
    public function test(){
        $this->view("CCA/test");
    }
}

