<?php

class Res_chat extends Model {
    protected string $table = "res_chat";
    protected string $pk = "chat_id";

    protected array $allowed_columns = [
        'chat_id',
        'sender_id',
        'receiver_id',
        'id',
        'source'
    ];
}