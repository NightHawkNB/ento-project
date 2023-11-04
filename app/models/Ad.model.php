<?php

class Ad extends model {

    protected $table = "ads";
    protected $pk = "ad_id";
    public $errors = [];

    protected $allowed_columns = [
        'ad_id',
        'user_id',
        'title',
        'category', // Requires validation rules
        'details',
        'pending',
        'views',
        'rates',
        'image',
        'deleted',
        'contact_email',
        'contact_num'
    ];

    public function validate($data) {
        $this->errors = [];

        if(empty($data['title'])) $this->errors['title'] = "Title cannot be Empty";

        if(empty($data['details'])) $this->errors['details'] = "Details cannot be empty";

        if(empty($data['rates'])) $this->errors['rates'] = "Cannot be empty";
        if($data['rates'] == 0) $this->errors['rates'] = "Cannot be Zero";

        if(empty($this->errors)) return true;
        else return false;
    }
}