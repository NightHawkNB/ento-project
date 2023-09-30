<?php

class Ad extends model {

    protected $table = "ads";
    public $errors = [];

    protected $allowed_columns = [
        'user_id',
        'title',
        'details',
        'views',
        'rates',
        'image'
    ];

}