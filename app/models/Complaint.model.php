<?php

class Complaint extends Model {

    protected $table = "complaints";

    protected $allowed_columns = [
        'details',
        'files',
        'datetime',
        'user_id',
        'cust_id',
        'status'
    ];
}