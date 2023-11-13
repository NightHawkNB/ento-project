<?php

class Reservation extends Model{

    protected $table = "reservations";
    protected $pk = "reservation_id";
    
    protected $allowed_columns = [
        'reservation_id',
        'sp_id',
        'user_id',
        'deleted'
    ];
}