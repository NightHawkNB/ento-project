<?php

class Ad extends model {

    protected $table = "ads";
    public $errors = [];

    protected $allowed_columns = [
        'user_id',
        'title',
        'details',
        'pending',
        'views',
        'rates',
        'image'
    ];

    public function validate($data) {
        $this->errors = [];

        if(empty($data['title'])) $this->errors['title'] = "Title cannot be Empty";

        if(empty($data['details'])) $this->errors['details'] = "Details cannot be empty";

        if(empty($data['rates'])) $this->errors['rates'] = "Cannot be empty";
        if($data['rates'] == 0) $this->errors['rates'] = "Cannot be Zero";

        if(empty($data['image'])) $_POST['image'] = "general.png";

        if(empty($this->errors)) return true;
        else return false;
    }
}