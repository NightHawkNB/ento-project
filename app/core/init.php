<?php

spl_autoload_register(function ($class_name) {
    require "../app/models/".$class_name.".model.php";
});



require "../app/core/config.php";
require "../app/core/functions.php";
require "../app/core/database.php";
require "../app/core/model.php";
require "../app/core/controller.php";
require "../app/controllers/SP.php";
require "../app/core/app.php";