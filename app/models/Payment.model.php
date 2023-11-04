<?php

class Payment extends Model {

    protected $table = "payment_log";
    protected $pk = "order_id";

    protected $allowed_columns = [
        'order_id',
        'user_id',
        'amount',
        'event_id',
        'ad_id',
        'datetime'
    ];
}