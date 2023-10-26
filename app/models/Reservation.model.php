<?php

class Reservation extends Model{

    protected $table = "reservations";
    public $errors = [];
    
    protected $allowed_columns = [
        'reservation_id',
        'sp_id',
        'vuser_id'
    ];
}