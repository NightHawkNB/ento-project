<?php

class _404 extends Controller {
    public function index() {
        $data['title'] = "404 | Page not found";
        $this->view('404', $data);
    }
}