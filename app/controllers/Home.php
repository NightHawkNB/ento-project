<?php

class Home extends Controller{
    public function index() {
        $this->view('home');
    }

    public function viewads() {
        echo "View Ads Method of Home Controller";
    }
}