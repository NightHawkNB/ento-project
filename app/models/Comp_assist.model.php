<?php

class Comp_assist extends Model {

    protected $table = "complaint_assist";

    protected $allowed_columns = [
        'comp_id',
        'datetime',
        'handled'
       
    ];
}