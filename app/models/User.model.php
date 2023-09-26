<?php

class User extends Model{

    protected $table = "user";
    public $errors = [];
    
    protected $allowed_columns = [
        'fname',
        'lname',
        'email',
        'password',
        'contact_num',
        'image'
    ];

    public function validate($data) {
        $this->errors = [];

        if(empty($data['fname'])) $this->errors['fname'] = "First name is Required";
        if(empty($data['lname'])) $this->errors['lname'] = "Last name is Required";

        //? Checking email validity | else | Checking whether the email is already in the database
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $this->errors['email'] = "Email is Not Valid";
        else if($this->where(['email' => $data['email']])) $this->errors['email'] = "The email already exists";
        
        if(empty($data['password'])) $this->errors['password'] = "Password is Required";
        if($data['password'] !== $data['password_retype']) $this->errors['password_retype'] = "Passwords do not match";
        if(empty($data['contact_num'])) $this->errors['contact_num'] = "Contact number is Required";
        if(empty($data['terms'])) $this->errors['terms'] = "Please accept Terms and Conditions";
        
        if(empty($this->errors)) return true;
        else return false;
    }
}