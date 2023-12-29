<?php

class Reservation extends Model{

    protected string $table = "reservations";
    protected string $pk = "reservation_id";
    
    protected array $allowed_columns = [
        'reservation_id',
        'sp_id',
        'user_id',
        'status',
        'deleted'
    ];
}