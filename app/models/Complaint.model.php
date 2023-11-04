<?php

class Complaint extends Model {

    protected $table = "complaints";
    protected $pk = "comp_id";

    protected $allowed_columns = [
        'details',
        'files',
        'datetime',
        'user_id',
        'cust_id',
        'status'
    ];
}