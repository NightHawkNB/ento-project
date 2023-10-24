<?php

class Event extends Model{

    protected $table = "event";

    protected $allowed_columns = [
        'name',
        'details',
        'ticketing_plan',
        'DataTime',
        'image',
        's_image',
        'district',
        'venue_id',
        'band_id',
        'venueO_id'
    ];



}