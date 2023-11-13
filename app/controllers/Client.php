<?php
class Client extends Controller {
  public function index() {
      $this->view('common/dashboard');
  }

  public function event($page = null) {

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

  public function manage($page = null) {
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

  public function event_reservations(){
      $this->view('client/res-event');
  }

  public function other_reservations(){
      $this->view('client/res-other');
  }

  public function  complaints(){
      $complaint = new Complaint();
      $data['complaints'] = $complaint->where(['user_id' => Auth::getUser_id()]);
      $this->view('pages/complaints/list_complaint', $data);
  }

  public function settings(){
      $this->view('client/settings');
  }

  public function chat(){
      $this->view('client/chat');
  }

  public function tickets($method = NULL, $id = NULL){
      $db = new Database();
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
}