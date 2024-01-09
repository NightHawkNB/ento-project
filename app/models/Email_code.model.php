<?php

class Email_code extends Model {
    protected string $table = "email_verification";
    protected string $pk = "user_id";
    public array $errors = [];

    protected array $allowed_columns = [
        'user_id',
        'verification_code',
        'created_datetime'
    ];
}