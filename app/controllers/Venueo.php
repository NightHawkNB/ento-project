<?php

/** @noinspection ALL */

class Venueo extends SP {

    public function __construct()
    {
        if (!Auth::logged_in()) {
            message("Please Login");
            redirect('home');
        }

        if (!Auth::is_venueo()) {
            message("Access Denied");
            redirect('home');
        }
    }
}
