<?php

class Assist_req extends Model {

    protected $table = "complaint_assist";

    protected $allowed_columns = [
        'comp_id',
        'datetime',
        'status',
        'comment'
    ];
}