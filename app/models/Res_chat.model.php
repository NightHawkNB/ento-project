<?php

class Res_chat extends Model {
    protected $table = "res_chat";
    protected $pk = "chat_id";

    protected $allowed_columns = [
        'chat_id',
        'sender_id',
        'receiver_id',
        'reservation_id',
        'source'
    ];
}