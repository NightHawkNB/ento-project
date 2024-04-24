<?php

class Client extends Controller
{

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_client()) {
            message("Access Denied");
            redirect('home');
        }
    }

    public function index(): void
    {
        $event = new event();
        $data['events'] = $event->query('SELECT * FROM event');
        $this->view('client/dashboard',$data);
    }

    public function event($page = null): void
    {

        $ads = new Ad();
        $data['ads'] = $ads->where(['pending' => 0]);

        if ($page == "create-event") $this->view('common/events/create_event');
        else if ($page == 2) $this->view('common/events/create_event_2');
        else if ($page == 3) {
            $data['ads'] = $ads->where(['pending' => 0, 'category' => 'venue']);
            $this->view('common/events/create_event_3', $data);
        } else if ($page == 4) {
            $data['ads'] = $ads->where(['pending' => 0, 'category' => 'band']);
            $this->view('common/events/create_event_4', $data);
        } else if ($page == 5) {
            $data['ads'] = $ads->where(['pending' => 0, 'category' => 'singer']);
            $this->view('common/events/create_event_5', $data);
        } else if ($page == 'confirm') {
            $this->view('common/events/create_event_confirm');
        } else if ($page == 'confirm-check') {
            message("Event Created");
            redirect('client/event');
        } else if ($page == null) {
            redirect('client/manage');
        } else {
            message('No such page exists');
            $this->view('common/events/create_event');
        }
    }

    public function manage($page = null): void
    {
        $event = new Event();

        if (empty($page)) {
            $data['events'] = $event->query("SELECT * FROM event");
            $this->view('common/events/manage/list', $data);
        } else if (is_numeric($page)) {
            $data['events'] = $event->query("SELECT * FROM event WHERE event_id = $page");
            $tickets = explode('/', $data['events'][0]->ticketing_plan);
            foreach ($tickets as $ticket) $ticket = explode('*', $ticket);
            $data['events'][0]->ticketing_plan = $tickets;
            $this->view('common/events/manage/details', $data);
        }
    }

    public function other_reservations(): void
    {
        $this->view('client/res-other');
    }

    public function complaints(): void
    {
        $complaint = new Complaint();
        $data['complaints'] = $complaint->where(['user_id' => Auth::getUser_id()]);
        $this->view('pages/complaints/list_complaint', $data);
    }

    public function settings(): void
    {
        $this->view('client/settings');
    }

    public function chat(): void
    {
        $this->view('client/chat');
    }

    public function tickets($method = NULL, $id = NULL): void
    {
        $db = new Database();
        $tickets = new Tickets();

        if (empty($method)) {
            $data['tickets'] = $db->query("SELECT * FROM tickets JOIN event ON tickets.event_id = event.event_id JOIN venue ON event.venue_id = venue.venue_id");
            $this->view('common/events/tickets/view_tickets', $data);
        } else if ($method == "delete") {
            $ticket = new Tickets();
            $ticket->update($id, ['ticket_id' => $id, 'deleted' => 1]);
            message("Deleted successful.");
            redirect("client/tickets");
        }
    }

    //reservations
    public function reservations($method = null, $id = null, $action = null): void
    {

        $db = new Database();

        $currentTab = "current";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $target_id = $db->query('SELECT * FROM serviceprovider WHERE sp_id=:sp_id', ['sp_id' => $method])[0]->user_id;
//          show($target_id);
//          show($target_id[0]);
//          show($target_id[0]->user_id);
//          die;
            $_POST['reservation_id'] = $id;
            $_POST['creator_id'] = Auth::getUser_id();
            $_POST['target_id'] = $target_id;

            $review = new Review();

            $review_data = $review->where(['reservation_id' => $id]);

            if (empty($review_data)) {
                $review->insert($_POST);
            } else {
                $_POST['review_id'] = $review_data[0]->review_id;
                $review->update($id, $_POST);
            }
            $currentTab = "outdated";
            $method = "accepted";
        }

        $data['reservations'] = $db->query('SELECT *, resrequest.reservation_id AS "reservation_id"
      FROM resrequest
      INNER JOIN ads
      ON resrequest.ad_id = ads.ad_id
      LEFT OUTER JOIN review
      ON resrequest.reservation_id = review.reservation_id
      WHERE resrequest.user_id = :user_id ORDER BY resrequest.createdDate', ['user_id' => Auth::getUser_id()]);

        $data['currentTab'] = $currentTab;
//        $this->view('client/reservations/accepted', $data);
//        die;


        if ($method === "accepted") {
            $this->view('client/reservations/accepted', $data);
        } elseif ($method === "pending") {
            $this->view('client/reservations/pending', $data);
        } elseif ($method === "denied") {
            $this->view('client/reservations/denied', $data);
        }
    }

    //reserve a service provider using Ad
    public function reservation_form($id = null): void
    {
        $db = new Database();

        $sp_data = $db->query("SELECT * FROM ads
        INNER JOIN serviceprovider
        ON ads.user_id = serviceprovider.user_id WHERE ads.ad_id = :ad_id", ['ad_id' => $id])[0];
        $sp_id = $sp_data->sp_id;

        $new_id = "RESREQ_" . rand(10, 100000) . "_" . time();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['req_id'] = $new_id;
            $_POST['user_id'] = Auth::getUser_id();
            $_POST['sp_id'] = $sp_id;
            $_POST['reservation_id'] = $new_id;
            $_POST['ad_id'] = $id;

            if ($sp_data->sp_type == "venuem") {

                $venuedata = $db->query("
                SELECT * FROM ads
                JOIN ad_venue ON ad_venue.ad_id = ads.ad_id
                JOIN venue ON ad_venue.venue_id = venue.venue_id
                WHERE ads.ad_id = :ad_id
              ", ['ad_id' => $id])[0];

                $_POST['location_id'] = $venuedata->venue_id;
                $_POST['location'] = $venuedata->location;
            }
            $resreq = new Resrequest();
            $resreq->insert($_POST);

            redirect("client/reservations/pending");
        }

        $data['ad_owner_type'] = $sp_data->sp_type;
        $data['title'] = $sp_data->title;
        $data['image'] = $sp_data->image;
        $_SESSION['USER_DATA']->sp_id = $sp_id;

        $data['reservations'] = $db->query("SELECT *,
                rr.type AS reservation_type
                FROM
                reservations r
                JOIN resrequest rr
                ON r.reservation_id= rr.reservation_id
                WHERE (r.sp_id = :sp_id) ORDER BY rr.start_time", ['sp_id' => $_SESSION['USER_DATA']->sp_id]);

        $this->view('client/reservation_form', $data);
    }

    public function bought_tickets($method = null, $id = null, $action = null): void
    {
        $db = new Database();

        $data['bought_tickets'] = $db->query('SELECT 
        E.name AS ename, T.ticket_id, E.details,E.start_time,E.end_time,E.image,T.hash, V.name AS vname, E.event_id     
        FROM event E
        JOIN  tickets T ON E.event_id = T.event_id
        JOIN venue V ON V.venue_id = E.venue_id
        WHERE T.user_id = :user_id ', ['user_id' => Auth::getUser_id()]);

        $data['currentTab'] = 'current';

        $this->view('client/bought_tickets', $data);
    }


}