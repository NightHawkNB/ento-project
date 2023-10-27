<?php

// Main Controller Class

class Controller {

    public function view($view, $data = []) {

        extract($data);

        $filename = "../app/views/".strtolower($view).".view.php";
        if(file_exists($filename)) {
            require $filename;
        }else{
            echo "Could not find the view file: ".$filename;
        }
    }

    public function profile($method = null)
    {

        $user = new User();

        $data['user'] = $row = $user->first(['user_id' => Auth::getUser_id()]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
            $_POST['user_id'] = Auth::getUser_id();
            $user->update(Auth::getUser_id(), $_POST);
            redirect("$row->user_type/profile/edit-profile/" . $row->user_id);
        }

        if (empty($method)) $this->view('common/profile/overview', $data);
        else if ($method === 'edit-profile') $this->view('common/profile/edit', $data);
        else if ($method === 'settings') $this->view('common/profile/settings', $data);
        else if ($method === 'verify') $this->view('common/profile/verify', $data);
        else if ($method === 'change-password') $this->view('common/profile/change-password', $data);
        else {
            message("Page not found");
            redirect("$row->user_type/profile");
        }
    }

    public function reservations($method = null, $id = null)
    {

        $db = new Database();
        $reservation = new Reservation();
        $user = new User();
        $row = $user->first(['user_id' => Auth::getUser_id()]);

        if (empty($method)) {
            //            Getting all reservations for listing
            $data['records'] = $reservation->get_all();
            $this->view('common/reservations/your-reservations', $data);
        } else if (is_numeric($method)) {
            //            If instead of the method, a numeric value is given, then find the relevant reservation and show it
            $data['reservation'] = $reservation->where(['reservation_id' => $method]);

            if (empty($data['reservation'])) {
                message("No Reservation with that ID exists");
                redirect("$row->user_type/reservations");
            } else {
                $this->view('common/reservations/res-details-individual', $data);
            }
        } else if ($method === 'reservation-requests') {
            //                Getting all reservation requests and if id is given in the url, fetches only the one relevant
            if (empty($id)) {
                $data['requests'] = $db->query("SELECT * FROM resrequest");
                $this->view('common/reservations/reservation-requests', $data);
            } else {
                $data['requests'] = $db->query("SELECT * FROM resrequest WHERE req_id = $id");
                $this->view('common/reservations/req-details-individual', $data['requests']);
            }
        } else {
            message("Page not found");
            redirect("$row->user_type/reservations");
        }
    }
}