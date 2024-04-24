<?php

class Review extends Model {

    protected string $table = "review";
    protected string $pk = "review_id";

    protected array $allowed_columns = [
        'content',
        'rating',
        'creator_id',
        'target_id',
        'reservation_id',
        'created_at'
    ];
}