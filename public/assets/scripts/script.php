<?php

if(isset($_POST)) {
    $json_data = file_get_contents("php://input");

    // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
    $php_data = json_decode($json_data);

    echo $php_data->name;
}