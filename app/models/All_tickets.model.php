<?php

class All_tickets extends Model {

    protected string $table = "all_tickets";
    protected string $pk = "ticket_id";

    protected array $allowed_columns = [
        'ticket_id',
        'event_id',
        'type',
        'price',
        'status',
        'deleted'
    ];
}