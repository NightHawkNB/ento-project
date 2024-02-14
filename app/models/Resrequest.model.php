<?php

class Resrequest extends Model{

    protected string $table = "resrequest";
    protected string $pk = "req_id";

    protected array $allowed_columns = [
        'req_id',
        'user_id',
        'sp_id',
        'ad_id',
        'createdDate',
        'respondedDate',
        'details',
        'location',
        'location_id',
        'start_time',
        'end_time',
        'status',
        'deleted',
        'reservation_id'
    ];
}