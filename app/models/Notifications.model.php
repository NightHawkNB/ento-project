<?php

class Notifications extends Model {

    protected string $table = "notifications";
    protected string $pk = "notification_id";

    protected array $allowed_columns = [
        'notification_id',
        'user_id',
        'status',
        'message',
        'link',
        'deleted',
        'viewed',
        'id',
        'type'
    ];

}