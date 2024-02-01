<?php

class Ad_view extends model
{

    protected string $table = "ad_views";
    protected string $pk = "id";
    public array $errors = [];

    protected array $allowed_columns = [
        'id',
        'user_id',
        'createdAt',
        'count'
    ];

}