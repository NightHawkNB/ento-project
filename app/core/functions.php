<?php

function show($stuff) {
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function set_activated($needle) : string {
    return str_contains($_SERVER['REQUEST_URI'], $needle) ? 'activated' : '';
}

function set_value($default) {
    if(!empty($default)) return $default;
    else return '';
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

function resize_image($filename, $max_size = 700): void
{
    $ext = mime_content_type($filename);
    $ext = explode("/", $ext);;
    $ext = end($ext);

    if(file_exists($filename)) {
        switch ($ext) {
            case 'webp':
                $image = imagecreatefromwebp($filename);
                break;
            case 'png':
                $image = imagecreatefrompng($filename);
                break;
            default:
                $image = imagecreatefromjpeg($filename);
                break;
        }

        $src_w = imagesx($image);
        $src_h = imagesy($image);

        if($src_w > $src_h) {
            $dst_w = $max_size;
            $dst_h = ($src_h/$src_w) * $max_size;
        } else {
            $dst_w = ($src_w/$src_h) * $max_size;
            $dst_h = $max_size;
        }

        $dst_image = imagecreatetruecolor($dst_w, $dst_h);
        imagecopyresampled($dst_image, $image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);

        imagedestroy($image);
        imagewebp($dst_image, $filename, 90);
        imagedestroy($dst_image);
    }
}