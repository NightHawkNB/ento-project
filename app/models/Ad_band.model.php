<?php

class Ad_band extends model {

    protected string $table = "ad_band";
    protected string $pk = "ad_id";

    protected array $allowed_columns = [
        'ad_id',
        'packages',
        'sample_video',
        'sample_audio'
    ];
}