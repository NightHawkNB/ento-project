<?php

class Assist_req extends Model {

    protected $table = "complaint_assist";
    protected $pk = "comp_id";

    protected $allowed_columns = [
        'comp_id',
        'datetime',
        'status',
        'comment'
    ];
}