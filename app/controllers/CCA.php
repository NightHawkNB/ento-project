<?php
public function __construct()
{
    if (!Auth::logged_in()) {
        message("Please Login");
        redirect('home');
    }

    if (!Auth::is_cca()) {
        message("Access Denied");
        redirect('home');
        }
}
class CCA extends Controller{

    public function index(){
        $this->view("common/dashboard");
    }

    public function profile(){

        $user = new User();

        $data['user'] = $row = $user->first(['user_id' => Auth::getUser_id()]);

        $this->view("common/profile/overview", $data);
    }
}