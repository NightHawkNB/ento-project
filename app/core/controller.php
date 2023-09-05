<?php

// Main Controller Class

class Controller {

    public function view($view, $data = []) {

        extract($data);

        $filename = "../app/views/".strtolower($view).".view.php";
        if(file_exists($filename)) {
            require $filename;
        }else{
            echo "Could not find the view file: ".$filename;
        }
    }
}