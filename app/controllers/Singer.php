<?php

/** @noinspection ALL */

class Singer extends Controller
{

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_singer()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function index()
    {
        $this->view('common/dashboard');
    }

    //! Previous singer/profile method
    // public function profile($id = null) {

    //     $id = $id ?? Auth::getUser_id();

    //     $user = new User();

    //     $data['user'] = $user->first(['user_id' => $id]);
    //     $this->view('singer/profile', $data);
    // }

    public function profile($method = null)
    {

        $user = new User();

        $data['user'] = $row = $user->first(['user_id' => Auth::getUser_id()]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
            $user->update($row->user_id, $_POST);
            redirect("singer/profile/edit-profile/" . $row->user_id);
        }

        if (empty($method)) $this->view('common/profile/overview', $data);
        else if ($method === 'edit-profile') $this->view('common/profile/edit', $data);
        else if ($method === 'settings') $this->view('common/profile/settings', $data);
        else if ($method === 'verify') $this->view('common/profile/verify', $data);
        else if ($method === 'change-password') $this->view('common/profile/change-password', $data);
        else {
            message("Page not found");
            redirect('singer/profile');
        }
    }

    // Errors in the Details Page TODO
    public function reservations($method = null, $id = null)
    {

        $db = new Database();
        $reservation = new Reservation();

        if (empty($method)) {
            //            Getting all reservations for listing
            $data['records'] = $reservation->get_all();
            $this->view('common/reservations/your-reservations', $data);
        } else if (is_numeric($method)) {
            //            If instead of the method, a numeric value is given, then find the relevant reservation and show it
            $data['reservation'] = $db->query("SELECT * FROM reservations WHERE reservation_id = $method");
            if (empty($data['reservation'])) {
                message("No Reservation with that ID exists");
                redirect('singer/reservations');
            } else {
                $this->view('common/reservations/res-details-individual', $data['reservation']);
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
            redirect('singer/reservations');
        }
    }

    public function ads($method = null, $id = null)
    {

        $ads = new Ad();
        $db = new Database();
        $user = new User();
        $user_data = $user->first(['user_id' => Auth::getUser_id()]);

        $data['ads'] = [];

        if (empty($method)) {
            $data['ads'] = $db->query("SELECT * FROM ads WHERE user_id = " . $user_data->user_id);
            $this->view('common/ads/your-ads', $data);
        } else if ($method == 'all-ads') {
            $data['ads'] = $db->query("SELECT * FROM ads");
            $this->view('common/ads/all-ads', $data);
        } else if ($method == 'create-ad') {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $_POST['user_id'] = Auth::getUser_id();
                $ads->insert($_POST);
                message("Ad Creation successful");
                redirect("singer/ads");
            }

            $this->view('common/ads/create-ad');
        } else if ($method == 'update-ad') {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (empty($id)) {
                    message("No id given for updating");
                    redirect("singer/ads");
                }

                $_POST['ad_id'] = $id;
                $ads->update($id, $_POST);
                message("Update successfully");
                redirect("singer/ads");
            }

            if (empty($id))  redirect('singer/ads');

            $data['ads'] = $ads->first(['ad_id' => $id]);
            if (empty($data['ads'])) {
                var_dump($data);
                message("Fetching Data Failed");
            }
            $this->view('common/ads/update-ad', (array)$data);
        } else if ($method == 'delete-ad') {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if (empty($id)) {
                    message("No id given for updating");
                    redirect("singer/ads");
                }

                $db->query("DELETE FROM ads WHERE ad_id = $id");
                message("Deleted successfully");
                redirect("singer/ads");
            }
        } else {
            message("Page not found");
            redirect('singer/ads');
        }
    }

    public function events($method = null)
    {

        $db = new Database();

        if (empty($method)) {
            $data['records'] = $db->query("SELECT * FROM event");
            $this->view('singer/events/your-events', $data);
        } else {
            message("Page not found");
            redirect('singer/events');
        }
    }
}
