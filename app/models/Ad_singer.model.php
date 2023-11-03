<?php

class Ad_singer extends model {

    protected $table = "ad_singer";
    public $errors = [];

    protected $allowed_columns = [
        'ad_id',
        'contact_email',
        'contact_num',
        'sample_audio'
    ];

    public function validate($data) {

        if(!filter_var($data['contact_email'], FILTER_VALIDATE_EMAIL)) $this->errors['contact_email'] = "Enter a valid email";

        if(empty($data['rates'])) $this->errors['rates'] = "Cannot be empty";
        if(!is_numeric($data['rates'])) $this->errors['rates'] = "Enter a valid amount";

        if(empty($data['image'])) $_POST['image'] = "general.png";

        if(empty($this->errors)) return true;
        else return false;
    }
}