<?php

class Event_bank extends model {

    protected string $table = "event_bank";
    protected string $pk = "event_id";

    protected array $allowed_columns = [
        'event_id',
        'account_number',
        'account_name',
        'bank',
        'branch'
    ];
}