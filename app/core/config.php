<?php

//* App Data
define('APP_NAME', 'ENTO');
define('APP_DESC', 'Musical Event Planning');


//* DB Connection Data

if($_SERVER['SERVER_NAME'] == 'localhost') {

    //? config for your local server
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'ento_db');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_DRIVER', 'mysql');

    //? ROOT path
    define('ROOT', 'http://localhost/ento-project/public');

} else {

    //? cinfig for your web server
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'ento_db');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_DRIVER', 'mysql');

}