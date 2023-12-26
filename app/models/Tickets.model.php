<?php

class Tickets extends Model {

    protected $table = "tickets";
    protected $pk = "ticket_id";

    protected $allowed_columns = [
        'ticket_id',
        'event_id',
        'user_id',
        'hash',
        'type',
        'price',
        'deleted'
    ];
}