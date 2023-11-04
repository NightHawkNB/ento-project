<?php

class Ad_singer extends model {

    protected $table = "ad_singer";
    protected $pk = "ad_id";

    protected $allowed_columns = [
        'ad_id',
        'sample_audio'
    ];
}