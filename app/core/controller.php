<?php

// Main Controller Class

class Controller
{

    // Function for handling views
    public function view($view, $data = []): void
    {

        extract($data);

        $filename = "../app/views/" . strtolower($view) . ".view.php";
        if (file_exists($filename)) {
            require $filename;
        } else {
            echo "Could not find the view file: " . $filename;
        }
    }

    // Commonly used function that handles profile related routes
    public function profile($method = null, $action = null): void
    {

        $user = new User();
        $db = new Database();

        $data['user'] = $row = $user->first(['user_id' => Auth::getUser_id()]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
            $_POST['user_id'] = Auth::getUser_id();

            $allowed_types = ['image/jpeg', 'image/png'];
            $direct_folder = getcwd() . "\assets\images\users" . DIRECTORY_SEPARATOR;
            $remote_folder = "/assets/images/users/";

            /*  IMPORTANT requires adding enctype="multipart/form-data" to form tag
             *  When saving a file, we have to use a static path since we can't save files via a remote path (url)
             *  Viewing a file cannot be done using a static path and can only be done by remote path
             *  So save the file using the static path
             *  But save the remote path to the database so it can be viewed
             *  TODO deleting an ad doesn't delete the image stored
             */

            // Removing the previous profile image was not necessary since the new file will replace the previous one
//                if(!empty($row->image)) {
//                    if(!unlink($row->image)) {
//                        message("Previous File could not be deleted");
//                    }
//                }

            if (!empty($_FILES['image']['name'])) {

                if ($_FILES['image']['error'] == 0) {
                    if (in_array($_FILES['image']['type'], $allowed_types)) {
                        $temp_name = explode(".", $_FILES['image']['name']);
                        $destination = $direct_folder . $_POST['user_id'] . "." . end($temp_name);
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                        resize_image($destination);

                        $_POST['image'] = $remote_folder . $_POST['user_id'] . "." . end($temp_name);
                        $_SESSION['USER_DATA']->image = $_POST['image'];
                    } else {
                        message("Image type should be JPG/JPEG/PNG");
                        redirect(strtolower($row->user_type) . "/profile/edit-profile");
                    }
                } else {
                    message("Error occurred - Couldn't upload the file", false, "failed");
                    redirect(strtolower($row->user_type) . "/profile/edit-profile");
                }
            } else {
                if(empty($row->image)) {
                    $_POST['image'] = "/assets/images/users/general.png";
                }
            }

            try {
                $user->update(Auth::getUser_id(), $_POST);
                $_SESSION['USER_DATA']->fname = $_POST['fname'];
                $_SESSION['USER_DATA']->lname = $_POST['lname'];

                message("Profile Updated Successfully", false, "success");
            } catch (Exception $e) {
                message('Profile Updation Failed', false, 'failed');
            }

            redirect("$row->user_type/profile/edit-profile");

        }

        if (empty($method)) redirect($row->user_type . '/profile/edit-profile');
        if ($method === 'edit-profile') {

            if($row->user_type == 'singer') {
                $data['past_events'] = $db->query("
                    SELECT E.image, E.name, E.details
                    FROM event E
                    JOIN event_singer ES ON E.event_id = ES.event_id
                    JOIN singer S ON ES.singer_id = S.singer_id
                    JOIN serviceprovider SP ON S.sp_id = SP.sp_id
                    JOIN user U ON SP.user_id = U.user_id
                    WHERE E.status = 'Completed' AND U.user_id = :user_id AND E.end_time < CURRENT_TIMESTAMP
                ", ['user_id' => Auth::getUser_id()]);
            } else if($row->user_type == 'band') {
                $data['past_events'] = $db->query("
                    SELECT E.image, E.name, E.details
                    FROM event E
                    JOIN band B ON E.band_id = B.band_id
                    JOIN serviceprovider SP ON B.sp_id = SP.sp_id
                    JOIN user U ON SP.user_id = U.user_id
                    WHERE E.status = 'Completed' AND U.user_id = :user_id AND E.end_time < CURRENT_TIMESTAMP
                ", ['user_id' => Auth::getUser_id()]);
            }

            $data['reviews'] = $db->query("
                SELECT *
                FROM review R
                JOIN user U1 ON R.creator_id = U1.user_id
                JOIN user U2 ON R.creator_id = U2.user_id
                WHERE R.target_id = :user_id
            ", ['user_id' => Auth::getUser_id()]);

            if($action == "visibility") {
                // Updating the visibility of the user based on the toggle button in the public profile page

                try {

                    $row = $user->first(['user_id' => Auth::getUser_id()]);

                    // Accessing the raw JSON data sent from the client
                    $json_data = file_get_contents("php://input");

                    // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
                    $php_data = json_decode($json_data);

                    $user->update(Auth::getUser_id(), ['visible' => $php_data->visibility]);
                    $_SESSION['USER_DATA']->visible = $php_data->visibility;

                    echo "success";
                } catch (Exception $e) {
                    echo "failed";
                }

                die;
            } else {
                $this->view('common/profile/edit', $data);
            }
        }
        else if ($method === 'settings') $this->view('common/profile/settings', $data);
        else if ($method === 'verify') $this->view('common/profile/verify', $data);
        else if ($method === 'change-password') $this->view('common/profile/change-password', $data);
        else {
            message("Page not found");
            redirect("$row->user_type/profile");
        }
    }

    public function reservations($method = null, $id = null, $action = null): void
    {

        if (Auth::is_client()) {
            message("Access Denied");
            redirect("home");
        }

        $db = new Database();
        $reservation = new Reservation();
        $user = new User();
        $row = $user->first(['user_id' => Auth::getUser_id()]);

        if (empty($method)) {

            // Getting all reservations for listing
            $input = ['deleted' => 0, 'user_id' => Auth::getUser_id(), 'status' => "Accepted"];
            if($_SESSION['USER_DATA']->user_type != "venuem") {
                $data['reservations'] = $db->query("
                SELECT * 
                FROM reservations 
                    JOIN user ON reservations.user_id = user.user_id 
                    JOIN resrequest ON reservations.reservation_id = resrequest.reservation_id 
                    JOIN serviceprovider ON serviceprovider.sp_id = reservations.sp_id 
                WHERE reservations.deleted = :deleted 
                  AND serviceprovider.user_id = :user_id 
                  AND resrequest.status = :status
            ", $input);
            } else {
                $data['reservations'] = $db->query("
                SELECT * , venue.image as venue_image
                FROM reservations 
                    JOIN user ON reservations.user_id = user.user_id 
                    JOIN resrequest ON reservations.reservation_id = resrequest.reservation_id 
                    JOIN serviceprovider ON serviceprovider.sp_id = reservations.sp_id 
                    JOIN venue ON resrequest.location_id = venue.venue_id
                WHERE reservations.deleted = :deleted 
                  AND serviceprovider.user_id = :user_id 
                  AND resrequest.status = :status
            ", $input);
            }

            $this->view('common/reservations/reservations', $data);

        } else if ($method === 'requests') {

            // Getting all reservation requests and if id is given in the url, fetches only the one relevant
            if (empty($id)) {

                $input = ['deleted' => 0, 'user_id' => Auth::getUser_id()];

                if($_SESSION['USER_DATA']->user_type == 'venuem') {
                    $data['requests'] = $db->query("
                    SELECT *, venue.image AS venue_image
                    FROM resrequest
                    JOIN user ON resrequest.user_id = user.user_id
                    JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id
                    JOIN venue ON resrequest.location_id = venue.venue_id
                    WHERE resrequest.deleted = :deleted
                      AND serviceprovider.user_id = :user_id
                      AND status IN ('Pending', 'Denied')
                ", $input);
                } else {
                    $data['requests'] = $db->query("
                    SELECT *
                    FROM resrequest
                    JOIN user ON resrequest.user_id = user.user_id
                    JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id
                    WHERE resrequest.deleted = :deleted
                      AND serviceprovider.user_id = :user_id
                      AND status IN ('Pending', 'Denied')
                ", $input);
                }

                $this->view('common/reservations/requests', $data);

            } else {

                if($action == "accept") {

                    // Generating a unique ad_id
                    $new_id = "RES_" . rand(10, 100000) . "_" . time();

                    // Updating the Reservation Request
                    $request = new Resrequest();

                    $input = [
                        'status' => "Accepted",
                        'reservation_id' => $new_id,
                        'req_id' => $id,
                        'respondedDate' => date('Y-m-d H:i:s')];

//                    show($id);
//                    die;
                    $request->update($id, $input);



                    $request_data = $request->first(['req_id' => $id]);

                    $reservation = new Reservation();

                    $input2 = [
                        'reservation_id' => $new_id,
                        'sp_id' => $request_data->sp_id,
                        'user_id' => $request_data->user_id
                    ];
                    $reservation->insert($input2);


                    // Updating the user's last response time
                    $prev_resreq = $db->query("
                        SELECT *
                        FROM serviceprovider
                        JOIN resrequest ON serviceprovider.sp_id = resrequest.sp_id
                        WHERE serviceprovider.user_id = :user_id
                    ", ['user_id' => Auth::getUser_id()])[0];

                    $current_time = new DateTime();
                    $current_response_time = $current_time->diff(new DateTime($prev_resreq->createdDate));

                    $last_resTime = implode('-',
                        [$current_response_time->y, $current_response_time->m, $current_response_time->d]
                    )." ".implode(':',
                        [$current_response_time->h, $current_response_time->i, $current_response_time->s]
                    );
                    show('last response time => '.$last_resTime);


                    $db->query('
                        UPDATE serviceprovider
                        SET last_response_time = :last_response_time
                        WHERE user_id = :user_id
                    ', ['last_response_time' => $last_resTime , 'user_id' => Auth::getUser_id()]);


                    message("Request Accepted", false, 'success');

                    redirect($_SESSION['USER_DATA']->user_type."/reservations/requests");

                } else if($action == "decline") {

                    $request = new Resrequest();
                    $request->update($id, ['status' => "Denied"]);

                    message("Request Declined");

                    redirect($_SESSION['USER_DATA']->user_type."/reservations/requests");

                } else {

                    $input = ['deleted' => 0, 'user_id' => Auth::getUser_id(), 'req_id' => $id];

                    $row_data = $db->query("
                        SELECT *, resrequest.user_id AS 'client_id' 
                        FROM resrequest JOIN user ON resrequest.user_id = user.user_id 
                        JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id
                        WHERE deleted = :deleted AND serviceprovider.user_id = :user_id and req_id = :req_id
                    ", $input);


                    $data['request'] = ($row_data) ? $row_data[0] : "";

                    $this->view('common/reservations/components/request-details', $data);

                }
            }

            // TODO Chat button functionality for reservation request details page

        } else if ($method == 'event-list') {

            $this->view("common/reservations/event-list");

        } else if ($method == 'event-details') {

            $this->view("common/reservations/event-details");

        } else {

            // If instead of the method, a value is given, then find the relevant reservation and show it
            $input = ['deleted' => 0, 'reservation_id' => $method];
            $data['reservation'] = $reservation->query("
                        SELECT *, reservations.user_id AS client_id FROM reservations 
                            JOIN user ON reservations.user_id = user.user_id 
                            JOIN resrequest ON reservations.reservation_id = resrequest.reservation_id 
                            JOIN serviceprovider ON serviceprovider.sp_id = reservations.sp_id 
                         WHERE reservations.deleted = :deleted AND reservations.reservation_id = :reservation_id
                        ", $input)[0];

            if (empty($data['reservation'])) {
                message("No Reservation with that ID exists");
                redirect("$row->user_type/reservations");
            } else {
                $this->view('common/reservations/components/reservation-details', (array)$data);
            }

        }
    }

    public function ads($method = null, $id = null): void
    {

        $db = new Database();
        $ads = new Ad();
        $user = new User();
        $user_data = $user->first(['user_id' => Auth::getUser_id()]);

        $data['ads'] = [];

        if (empty($method)) {
            $data = get_ads_where($user_data->user_id);
            $this->view('common/ads/your-ads', $data);
        } else if ($method == 'all-ads') {
            $data = get_all_ads();
            $this->view('common/ads/all-ads', $data);
        } else if ($method == "pending") {
            $data = get_ads_where($user_data->user_id, 1);
            $this->view("common/ads/pending", $data);
        } else if ($method == 'create-ad') {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($ads->validate($_POST)) {

                    $_POST['user_id'] = Auth::getUser_id();

                    // Generating a unique ad_id
                    $_POST['ad_id'] = "AD_" . rand(10, 100000) . "_" . time();

                    // Checking for valid file and moving to public folder
                    $allowed_types = ['image/jpeg', 'image/png'];
                    $direct_folder = getcwd() . "\assets\images\ads" . DIRECTORY_SEPARATOR;
                    $remote_folder = "/assets/images/ads/";

                    /*  IMPORTANT requires adding enctype="multipart/form-data" to form tag
                     *  When saving a file, we have to use a static path since we can't save files via a remote path (url)
                     *  Viewing a file cannot be done using a static path and can only be done by remote path
                     *  So save the file using the static path
                     *  But save the remote path to the database so it can be viewed
                     *  TODO deleting an ad doesn't delete the image stored
                     */

                    if (!empty($_FILES['image']['name']) && $_SESSION['USER_DATA']->user_type != 'venuem') {
                        if ($_FILES['image']['error'] == 0) {
                            if (in_array($_FILES['image']['type'], $allowed_types)) {
                                $temp_name = explode(".", $_FILES['image']['name']);
                                $destination = $direct_folder . $_POST['ad_id'] . "." . end($temp_name);
                                move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                                resize_image($destination);

                                $_POST['image'] = $remote_folder . $_POST['ad_id'] . "." . end($temp_name);
                            } else {
                                message("Image type should be JPG/JPEG/PNG");
                                redirect(strtolower($user_data->user_type) . "/ads");
                            }
                        } else {
                            message("Error occurred - Couldn't upload the file");
                            redirect(strtolower($user_data->user_type) . "/ads");
                        }
                    } else {
                        if(empty($row->image)) {
                            $_POST['image'] = "/assets/images/ads/general.png";
                        }
                    }

                    if($_SESSION['USER_DATA']->user_type == "venuem") {
                        $venue = $db->query("
                            SELECT * FROM venue WHERE venue_id = :venue_id
                        ", ['venue_id' => $_POST['venue_id']])[0];

                        $_POST['image'] = $venue->image;
                        $_POST['title'] = $venue->name;
                        $_POST['seat_count'] = $venue->seat_count;
                    }

                    $ads->insert($_POST);

                    if($_SESSION['USER_DATA']->user_type == "venuem") $db->query("UPDATE venue SET ad_exist = 1 WHERE venue_id = :venue_id", ['venue_id' => $_POST['venue_id']]);

                    // Code for inserting data to the ad_singer table
                    // Insert data to ads and ad_singer table separately
                    if ($_POST['category'] == "singer") {
                        $ad_singer = new Ad_singer();

                        $ad_singer->insert($_POST);
                    } else if ($_POST['category'] == "band") {
                        $ad_band = new Ad_band();

                        $ad_band->insert($_POST);
                    } else if ($_POST['category'] == "venue") {
                        $ad_venue = new Ad_venue();

                        $ad_venue->insert($_POST);
                    }

                    $_SESSION['USER_DATA']->ad_count += 1;
                    message("Ad Creation successful", false, 'success');
                    redirect(strtolower($user_data->user_type) . "/ads/pending");
                } else {
                    message("Data validation failed");
                    $data['errors'] = $ads->errors;
                    redirect(strtolower($user_data->user_type) . "/ads/create-ad", $data);
                }
            }

            $data = [];
            if($_SESSION['USER_DATA']->user_type == "venuem") {
                $db = new Database();
                $data['venues'] = $db->query("
                    SELECT * FROM user
                    JOIN serviceprovider ON user.user_id = serviceprovider.user_id
                    JOIN venuemanager ON serviceprovider.sp_id = venuemanager.sp_id
                    JOIN venue ON venuemanager.venueM_id = venue.venueM_id
                    WHERE user.user_id = :user_id AND deleted = 0 AND venue.ad_exist = 0
                ", ['user_id' => Auth::getUser_id()]);
            }

            $this->view('common/ads/create-ad', $data);
        } else if ($method == 'update-ad') {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (empty($id)) {
                    message("No id given for updating");
                    redirect(strtolower($user_data->user_type) . "/ads");
                }

                if ($ads->validate($_POST)) {
                    $_POST['ad_id'] = $id;
                    $_POST['pending'] = 1;

                    // Checking for valid file and moving to public folder
                    $allowed_types = ['image/jpeg', 'image/png'];
                    $direct_folder = getcwd() . "\assets\images\ads" . DIRECTORY_SEPARATOR;
                    $remote_folder = ROOT . "/assets/images/ads/";

                    /*  IMPORTANT requires adding enctype="multipart/form-data" to form tag
                     *  When saving a file, we have to use a static path since we can't save files via a remote path (url)
                     *  Viewing a file cannot be done using a static path and can only be done by remote path
                     *  So save the file using the static path
                     *  But save the remote path to the database so it can be viewed
                     *  TODO deleting an ad doesn't delete the image stored
                     */

                    if (!empty($_FILES['image']['name'])) {
                        if ($_FILES['image']['error'] == 0) {
                            if (in_array($_FILES['image']['type'], $allowed_types)) {
                                $temp_name = explode(".", $_FILES['image']['name']);
                                $destination = $direct_folder . $_POST['ad_id'] . "." . end($temp_name);
                                move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                                resize_image($destination);

                                $_POST['image'] = $remote_folder . $_POST['ad_id'] . "." . end($temp_name);
                            } else {
                                message("Image type should be JPG/JPEG/PNG");
                                redirect(strtolower($user_data->user_type) . "/ads");
                            }
                        } else {
                            message("Error occurred - Couldn't upload the file");
                            redirect(strtolower($user_data->user_type) . "/ads");
                        }
                    } else {
                        if(empty($row->image)) {
                            $_POST['image'] = ROOT."/assets/images/ads/general.png";
                        }
                    }

                    $ads->update($id, $_POST);

                    switch ($_POST['category']) {
                        case 'singer':
                            $ad_singer = new Ad_singer();
                            $ad_singer->update($id, $_POST);
                            break;
                        case 'band':
                            $ad_band = new Ad_band();
                            $ad_band->update($id, $_POST);
                            break;
                        case 'venue':
                            $ad_venue = new Ad_venue();
                            $ad_venue->update($id, $_POST);
                            break;
                        default:
                            message("Error Occured");
                            redirect(strtolower($user_data->user_type) . "/ads");
                            break;
                    }

                    message("Update successfully - Ad is now in Pending State", false, 'success');
                    redirect(strtolower($user_data->user_type) . "/ads");
                }
            } else if (empty($id)) {
                message("No ad selected");
                redirect(strtolower($user_data->user_type) . '/ads');
            } else {
                $temp = $ads->first(['ad_id' => $id]);

                $db = new Database();

                if ($temp->category == "singer") {
                    // Getting Singer Ads
                    $temp_arr_1 = ['deleted' => 0, 'category' => 'singer', 'ad_id' => $id];
                    $data['ads'] = $db->query("SELECT * FROM ads JOIN ad_singer ON ads.ad_id = ad_singer.ad_id WHERE deleted = :deleted and category = :category and ads.ad_id = :ad_id", $temp_arr_1)[0];
                } else if ($temp->category == "band") {
                    // Getting Band Ads
                    $temp_arr_2 = ['deleted' => 0, 'category' => 'band', 'ad_id' => $id];
                    $data['ads'] = $db->query("SELECT * FROM ads JOIN ad_band ON ads.ad_id = ad_band.ad_id WHERE deleted = :deleted and category = :category and ads.ad_id = :ad_id", $temp_arr_2)[0];
                } else if ($temp->category == "venue") {
                    // Getting Venue Ads
                    $temp_arr_3 = ['deleted' => 0, 'category' => 'venue', 'ad_id' => $id];
                    // LEFT join is set since we haven't added any data to the ad_band table
                    $data['ads'] = $db->query("SELECT * FROM ads JOIN ad_venue ON ads.ad_id = ad_venue.ad_id WHERE deleted = :deleted and category = :category and ads.ad_id = :ad_id", $temp_arr_3)[0];
                }

                if (empty($data['ads'])) {
                    message("No data found");
                }

                $this->view('common/ads/update-ad', $data);
            }
        } else if ($method == 'delete-ad') {

            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if (empty($id)) {
                    message("No id given for deleting");
                    redirect(strtolower($user_data->user_type) . "/ads");
                }

                show($id);

                $ads->update($id, ['ad_id' => $id, 'deleted' => 1]);
                $_SESSION['USER_DATA']->ad_count -= 1;
                message("Deleted successfully", false, 'success');
                redirect(strtolower($user_data->user_type) . "/ads");
            }
        } else {
            message("Page not found");
            redirect(strtolower($user_data->user_type) . '/ads');
        }
    }

}

function get_all_ads($pending = 0, $deleted = 0): array
{
    $ads = new Ad();
    $db = new Database();

    // Getting Singer Ads
    $temp_arr_1 = ['deleted' => $deleted, 'pending' => $pending, 'category' => 'singer'];
    $data['ad_singer'] = $db->query("SELECT * FROM ads JOIN ad_singer ON ads.ad_id = ad_singer.ad_id WHERE deleted = :deleted and PENDING = :pending and category = :category", $temp_arr_1);
    if(!$data['ad_singer']) $data['ad_singer'] = [];
    //show($data['ad_singer']);
    //die;


    // Getting Band Ads
    $temp_arr_2 = ['deleted' => $deleted, 'pending' => $pending, 'category' => 'band'];
    $data['ad_band'] = $db->query("SELECT * FROM ads JOIN ad_band ON ads.ad_id = ad_band.ad_id WHERE deleted = :deleted and PENDING = :pending and category = :category", $temp_arr_2);
    if(!$data['ad_band']) $data['ad_band'] = [];

    // Getting Venue Ads
    $temp_arr_3 = ['deleted' => $deleted, 'pending' => $pending, 'category' => 'venue'];
    // LEFT join is set since we haven't added any data to the ad_band table
    $data['ad_venue'] = $db->query("SELECT * FROM ads JOIN ad_venue ON ads.ad_id = ad_venue.ad_id WHERE deleted = :deleted and PENDING = :pending and category = :category", $temp_arr_3);
    if(!$data['ad_venue']) $data['ad_venue'] = [];

    return $data;
}

function get_ads_where($user_id, $pending = 0, $deleted = 0): array
{
    $ads = new Ad();
    $db = new Database();

    // Getting Singer Ads
    $temp_arr_1 = ['deleted' => $deleted, 'pending' => $pending, 'category' => 'singer', 'user_id' => $user_id];
    $data['ad_singer'] = $db->query("SELECT * FROM ads JOIN ad_singer ON ads.ad_id = ad_singer.ad_id WHERE deleted = :deleted and PENDING = :pending and category = :category and user_id = :user_id", $temp_arr_1);
    //show($data['ad_singer']);
    //die;


    // Getting Band Ads
    $temp_arr_2 = ['deleted' => $deleted, 'pending' => $pending, 'category' => 'band', 'user_id' => $user_id];
    $data['ad_band'] = $db->query("SELECT * FROM ads JOIN ad_band ON ads.ad_id = ad_band.ad_id WHERE deleted = :deleted and PENDING = :pending and category = :category and user_id = :user_id", $temp_arr_2);


    // Getting Venue Ads
    $temp_arr_3 = ['deleted' => $deleted, 'pending' => $pending, 'category' => 'venue', 'user_id' => $user_id];
    // LEFT join is set since we haven't added any data to the ad_band table
    $data['ad_venue'] = $db->query("SELECT * FROM ads JOIN ad_venue ON ads.ad_id = ad_venue.ad_id WHERE deleted = :deleted and PENDING = :pending and category = :category and user_id = :user_id", $temp_arr_3);

    return $data;
}