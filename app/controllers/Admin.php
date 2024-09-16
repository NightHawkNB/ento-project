<?php

class Admin extends Controller
{

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_admin()) {
            message("Access Denied");
            redirect('home');
        }
    }


    public function index()
    {
        $db = new Database();

        $data['pending_ads'] = $db->query("SELECT COUNT(*) FROM ads WHERE pending=1");
        $data['pending_assreq'] = $db->query("SELECT COUNT(*) FROM complaint_assist WHERE status='Idle' ");

        $userTypeData = $db->query("SELECT user_type, COUNT(*) AS count FROM user WHERE user_type IN ('singer', 'venuem', 'band', 'eventm') GROUP BY user_type");

        $data['plabels'] = array_column($userTypeData, 'user_type');
        $data['pdata'] = array_column($userTypeData, 'count');

        $data['plabels'] = json_encode($data['plabels']);
        $data['pdata'] = json_encode($data['pdata']);


        //user accounts created for each month - line graph

        $oneYearAgoMonth = date('Y-m', strtotime('-1 year'));
        $result = $db->query("SELECT
    SUBSTRING(joined_year_month, 1, 4) AS year,
    SUBSTRING(joined_year_month, 6, 2) AS month,
    user_type,
    COUNT(*) AS count,
    (
        SELECT COUNT(*)
        FROM user u2
        WHERE u2.user_type = u.user_type
        AND u2.joined_year_month <= u.joined_year_month
    ) AS cumulative_count
FROM
    user u
WHERE
    joined_year_month >= DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 YEAR), '%Y-%m')
    AND user_type IN ('client', 'singer', 'band', 'venue', 'eventm')
GROUP BY
    SUBSTRING(joined_year_month, 1, 4),
    SUBSTRING(joined_year_month, 6, 2),
    user_type");

        $userTypeData = array();

        foreach ($result as $row) {
            $userType = $row->user_type;
            $yearMonth = $row->year . '-' . $row->month;
            $count = $row->count;
            $cumulativeCount = $row->cumulative_count;

            if (!isset($userTypeData[$userType])) {
                $userTypeData[$userType] = array();
            }

            $userTypeData[$userType][$yearMonth] = array(
                'count' => $count,
                'cumulative_count' => $cumulativeCount
            );
        }
        $data['userTypeData'] = $userTypeData;
        $data['userTypeData'] = json_encode($data['userTypeData']);


        $data['pendingband'] = $db->query("SELECT COUNT(ad_id) FROM ads WHERE pending = 1 AND category='band'");
        $data['pendingsinger'] = $db->query("SELECT COUNT(ad_id) FROM ads WHERE pending = 1 AND category='singer'");
        $data['pendingvenue'] = $db->query("SELECT COUNT(ad_id) FROM ads WHERE pending = 1 AND category='venue'");
        $data['postband'] = $db->query("SELECT COUNT(ad_id) FROM ads WHERE pending = 0 AND category='band'");
        $data['postsinger'] = $db->query("SELECT COUNT(ad_id) FROM ads WHERE pending = 0 AND category='singer'");
        $data['postvenue'] = $db->query("SELECT COUNT(ad_id) FROM ads WHERE pending = 0 AND category='venue'");


        $this->view('admin/dashboard', $data);

    }


    public function ccareq($id = null, $method = null): void
    {

        $assists = new Assist_req();

        if (!empty($id) && !empty($method)) {
            if ($method == 'handled') {

                if (empty($_POST['comment'])) {
                    $_POST['comment'] = "no comments";
                }

//                echo($_POST);


                try {
                    $assists->update($id, ['comment' => $_POST['comment']]);
                    $assists->update($id, ['status' => 'Handled']);

                    message("Assistant Complaint Handled", false, 'success');
                } catch (Exception $e) {
                    message("Assistant Complaint Handle Failed", false, 'failed');
                }

                redirect("Admin/ccareq");

            } elseif ($method == 'todo') {

                if (empty($_POST['comment'])) {
                    $_POST['comment'] = "no comments";
                }

                try {
                    $assists->update($id, ['comment' => $_POST['comment']]);
                    $assists->update($id, ['status' => 'Todo']);

                    message("Send to Todo list", false, 'success');
                } catch (Exception $e) {
                    message("Updating to Todo Failed", false, 'failed');
                }

                redirect('Admin/ccareq');

            } else {

                try {
                    $assists->update($id, ['status' => 'handled']);
                    $assists->update($id, ['admin_user_id' => $_SESSION['USER_DATA']->user_id]);
                    message("Handled Successfully", false, 'success');
                } catch (Exception $e) {
                    message("Handle - Failed", false, 'failed');
                }

                redirect("Admin/ccareq");

            }
        } elseif (!empty($id)) {
            $data['requests'] = $assists->query("
                SELECT 
                    complaint_assist.comp_id AS assist_comp_id, 
                    complaint_assist.created_at AS assist_date_time, 
                    complaint_assist.status, 
                    complaint_assist.comment AS assist_comment, 
                    complaints.details, 
                    complaints.user_id,
                    complaints.date_time AS complaint_date_time, 
                    complaints.cca_user_id,
                    CONCAT(user.fname, ' ', user.lname) AS username,
                    complaints.files,
                    complaints.comment AS cca_comment
                FROM 
                    complaint_assist 
                INNER JOIN 
                    complaints 
                ON 
                    complaint_assist.comp_id = complaints.comp_id 
                INNER JOIN 
                    user 
                ON 
                    complaints.user_id = user.user_id
                WHERE 
                    complaint_assist.deleted = 0 
                    AND 
                    complaints.comp_id = :comp_id",
                ['comp_id' => $id]
            );

            $this->view('admin/singleassrequest', $data);

        } else {
            $data['idlerequests'] = $assists->query("
                SELECT 
                    complaint_assist.comp_id, 
                    complaint_assist.created_at, 
                    complaint_assist.status, 
                    complaints.comment,
                    complaints.details,
                    complaints.cca_user_id,
                    CONCAT(user.fname, ' ', user.lname) AS username
                FROM 
                    complaint_assist 
                INNER JOIN 
                    complaints ON complaint_assist.comp_id = complaints.comp_id 
                INNER JOIN 
                    user ON complaints.user_id = user.user_id -- Assuming user_id is the common column
                WHERE 
                    complaint_assist.deleted = 0 
                    AND complaint_assist.status='Idle'  
                ORDER BY 
                    complaint_assist.created_at DESC 
            ");

            $adminId = $_SESSION['USER_DATA']->user_id;
            $data['assistrequests'] = $assists->query("
                SELECT 
                    complaint_assist.comp_id, 
                    complaint_assist.created_at, 
                    complaint_assist.status, 
                    complaints.comment,
                    complaints.details,
                    complaints.cca_user_id,
                    CONCAT(user.fname, ' ', user.lname) AS username
                FROM 
                    complaint_assist 
                INNER JOIN 
                    complaints ON complaint_assist.comp_id = complaints.comp_id 
                INNER JOIN 
                    user ON complaints.user_id = user.user_id -- Assuming user_id is the common column
                WHERE 
                    complaint_assist.deleted = 0 
                    AND complaint_assist.status='Todo'
                    AND complaint_assist.admin_user_id = $adminId
                ORDER BY 
                    complaint_assist.created_at DESC 
            ");


            if (empty($data['assistrequests'])) {
                $data['assistrequests'] = [];
            }

            $data['handledrequests'] = $assists->query("
                SELECT 
                    complaint_assist.comp_id, 
                    complaint_assist.created_at, 
                    complaint_assist.status, 
                    complaint_assist.admin_user_id,
                    complaints.comment,
                    complaints.details,
                    complaints.cca_user_id,
                    CONCAT(user.fname, ' ', user.lname) AS username
                FROM 
                    complaint_assist 
                INNER JOIN 
                    complaints ON complaint_assist.comp_id = complaints.comp_id 
                INNER JOIN 
                    user ON complaints.user_id = user.user_id -- Assuming user_id is the common column
                WHERE 
                    complaint_assist.deleted = 0 
                    AND complaint_assist.status='Handled'  
                ORDER BY 
                    complaint_assist.created_at DESC 
            ");


            if (empty($data['handledrequests'])) {
                $data['handledrequests'] = [];
            }

            $this->view('admin/ccarequests', $data);
        }
    }


    public function usermng($method = null, $id = null): void
    {

        $user = new User();

        if ($method == 'add-user') {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                show($_POST);
                $_POST['terms'] = 1;
//                if ($user->validate($_POST)) echo "Valid";
//                else show($user->errors);
//                $user->validate($_POST);
//                show($user->errors);
//                die;
                if ($user->validate($_POST)) {

                    try {
                        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        $user->insert($_POST);

                        message( "Account Created Successfully", false, 'success');
                    } catch (Exception $e) {
                        message( "Account Created Failed", false, 'failed');
                    }

                    redirect(link: "admin/usermng");
                } else {
                    message( "Validation Failed", false, 'failed');
                    $data['errors'] = $user->errors;
                }
            }

            $this->view('admin/add-user');

        } else if ($method == 'update-user') {

            $data['user'] = $user->first(['user_id' => $id]);

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($user->validate_vo($_POST)) {
                    $_POST['user_id'] = $id;
                    $user->update($id, $_POST);
                    message("User Account Updated Successfully", false, 'success');
                    redirect("Admin/usermng");
                } else {
                    message("Update Failed", false, 'failed');
                    redirect("Admin/usermng");
                }
            } else {
                $data['user_id'] = $id;
                $this->view('admin/update-user', $data);
            }

        } else if ($method == 'delete-user') {

            try {
                $user->query("DELETE FROM user WHERE user_id = :user_id", ['user_id' => $id]);
                message("Deletion Successfully", false, "success");
            } catch (Exception $e) {
                message("Deletion Failed", false, "failed");
            }

            redirect("Admin/usermng");

        } else if ($method == 'disable-user') {

            try {
                $user_data = $user->first(['user_id' => $id]);

                $user->update($id, ['disabled' => (!$user_data->disabled)]);

                if(!$user_data->disabled==1){
                    message("User Disabled Successfully", false, "success");
                }else{
                    message("User Enabled Successfully", false, "success");
                }


            } catch (Exception $e) {
                message("Failed to Disable User", false, "failed");
            }

            redirect("Admin/usermng");

        } else {

            $data['users'] = $user->query("
                SELECT  
                    user_id,
                    user_type, 
                    fname, 
                    lname, 
                    image, 
                    email,
                    disabled
                FROM user ; ");

            $this->view('admin/useraccounts', $data);
        }
    }

    public function adverify($id = null, $method = null): void
    {
        $ad = new Ad();
        $adv = new Ad_verification_request();

        if (empty($id) && empty($method)) {

            $data['singerads'] = $ad->query("
                SELECT 
                    CONCAT(user.fname, ' ', user.lname) AS username,
                    ads.title, 
                    ads.category, 
                    ads.datetime,
                    ads.image,
                    ads.ad_id
                FROM 
                    ads
                INNER JOIN 
                    user ON user.user_id = ads.user_id 
                WHERE 
                    pending=1 
                AND 
                    category='singer'
                ORDER BY 
                    ads.datetime DESC 
            ");

            $data['bandads'] = $ad->query("
                SELECT 
                    CONCAT(user.fname, ' ', user.lname) AS username,
                    ads.title, 
                    ads.category, 
                    ads.datetime,
                    ad_band.packages,
                    ads.image,
                    ads.ad_id
                FROM 
                    ads
                INNER JOIN 
                    user ON user.user_id = ads.user_id 
                INNER JOIN 
                    ad_band ON ad_band.ad_id = ads.ad_id 
                WHERE 
                    pending=1 
                AND 
                    category='band'
                ORDER BY 
                    ads.datetime DESC 
                    ");


            $data['venueads'] = $ad->query("
                   SELECT 
                        CONCAT(user.fname, ' ', user.lname) AS username,
                        ads.title, 
                        ads.category, 
                        ads.datetime,
                        ads.image,
                        ads.ad_id
                    FROM 
                        ads
                    INNER JOIN 
                        user ON user.user_id = ads.user_id 
                    WHERE 
                        pending=1 
                    AND 
                        category='venue'
                    ORDER BY 
                        ads.datetime DESC 
                    ");

            $this->view('admin/adverification', $data);

        } elseif (!empty($id) && empty($method)) {

            $data['ads'] = $ad->query("SELECT ads.ad_id, ads.datetime, ads.image, ads.details, ads.title, ads.user_id,
                     ads.contact_num, ads.category, ads.contact_email, user.email, user.fname, user.lname, user.nic_num
                     FROM ads 
                     INNER JOIN user 
                     ON ads.user_id = user.user_id  
                     WHERE ads.pending = 1 AND ads.ad_id = :ad_id", ['ad_id' => $id]);

            $this->view('admin/singlead', $data);

        } elseif (!empty($id) && $method === 'verify') {


            try {
                $update = $ad->query("UPDATE ads SET pending = 0 WHERE ad_id = :ad_id", ['ad_id' => $id]);
                message("Verification Successfully", false, 'success');
            } catch (Exception $e) {
                message("Verification Failed", false, 'failed');
            }

            redirect("Admin/adverify");

        } elseif (!empty($id) && $method === 'decline') {


            try {
                $adv->update($id, ['comment' => $_POST['declineComment']]);
                message("Advertisement Declined", false, 'success');
            } catch (Exception $e) {
                message("Advertisement Decline Failed", false, "failed");
            }

            redirect("Admin/adverify");


        } else {

            message("Ïnvalid Link");
            redirect("ädmin/dashboard");

        }
    }

    public function reservations($method = null, $id = null, $action = null): void
    {

        $db = new Database();

        if (empty($method)) {
            $data['records'] = $db->query("SELECT * FROM reservations");
            $this->view('common/reservations/your-reservations', $data);
        }
    }

    public function reports($method = null): void
    {

        $db = new Database();

//        $data['assist']=$db->query("SELECT * FROM complaint_assist");

        if (empty($method)) {
            $this->view('admin/reports');


        } else if ($method == 'useraccount_report') {

            if ($_SERVER['REQUEST_METHOD'] = 'POST') {
                $from_date = $_POST['from_date'];
                $to_date = $_POST['to_date'];


                $data['user'] = $db->query("
                    SELECT * FROM user 
                      WHERE joined_year_month 
                      BETWEEN :from_date AND :to_date
                      ORDER BY joined_year_month DESC
                  ", ['from_date' => $from_date, 'to_date' => $to_date]);


                $data['user_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS total_user_count 
                    FROM 
                        user 
                    WHERE 
                        joined_year_month BETWEEN :from_date AND :to_date
                ", ['from_date' => $from_date, 'to_date' => $to_date]);


                $data['from'] = $from_date;
                $data['to'] = $to_date;

                $this->view('admin/useraccount_report', $data);
            }


        } else if ($method == 'assistant_report') {
            $data['assist'] = $db->query("
                SELECT 
                    complaint_assist.comp_id, 
                    complaint_assist.created_at, 
                    complaints.cca_user_id,
                    complaint_assist.status,
                    complaint_assist.admin_user_id,
                    complaint_assist.handled_at,
                    CONCAT(u1.fname,' ',u1.lname) AS admin_name,
                    CONCAT(u2.fname,' ',u2.lname) AS cca_name
                FROM 
                    complaint_assist
                INNER JOIN 
                    complaints ON complaints.comp_id = complaint_assist.comp_id
                JOIN 
                    user u2 ON u2.user_id = complaints.cca_user_id
                LEFT JOIN
                    user u1 ON u1.user_id = complaint_assist.admin_user_id 
                ORDER BY 
                    complaint_assist.created_at DESC
            ");


            $data['complaint_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS total_complaint_count 
                    FROM 
                        complaints ")[0]->total_complaint_count;


            $data['assistant_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS total_assistant_count 
                    FROM 
                        complaint_assist ")[0]->total_assistant_count;

            $data['idle_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS idle_count 
                    FROM 
                        complaint_assist 
                    WHERE 
                        status='Idle'
            ")[0]->idle_count;

            $data['todo_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS todo_count 
                    FROM 
                        complaint_assist 
                    WHERE 
                        status='Todo'
            ")[0]->todo_count;

            $data['handled_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS handled_count 
                    FROM 
                        complaint_assist 
                    WHERE 
                        status='Handled'
            ")[0]->handled_count;


            $this->view('admin/assistant_report', $data);


        } else if ($method == 'adverify_report') {

            $data['adverify'] = $db->query("
                    SELECT 
                        ads.ad_id, 
                        ads.datetime, 
                        ads.title,
                        ads.category,
                        CONCAT(user.fname, ' ', user.lname) AS username
                    FROM 
                        ads
                    INNER JOIN 
                        user ON ads.user_id = user.user_id 
                    WHERE
                        pending='1'
                    ORDER BY 
                        ads.datetime DESC
            ");

            $data['singer_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS singer_count 
                    FROM 
                        ads 
                    WHERE 
                        pending='1'
                    AND
                        category='singer'
            ")[0]->singer_count;

            $data['band_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS band_count 
                    FROM 
                        ads 
                    WHERE 
                        pending='1'
                    AND
                        category='band'
            ")[0]->band_count;

            $data['venue_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS venue_count 
                    FROM 
                        ads 
                    WHERE 
                        pending='1'
                    AND
                        category='venue'
            ")[0]->venue_count;

            $data['total_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS total_count 
                    FROM 
                        ads 
                    WHERE 
                        pending='1'
            ")[0]->total_count;

            $data['decline_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS decline_count 
                    FROM 
                        ad_verification_requests 
                    WHERE 
                        comment IS NOT NULL
            ")[0]->decline_count;

            $data['approved_count'] = $db->query("
                    SELECT 
                        COUNT(*) AS approved_count 
                    FROM 
                        ads 
                    WHERE 
                        pending='0'
            ")[0]->approved_count;


            $this->view('admin/adverify_report', $data);


        } else if ($method == 'usertypes_report') {

            $data['accounts'] = $db->query("
                SELECT 
                    user_type, 
                    COUNT(*) AS count 
                FROM user 
                GROUP BY user_type 
                ORDER BY user_type
            ");


            $data['user_count'] = $db->query("
                SELECT 
                    COUNT(*) AS count 
                FROM 
                    user
            ")[0]->count;

//            show($data);
//            die;

            $this->view('admin/usertypes_report', $data);
        }


    }

    public function advertisements($method = null)
    {

        if (empty($method)) $this->view('common/ads/your-ads');

    }

}