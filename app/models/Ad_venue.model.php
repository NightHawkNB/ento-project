<?php

class Ad_venue extends model {

    protected $table = "ad_venue";
    protected $pk = "ad_id";

    protected $allowed_columns = [
        'ad_id',
        'seat_count',
        'seat_image'
    ];
}