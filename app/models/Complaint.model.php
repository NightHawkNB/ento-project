<?php

class Complaint extends Model {

    protected string $table = "complaints";
    protected string $pk = "comp_id";

    protected array $allowed_columns = [
        'details',
        'files',
        'datetime',
        'user_id',
        'cust_id',
        'status'
    ];
}