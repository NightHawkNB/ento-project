<?php

class Suggest extends model {

    protected string $table = "suggestions";
    protected string $pk = "suggestion_id";

    protected array $allowed_columns = [
        'suggestion_id',
        'req_id',
        'start_time',
        'end_time'
    ];
}