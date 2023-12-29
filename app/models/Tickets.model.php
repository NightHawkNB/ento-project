<?php

class Tickets extends Model {

    protected string $table = "tickets";
    protected string $pk = "ticket_id";

    protected array $allowed_columns = [
        'ticket_id',
        'event_id',
        'user_id',
        'hash',
        'type',
        'price',
        'deleted'
    ];
}