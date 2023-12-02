<?php

class Uservreq extends Model {

    protected $table = "uservreq ";
    protected $pk = "userVreq _id";

    protected $allowed_columns = [
        'userVreq_id',
        'user_id',
        'cust_id',
        'timestamps',
        'resources'
    ];
}