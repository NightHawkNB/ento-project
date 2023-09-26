<?php
class Client extends Controller {
  public function index() {
      $this->view('client/dashboard');
  }
  public function profile() {
    $this->view('common/profile/overview');
}
}