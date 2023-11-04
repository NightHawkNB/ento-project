<?php

class Ad_band extends model {

    protected $table = "ad_band";
    protected $pk = "ad_id";

    protected $allowed_columns = [
        'ad_id',
        'packages',
        'sample_video',
        'sample_audio'
    ];
}