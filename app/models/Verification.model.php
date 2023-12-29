<?php

class Verification extends Model{

    protected string $table = "spvreq";
    protected string $pk = "userVreq_id";

    protected array $allowed_columns = [
        'vuser_id',
        'sp_id',
        'createdDate',
        'respondedDate',
        'details'
    ];


}