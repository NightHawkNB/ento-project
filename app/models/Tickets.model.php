<?php

class Tickets extends Model {

    protected $table = "tickets";
    protected $pk = "ticket_id";

    protected $allowed_columns = [
        'qr_code',
        'serial_num',
        'price',
        'type',
    ];
}