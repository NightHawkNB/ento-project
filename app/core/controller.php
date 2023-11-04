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

        if(Auth::is_client()) {
            message("Access Denied");
            redirect("home");
        }

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
        } else if($method == 'event-list') {
            $this->view("common/reservations/event-list");
        } else if($method == 'event-details') {
            $this->view("common/reservations/event-details");
        } else {
            message("Page not found");
            redirect("$row->user_type/reservations");
        }
    }


    public function ads($method = null, $id = null)
    {

        $ads = new Ad();
        $user = new User();
        $user_data = $user->first(['user_id' => Auth::getUser_id()]);

        $data['ads'] = [];

        if (empty($method)) {
            $data['ads'] = $ads->where(['pending' => 0, 'deleted' => 0, 'user_id' => $user_data->user_id]);
            $this->view('common/ads/your-ads', $data);
        } else if ($method == 'all-ads') {
            $data['ads'] = $ads->where(['pending' => 0, 'deleted' => 0]);
            $this->view('common/ads/all-ads', $data);
        } else if ($method == 'create-ad') {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if($ads->validate($_POST)) {

                    $_POST['user_id'] = Auth::getUser_id();

                    // Generating a unique ad_id
                    $_POST['ad_id'] = "AD_".rand(10, 100000)."_".time();

                    // Checking for valid file and moving to public folder
                    $allowed_types = ['image/jpeg', 'image/png'];
                    $direct_folder = getcwd()."\assets\images\ads".DIRECTORY_SEPARATOR;
                    $remote_folder = ROOT."/assets/images/ads/";

                    /*  IMPORTANT
                     *  When saving a file, we have to use a static path since we can't save files via a remote path (url)
                     *  Viewing a file cannot be done using a static path and can only be done by remote path
                     *  So save the file using the static path
                     *  But save the remote path to the database so it can be viewed
                     *  TODO deleting an ad doesn't delete the image stored
                     */

                    if(!empty($_FILES['image']['name'])) {
                        if($_FILES['image']['error'] == 0) {
                            if(in_array($_FILES['image']['type'], $allowed_types)) {
                                $temp_name = explode(".", $_FILES['image']['name']);
                                $destination = $direct_folder.$_POST['ad_id'].".".end($temp_name);
                                move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                                $_POST['image'] = $remote_folder.$_POST['ad_id'].".".end($temp_name);
                            } else {
                                message("Image type should be JPG/JPEG/PNG");
                                redirect(strtolower($user_data->user_type)."/ads");
                            }
                        } else {
                            message("Error occurred - Couldn't upload the file");
                            redirect(strtolower($user_data->user_type)."/ads");
                        }
                    } else {
                        message("Cannot have empty file name");
                        redirect(strtolower($user_data->user_type)."/ads");
                    }

                    $ads->insert($_POST);

                    // Code for inserting data to the ad_singer table
                    // Insert data to ads and ad_singer table separately
                    if($_POST['category'] == "singer") {
                        $ad_singer = new Ad_singer();

                        $ad_singer->insert($_POST);
                    } else if($_POST['category'] == "band") {
                        $ad_band = new Ad_band();

                        $ad_band->insert($_POST);
                    } else if($_POST['category'] == "venue") {
                        $ad_venue = new Ad_venue();

                        $ad_venue->insert($_POST);
                    }

                    message("Ad Creation successful");
                    redirect(strtolower($user_data->user_type)."/ads");
                } else {
                    message("Data validation failed");
                    $data['errors'] = $ads->errors;
                    redirect(strtolower($user_data->user_type)."/ads/create-ad", $data);
                }
            }

            $this->view('common/ads/create-ad');

        } else if ($method == 'update-ad') {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (empty($id)) {
                    message("No id given for updating");
                    redirect(strtolower($user_data->user_type)."/ads");
                }

                if($ads->validate($_POST)) {
                    $_POST['ad_id'] = $id;
                    $_POST['pending'] = 1;
                    $ads->update($id, $_POST);
                    message("Update successfully - Ad is now in Pending State");
                    redirect(strtolower($user_data->user_type)."/ads");
                }

            } else if (empty($id)) {
                message("No ad selected");
                redirect(strtolower($user_data->user_type).'/ads');
            } else {
                $data['ads'] = $ads->first(['ad_id' => $id]);
                if (empty($data['ads'])) {
                    message("No data found");
                }

                $this->view('common/ads/update-ad', (array)$data);
            }

        } else if ($method == 'delete-ad') {

            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if (empty($id)) {
                    message("No id given for deleting");
                    redirect(strtolower($user_data->user_type)."/ads");
                }

                show($id);

                $ads->update($id, ['ad_id' => $id, 'deleted' => 1]);
                message("Deleted successfully");
                redirect(strtolower($user_data->user_type)."/ads");
            }

        } else if($method == "pending") {
            $data['ads'] = $ads->where(['pending' => 1, 'deleted' => 0, 'user_id' => $user_data->user_id]);
            $this->view("common/ads/pending", $data);
        } else {
            message("Page not found");
            redirect(strtolower($user_data->user_type).'/ads');
        }
    }
}