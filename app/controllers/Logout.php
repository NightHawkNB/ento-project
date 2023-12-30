<?php

class Logout extends Controller{
    public function index() {
        Auth::logout();

        message("Logged out Successfully", false, 'success');
        redirect('home');
    }
}