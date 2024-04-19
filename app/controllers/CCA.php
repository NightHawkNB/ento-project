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
        $comp = new Complaint(); //get the complaint count
        $data["complaints"] = $comp->query("SELECT status, COUNT(*) AS complaints FROM complaints GROUP BY status");
        $uservreq = new Uservreq();
        $data["uservreqs"] = $uservreq->query("SELECT status, COUNT(*) AS uservreqs FROM uservreq GROUP BY status");
//        $uservreq = new Uservreq();
//        $data["uservreqs"] = $uservreq->query("SELECT status, COUNT(*) AS uservreqs FROM uservreq GROUP BY status");
        $count = new Complaint();//get new complaint count
        $data["count"] = $count->query("SELECT COUNT(*) as 'count' FROM complaints WHERE status = 'Idle'")[0]->count;
        $vcount = new Uservreq(); //get new user count
        $data["vcount"] = $vcount->query("SELECT COUNT(*) as 'vcount' FROM uservreq WHERE status = 'new' ")[0]->vcount;
        $venuecount = new Uservreq();//get new venue count
        $data["venuecount"] = $venuecount->query("SELECT COUNT(*) as 'venuecount' FROM venue WHERE venue_id ")[0]->venuecount;
        $this->view("CCA/dashboard",$data);
    }

    public function complaints($status = null, $action = null, $id = null)
    {
        if ($status == 'idle') {
            if ($action == 'accept') {
                // Accept the complaint by the cca

                try {
                    $comp = new Complaint();
                    $comp->update($id, ['status' => 'Accepted']);
                    message('Complaint Accepted', false, 'success');
                } catch (Exception $e) {
                    message('Complaint Failed to Accept', false, 'failure');
                }

                redirect('cca/complaints');


            } else if ($action == 'handle') {
                //　Handle the request

                try {
                    $comp = new Complaint();
                    $comp->update($id, ['status' => 'Handled']);
                    message('Complaint Handled', false, 'success');
                } catch (Exception $e) {
                    message('Complaint Failed to Handles', false, 'failure');
                }

                redirect('cca/complaints');
            } else {
                // Redirect with error
            }
        } elseif ($status == 'accepted') {
            if ($action == 'assists') {
                //get assist request
                try {
                    $comp = new Complaint();
                    $comp->update($id, ['status' => 'Assist']);
                    message('Complaint assist', false, 'success');
                } catch (Exception $e) {
                    message('Complaint Failed to assists', false, 'failure');
                }
                redirect('cca/complaints');
            } elseif ($action == 'handle') {
                //handle complaint
                try {
                    $comp = new Complaint();
                    $comp->update($id, ['status' => 'Handled']);
                    message('Complaint Handled', false, 'success');
                } catch (Exception $e) {
                    message('Complaint Failed to Handled', false, 'failure');
                }
                redirect('cca/complaints');
            }

        } elseif ($status == 'assists') {
            if ($action == 'update') {
                //get assist request
                try {
                    $comp = new Complaint();
                    $comp->update($id, ['status' => 'Update']);
                    message('Complaint update', false, 'success');
                } catch (Exception $e) {
                    message('Complaint Failed to update', false, 'failure');
                }
                redirect('cca/complaints');
            } elseif ($action == 'handle') {
                //get assist request

                $complaints = new Complaint();
                $data['acc'] = $complaints->where(['status' => 'Accepted']);
                $data['idl'] = $complaints->where(['status' => 'Idle']);
                $data['assi'] = $complaints->where(['status' => 'Assist']);
                $data['hand'] = $complaints->where(['status' => 'Handled']);
                $this->view("CCA/view_complaints", $data);
            }
        }elseif($status== 'complaintdetails'){
            $comp = new Complaint();
            $data['comp']= $comp->first(['comp_id'=>$action]);
            $this->view('cca/complaintdetails',$data);

        } else {


            $complaints = new Complaint();
            $data['acc'] = $complaints->where(['status' => 'Accepted','cca_user_id'=>Auth::getUser_id()]);
            $data['idl'] = $complaints->where(['status' => 'Idle']);
            $data['assi'] = $complaints->where(['status' => 'Assist','cca_user_id'=>Auth::getUser_id()]);
            $data['hand'] = $complaints->where(['status' => 'Handled']);
            $this->view("CCA/view_complaints", $data);


        }

    }
        public function chat(){
            $this->view("CCA/chats");
        }

//        public function verify($status = null, $action=null, $id=null)
//        {
//            if ($status == 'newuser') {
//                if ($action == 'null') {
//                    // Accept the newuser by the cca
//
//
//                    $ur = new Uservreq();
//                    $data['assists'] = $ur->get_all();
//                    $this->view("CCA/verify", $data);
//
//
//                    redirect('cca/complaints');
//                }
//            }
//        }

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
    public function venue(){
        $this->view("CCA/venue");
    }
}

