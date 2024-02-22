<?php

class Complaint extends Model {

    protected string $table = "complaints";
    protected string $pk = "comp_id";

    protected array $allowed_columns = [
        'comp_id',
        'details',
        'files',
        'date_time',
        'handled_dt',
        'user_id',
        'cca_user_id',
        'status',
        'deleted'
    ];
}