<?php

class Venue extends model {

    protected $table = "venue";
    protected $pk = "venue_id";

    protected $allowed_columns = [
        'venue_id',
        'name',
        'location',
        'image',
        'seat_count',
        'packages',
        'other',
        'venueM_id'
    ];
}