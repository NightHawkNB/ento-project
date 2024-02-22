<?php

class ServiceProvider extends Model{

    protected string $table = "serviceprovider";
    protected string $pk = "sp_id";

    protected array $allowed_columns = [
        'sp_id',
        'user_id',
        'verified',
        'sp_type',
        'last_response_time'
    ];
}