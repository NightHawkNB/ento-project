<?php

class Resrequest extends Model{

    protected $table = "resrequest";
    protected $pk = "req_id";

    protected $allowed_columns = [
        'req_id',
        'user_id',
        'sp_id',
        'createdDate',
        'respondedDate',
        'details',
        'location',
        'start_time',
        'end_time',
        'status',
        'deleted'
    ];
}