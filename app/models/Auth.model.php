<?php

class Auth {
    public static function authenticate($row) {
        if(is_object($row)) {
            $_SESSION['USER_DATA'] = $row;
        }
    }

    public static function logged_in() {
        if(!empty($_SESSION['USER_DATA'])) return true;
        else return false;
    }

    public static function is_admin() {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'admin') return true;
            else return false;
        }
        else return false;
    }
    
    public static function is_sp() {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'sp') return true;
            else return false;
        }
        else return false;
    }
    public static function logout() {
        if(!empty($_SESSION['USER_DATA'])) {
            unset($_SESSION['USER_DATA']);

            // Below Code erases all the session data.
            // session_unset();
            // session_regenerate_id();
        }
    }

    public static function __callStatic($method, $args) {
        $key = str_replace("get", "", strtolower($method));
        if(!empty($_SESSION['USER_DATA']->$key)) {
            return $_SESSION['USER_DATA']->$key;
        } else {
            return 'User';
        }
    }
}