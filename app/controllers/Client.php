<?php
class Client extends Controller {
  public function index() {
      $this->view('common/dashboard');
  }
  public function profile() {
    $this->view('common/profile/overview');
}
}