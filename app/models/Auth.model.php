<?php

class Auth {
    public static function authenticate($row): void
    {
        if(is_object($row)) {
            $_SESSION['USER_DATA'] = $row;

            // Code to get the ad count of a Service provider and insert it into the session variable
            if($row->user_type == 'singer' OR $row->user_type == 'band' OR $row->user_type == 'venuem' OR $row->user_type == 'eventm') {
                $ads = new Ad();
                $data = $ads->where(['user_id' => $row->user_id, 'deleted' => 0]);

                if(empty($data)) $data = [];

                $_SESSION['USER_DATA']->ad_count = sizeof($data);
            }
        }
    }

    public static function logged_in(): bool
    {
        if(!empty($_SESSION['USER_DATA'])) return true;
        else return false;
    }

    public static function verified(): bool
    {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->verified == 1) return true;
            else return false;
        } else return false;
    }

    public static function is_admin(): bool
    {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'admin') return true;
            else return false;
        }
        else return false;
    }

    public static function is_cca(): bool
    {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'cca') return true;
            else return false;
        }
        else return false;
    }
    
    public static function is_singer(): bool
    {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'singer') return true;
            else return false;
        }
        else return false;
    }

    public static function is_band(): bool
    {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'band') return true;
            else return false;
        }
        else return false;
    }

    public static function is_venuem(): bool
    {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'venuem') return true;
            else return false;
        }
        else return false;
    }

    public static function is_venueo(): bool
    {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'venueo') return true;
            else return false;
        }
        else return false;
    }



    public static function is_client() : bool
    {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'client') return true;
            else return false;
        }
        else return false;
    }

    public static function is_eventm() : bool
    {
        if(!empty($_SESSION['USER_DATA'])) {
            if($_SESSION['USER_DATA']->user_type == 'eventm') return true;
            else return false;
        }
        else return false;
    }

    public static function logout() : void
    {
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

    public static function getUser_id() {
        return $_SESSION['USER_DATA']->user_id;
    }
}