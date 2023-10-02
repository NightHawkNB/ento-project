<?php

class Complain extends Model {

    protected $table = "complaints";

    protected $allowed_columns = [
        'comp_id',
        'details',
        'files',
        'datetime',
        'user_id',
        'cust_id',
    ];
}