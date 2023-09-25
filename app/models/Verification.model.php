<?php

class Verification extends Model{

    protected $table = "spvreq";
    public $errors = [];

    protected $allowed_columns = [
        'vuser_id',
        'sp_id',
        'createdDate',
        'respondedDate',
        'details'
    ];


}