<?php

class Uservreq extends Model {

    protected string $table = "uservreq ";
    protected string $pk = "userVreq_id";

    protected array $allowed_columns = [
        'userVreq_id',
        'user_id',
        'cust_id',
        'timestamps',
        'resources'
    ];
}
?>