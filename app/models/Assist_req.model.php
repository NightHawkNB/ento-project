<?php

class Assist_req extends Model {

    protected string $table = "complaint_assist";
    protected string $pk = "comp_id";

    protected array $allowed_columns = [
        'comp_id',
        'date_time',
        'status',
        'comment',
        'admin_user_id',
        'deleted'
    ];
}