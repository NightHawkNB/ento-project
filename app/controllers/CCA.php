<?php

class CCA extends Controller
{
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

    public function index()
    {
        $comp = new Complaint(); //get the complaint count
        $data["complaints"] = $comp->query("SELECT status, COUNT(*) AS complaints FROM complaints GROUP BY status");
        $uservreq = new Uservreq();
        $data["uservreqs"] = $uservreq->query("SELECT status, COUNT(*) AS uservreqs FROM uservreq GROUP BY status");
        $venuevreq = new Venuevreq();
        $data["venuevreqs"] = $venuevreq->query("SELECT status, COUNT(*) AS venuevreqs FROM venuevreq GROUP BY status");
        $count = new Complaint();//get new complaint count
        $data["count"] = $count->query("SELECT COUNT(*) as 'count' FROM complaints WHERE status = 'Idle'")[0]->count;
        $vcount = new Uservreq(); //get new user count
        $data["vcount"] = $vcount->query("SELECT COUNT(*) as 'vcount' FROM uservreq WHERE status = 'new' ")[0]->vcount;
        $venuecount = new Venuevreq();//get new venue count
        $data["venuecount"] = $venuecount->query("SELECT COUNT(*) as 'venuecount' FROM venue WHERE venue_id ")[0]->venuecount;

        $this->view("CCA/dashboard", $data);
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


            }
//            else if ($action == 'handle') {
//                //　Handle the request
//
//                try {
//                    $comp = new Complaint();
//                    $comp->update($id, ['status' => 'Handled']);
//                    message('Complaint Handled', false, 'success');
//                } catch (Exception $e) {
//                    message('Complaint Failed to Handles', false, 'failure');
//                }
//
//                redirect('cca/complaints');
//            }
            else {
                // Redirect with error
            }
        } elseif ($status == 'accepted') {
            if ($action == 'assists') {
                //get assist request
                try {
                    $comp = new Complaint();
                    $comp->update($id, ['status' => 'Assist','comment' => $_POST['comment']]);
                    message('Complaint assist', false, 'success');
                } catch (Exception $e) {
                    message('Complaint Failed to assists', false, 'failure');
                }
                redirect('cca/complaints');
            } elseif ($action == 'handle') {
                //handle complaint
                try {
                    $comp = new Complaint();
                    $comp->update($id, ['status' => 'Handled','comment' => $_POST['comment']]);
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
                redirect('cca/complaints/assist');
            } elseif ($action == 'handle') {
                //get assist request

                $complaints = new Complaint();
                $data['acc'] = $complaints->where(['status' => 'Accepted']);
                $data['idl'] = $complaints->where(['status' => 'Idle']);
                $data['assi'] = $complaints->where(['status' => 'Assist']);
                $data['hand'] = $complaints->where(['status' => 'Handled']);
                $this->view("CCA/view_complaints", $data);
            }
        } elseif ($status == 'complaintdetails') {
            $status = new Complaint();
            $data['status'] = $status->first(['comp_id' => $action]);
            $db = new Database();
            $data['comp'] = $db->query("
            SELECT *
            FROM complaints
            JOIN user
            ON user.user_id = complaints.user_id
            WHERE complaints.comp_id = :comp_id
            ", ['comp_id' => $action])[0];
            show($action);
            $this->view('cca/complaintdetails', $data);
        } else {


            $complaints = new Complaint();
            $data['acc'] = $complaints->query("SELECT * FROM complaints JOIN user ON user.user_id = complaints.user_id where status = 'Accepted' AND cca_user_id=:cca_user_id",['cca_user_id'=>Auth::getUser_id()]);
            $data['idl'] = $complaints->query("SELECT * FROM complaints JOIN user ON user.user_id = complaints.user_id where status = 'Idle'");
//            $data['idl'] = $complaints->where(['status' => 'Idle']);
            $data['assi'] = $complaints->query("SELECT * FROM complaints JOIN user ON user.user_id = complaints.user_id where status = 'Assist'");
            $data['hand'] = $complaints->query("SELECT * FROM complaints JOIN user ON user.user_id = complaints.user_id where status = 'Handled'");
            $this->view("CCA/view_complaints", $data);


        }

    }

    public function chat()
    {
        $this->view("CCA/chats");
    }

    public function verify($uservid = null, $action = null)
    {

        if (empty($uservid) && empty($action)) {
            $ur = new Uservreq();
            $data['new_requests'] = $ur->query("SELECT * FROM uservreq WHERE status = 'New'");
            $data['verified'] = $ur->query("SELECT * FROM uservreq WHERE status = 'Verified'");
            $data['declined'] = $ur->query("SELECT * FROM uservreq WHERE status = 'Declined'");
            $this->view("CCA/verify", $data);

        } elseif (empty($action)) {
            $ur = new Uservreq();

            $data['assists'] = $ur->query("
            SELECT * FROM uservreq
            JOIN user
            ON user.user_id = uservreq.user_id
            WHERE uservreq.userVreq_id = :userVreq_id
        ", ['userVreq_id' => $uservid])[0];

            $this->view("CCA/verifydetails", $data);
        } else {
            if ($action == 'verified') {
                try {
                    $ur = new Uservreq();
                    $ur->update($uservid, ['status' => 'Verified']);
                    message('User Verified', false, 'success');
                } catch (Exception $e) {
                    message('User Failed to Verify', false, 'failure');
                }
            }else{
                    try {
                        $ur = new Uservreq();
                        $ur->update($uservid, ['status' => 'Declined', 'comment' => $_POST['comment']]);
                        message('User Declined', false, 'success');
                    } catch (Exception $e) {
                        message('User Failed to Declined', false, 'failure');
                    }
                }

                redirect('cca/verify');

        }
    }

    public function venue($venuevreqid = null, $action = null)
    {
        if (empty($venuevreqid) && empty($action)) {
            $venue = new Venuevreq();
            $data['newreq'] = $venue->query("SELECT * FROM venuevreq JOIN venue ON venue.venue_id=venuevreq.venue_id WHERE status= 'new'");
            $data['verify'] = $venue->query("SELECT * FROM venuevreq JOIN venue ON venue.venue_id=venuevreq.venue_id WHERE status = 'verified'");
            $data['decline'] = $venue->query("SELECT * FROM venuevreq JOIN venue ON venue.venue_id=venuevreq.venue_id WHERE status = 'declined'");
            $this->view("CCA/venue", $data);

        } elseif (empty($action)) {
            $vr = new Venuevreq();
            $data['assists'] = $vr->query("
            SELECT * FROM venuevreq
            JOIN venue
            ON venue.venue_id=venuevreq.venue_id
            WHERE venuevreq.venuevreq_id = :venuevreq_id
            ", ['venuevreq_id' => $venuevreqid])[0];

            $this->view("CCA/venuedetails", $data);
        } else {
            if ($action == 'verified') {
                try {
                    $ur = new Venuevreq();
                    $ur->update($venuevreqid, ['status' => 'Verified']);
                    message('Venue Verified', false, 'success');
                } catch (Exception $e) {
                    message('Venue Failed to Verify', false, 'failure');
                }
                redirect('cca/venue');
            }else{
                try {
                    $ur = new Venuevreq();
                    $ur->update($venuevreqid, ['status' => 'Declined','comment' => $_POST['comment']]);
                    message('Venue Declined', false, 'success');
                } catch (Exception $e) {
                    message('Venue Failed to Decline', false, 'failure');
                }

                    redirect('cca/venue');

            }
        }
    }

    public function report()
    {
        $comp = new Complaint(); //get the complaint count
        $data["complaints"] = $comp->query("SELECT * FROM complaints JOIN user ON complaints.user_id= user.user_id ORDER BY date_time ");
        $uservreq = new Uservreq();
        $data["uservreqs"] = $uservreq->query("SELECT status, COUNT(*) AS uservreqs FROM uservreq GROUP BY status");
        $venuevreq = new Venuevreq();
        $data["venuevreqs"] = $venuevreq->query("SELECT status, COUNT(*) AS venuevreqs FROM venuevreq GROUP BY status");
        $count = new Complaint();//get new complaint count
        $data["count"] = $count->query("SELECT COUNT(*) as 'count' FROM complaints WHERE status = 'Idle'")[0]->count;

        $this->view("cca/report",$data);
    }
}


