<?php

class Venue extends model {

    protected string $table = "venue";
    protected string $pk = "venue_id";

    protected array $allowed_columns = [
        'venue_id',
        'name',
        'location',
        'image',
        'seat_count',
        'packages',
        'other',
        'venueM_id',
        'deleted'
    ];
}