<?php

class Event_singers extends Model {

    protected string $table = "event_singer";
//    protected string $pk = "";

    protected array $allowed_columns = [
        'es_id',
        'event_id',
        'singer_id',
        'custom_name'
    ];

}