<?php

class Verification extends Model{

    protected $table = "spvreq";
    protected $pk = "userVreq_id";

    protected $allowed_columns = [
        'vuser_id',
        'sp_id',
        'createdDate',
        'respondedDate',
        'details'
    ];


}