<?php
class Client extends Controller {
  public function index() {
      $this->view('common/dashboard');
  }

  public function profile($method = null) {
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
          redirect('client/profile');
      }
  }

  public function event($page = null) {

      $ads = new Ad();
      $data['ads'] = $ads->where(['pending' => 0]);

      if($page == null) $this->view('common/events/create_event');
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
}