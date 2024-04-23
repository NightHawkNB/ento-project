<?php

class Ad_verification_request extends Model {

    protected string $table = "ad_verification_requests";
    protected string $pk = "request_id";

    protected array $allowed_columns = [
        'comp_id',
        'ad_id',
        'comment',
        'createdAt',
    ];
}