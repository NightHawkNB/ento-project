<?php

class Ad_singer extends model {

    protected string $table = "ad_singer";
    protected string $pk = "ad_id";

    protected array $allowed_columns = [
        'ad_id',
        'sample_audio'
    ];
}