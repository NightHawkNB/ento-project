<?php

class Payment extends Model {

    protected $table = "payment_log";

    protected $allowed_columns = [
        'order_id',
        'user_id',
        'amount',
        'event_id',
        'ad_id',
        'datetime'
    ];
}