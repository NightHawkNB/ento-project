<?php

class Test extends Model {

    protected string $table = "test";
    protected string $pk = "id";

    protected array $allowed_columns = [
        'id',
        'name',
        'bday',
        'gender'
    ];
}