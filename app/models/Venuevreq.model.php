<?php

class Venuevreq extends Model {

    protected string $table = "venuevreq";
    protected string $pk = "venuevreq_id";

    protected array $allowed_columns = [
        'venuevreq_id',
        'venue_id',
        'created_at',
        'comment',
        'status'
    ];
}
?>