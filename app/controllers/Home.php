<?php

class Home extends Controller{
    public function index() {
        $data['var'] = "This is my Variable";
        $data['title'] = "ENTO | Home";
        $this->view('home', $data);
    }

    public function dashboard() {
        $db = new Database();
        $query = "SELECT * FROM user";
        $db->create_tables();
        $db->query($query);

        $data['title'] = "ENTO | Dashboard";
        $this->view('dashboard', $data);
    }

    public function viewads() {
        echo "View Ads Method of Home Controller";
    }
}