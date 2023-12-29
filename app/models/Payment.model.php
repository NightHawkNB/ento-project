<?php

class Payment extends Model {

    protected string $table = "payment_log";
    protected string $pk = "order_id";

    protected array $allowed_columns = [
        'order_id',
        'user_id',
        'amount',
        'event_id',
        'ad_id',
        'datetime'
    ];
}