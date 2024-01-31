<?php

class Request_chat extends Model {
    protected string $table = "request_chat";
    protected string $pk = "chat_id";

    protected array $allowed_columns = [
        'chat_id',
        'sender_id',
        'receiver_id',
        'reservation_id',
        'source'
    ];
}