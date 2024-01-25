<?php
class Client extends Controller {

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
      $this->view('common/dashboard');
  }

  public function event($page = null): void
  {

      $ads = new Ad();
      $data['ads'] = $ads->where(['pending' => 0]);

      if($page == "create-event") $this->view('common/events/create_event');
      else if($page == 2) $this->view('common/events/create_event_2');
      else if($page == 3) {
          $data['ads'] = $ads->where(['pending' => 0, 'category' => 'venue']);
          $this->view('common/events/create_event_3', $data);
      } else if($page == 4) {
          $data['ads'] = $ads->where(['pending' => 0, 'category' => 'band']);
          $this->view('common/events/create_event_4', $data);
      } else if($page == 5) {
          $data['ads'] = $ads->where(['pending' => 0, 'category' => 'singer']);
          $this->view('common/events/create_event_5', $data);
      } else if($page == 'confirm') {
          $this->view('common/events/create_event_confirm');
      } else if($page == 'confirm-check') {
          message("Event Created");
          redirect('client/event');
      } else if($page == null) {
          redirect('client/manage');
      } else {
          message('No such page exists');
          $this->view('common/events/create_event');
      }
  }

  public function manage($page = null): void
  {
      $event = new Event();

      if(empty($page)) {
          $data['events'] = $event->query("SELECT * FROM event");
          $this->view('common/events/manage/list', $data);
      } else if(is_numeric($page)) {
          $data['events'] = $event->query("SELECT * FROM event WHERE event_id = $page");
          $tickets = explode('/', $data['events'][0]->ticketing_plan);
          foreach($tickets as $ticket) $ticket = explode('*', $ticket);
          $data['events'][0]->ticketing_plan = $tickets;
          $this->view('common/events/manage/details', $data);
      }
  }

  public function other_reservations(): void
  {
      $this->view('client/res-other');
  }

  public function  complaints(): void
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

      if (empty($method)){
          $data['tickets'] = $db->query("SELECT * FROM tickets JOIN event ON tickets.event_id = event.event_id JOIN venue ON event.venue_id = venue.venue_id");
          $this->view('common/events/tickets/view_tickets', $data);
      }
      else if ($method == "delete"){
          $ticket = new Tickets();
          $ticket->update($id, ['ticket_id' => $id, 'deleted' => 1]);
          message("Deleted successful.");
          redirect("client/tickets");
      }
  }

  //reservations
  public function reservations($method = null, $id = null, $action = null) : void
  {
      $db = new Database();
      $data['reservations'] = $db->query('SELECT *
      FROM resrequest
      INNER JOIN ads
      ON resrequest.ad_id = ads.ad_id
      WHERE resrequest.user_id = :user_id ORDER BY resrequest.createdDate', ['user_id' => Auth::getUser_id()]);

      $this->view('client/reservations', $data);

  }

  //reserve a service provider using Ad
  public function reservation_form($id= null) : void
  {
      $db = new Database();

      $sp_id = $db->query("SELECT * FROM ads
        INNER JOIN serviceprovider
        ON ads.user_id = serviceprovider.user_id WHERE ads.ad_id = :ad_id", ['ad_id' => $id])[0]->sp_id;

      // Generating a unique res_id
      $new_id = "RES_" . rand(10, 100000) . "_" . time();

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST['req_id'] = $new_id;
          $_POST['user_id'] = Auth::getUser_id();
          $_POST['sp_id'] = $sp_id;
          $_POST['reservation_id'] = $new_id;
          $_POST['ad_id'] = $id;


          $resreq = new Resrequest();
          $resreq->insert($_POST);

          redirect("client/reservations");
      }

      $this->view('client/reservation_form');
  }

    public function bought_tickets($method = null, $id = null, $action = null) : void
    {
        $db = new Database();

        $data['bought_tickets']=$db->query('SELECT 
        event.name AS ename,event.details,event.start_time,event.end_time,event.image,tickets.hash, venue.name AS vname
        FROM event
        INNER JOIN  tickets
        ON event.event_id = tickets.event_id
        INNER JOIN venue
        ON venue.venue_id = event.venue_id
        WHERE tickets.user_id = :user_id ', ['user_id'=> Auth::getUser_id()]);

        $this->view('client/bought_tickets', $data);
    }

}