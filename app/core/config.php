<?php

//* App Data
define('APP_NAME', 'ENTO');
define('APP_DESC', 'Musical Event Planning');


//* DB Connection Data

if($_SERVER['SERVER_NAME'] != 'localhost') {

    //? config for your local server

    // IMPORTANT if using docker - change the DB_HOST to host service name in the docker-composr

    define('DB_HOST', 'ento-db.cf3f7bvsmhp9.eu-north-1.rds.amazonaws.com');
    define('DB_NAME', 'ento_db');
    define('DB_USER', 'admin');
    define('DB_PASS', 'devopsENTO!');
    define('DB_DRIVER', 'mysql');

    //? ROOT path
    define('ROOT', 'http://localhost/ento-project/public');

} else {

    // For hosting within a Virtual Machine Instance

    define('ROOT', 'http://localhost/ento-project/public');
//    ? cinfig for your web server
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'ento_db');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_DRIVER', 'mysql');

}