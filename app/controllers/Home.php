<?php

class Home extends Controller{
    public function index() {
        $this->view('home');
    }

    public function events($id = null, $method = null) {
        $data['record'] = array(
            array(
                'event_id' => 1,
                'name' => 'Yaathra',
                'details' => "Details About the Event",
                'ticketing_plan' => "5000*20/3000*30/2000*50",
                'venue_id' => 2,
                'band_id' => 1,
                'vuser_id' => 2,
                'venueO_id' => 3,
                'DateTime' => "2023-11-13",
                'image' => "event-01.jpeg"
            ),
            array(
                'event_id' => 2,
                'name' => 'Melody Friday',
                'details' => "Details About the Second Event",
                'ticketing_plan' => "4500*10/2500*30/1500*50",
                'venue_id' => 4,
                'band_id' => 3,
                'vuser_id' => 1,
                'venueO_id' => 4,
                'DateTime' => "2023-10-20",
                'image' => "event-02.jpeg"
            )
        );

        if(empty($id)) $this->view('events', $data);
        else if($method == "buy") {
            $this->view('common/events/buy-tickets');
        } else {
            $this->view('common/events/details');
        }
    }

    public function ads($id = null) {

        $db = new Database();
        $data['ads'] = $db->query("SELECT * FROM ads");

        $this->view('pages/ads', $data);
    }

    public function complain($method=NULL, $id = null) {

        if(empty($method))
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $_POST['user_id'] = Auth::getUser_id();
                $complain = new Complaint();
                $complain->insert($_POST);
                message("Complaint Created Successfully");
                redirect('home');
            }

            $this->view('pages/complains/create_complain');
        }
        else if($method == "list_complain")
        {

            $complain = new Complaint();
            $data['complains'] = $complain->where(['user_id'=>Auth::getUser_id()]);

            $this->view('pages/complains/list_complain', $data);
        }
        else if($method == "update_complain")
        {
            if(empty($id)) redirect('home/complain/list_complain');

            $complain = new Complaint();

            if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $db = new Database();
                $_POST['comp_id'] = $id;
                $db->query("UPDATE complaints SET details = :details, files = :files WHERE comp_id = :comp_id", $_POST);
                message("Complaint Updated Successfully");
                redirect('home/complain/list_complain');
            }


            $data['row'] = $complain->first(['comp_id'=>$id]);

            $this->view('pages/complains/update_complain', $data);
        }
        else if($method == "delete_complain") {
            if ($_SERVER['REQUEST_METHOD'] == "GET")
            {
                $db = new Database();
                $_POST['comp_id'] = $id;
                $db->query("DELETE FROM complaints WHERE comp_id = :comp_id", $_POST);
                message("Complaint Deleted Successfully");
                redirect('home/complain/list_complain');
            }
        }
    }

}