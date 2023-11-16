<?php

function show($stuff) {
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function set_value($key, $default = '') {
    if(!empty($_POST[$key])) return $_POST[$key];
    else if(!empty($default)) return $default;

    return '';
}

function redirect($link) {
    header("Location: ". ROOT ."/". $link);
    die;
}

function message($msg = '', $erase = false, $status = "") {

    if(!empty($msg)) {
        $_SESSION['message'] = $msg;

        if($status == "") {
            $_SESSION['alert-status'] = "neutral";
        } else {
            $_SESSION['alert-status'] = $status;
        }
    }else{
        if(!empty($_SESSION['message'])) {
            $msg = $_SESSION['message'];
            if($erase) unset($_SESSION['message']);
            return $msg;
        }
    }

    return false;
}

// Video number - 32
function str_to_url($url) {
    $url = str_replace("'", "", $url);
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii/TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);

    return $url;
}

function esc($str) {
    return nl2br(htmlspecialchars($str));
}