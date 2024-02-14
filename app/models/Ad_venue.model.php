<?php

class Ad_venue extends model {

    protected string $table = "ad_venue";
    protected string $pk = "ad_id";

    protected array $allowed_columns = [
        'ad_id',
        'seat_count',
        'venue_id'
    ];
}