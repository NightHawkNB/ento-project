<?php

class User extends Model{

    protected $table = "user";
    protected $pk = "user_id";
    
    protected $allowed_columns = [
        'user_id',
        'fname',
        'lname',
        'address1',
        'address2',
        'city',
        'district',
        'user_type',
        'email',
        'password',
        'contact_num',
        'image',
        'verified'
    ];

    public function validate($data) {
        $this->errors = [];

        if(empty($data['fname'])) $this->errors['fname'] = "First name is Required";
        if(empty($data['lname'])) $this->errors['lname'] = "Last name is Required";

        //? Checking email validity | else | Checking whether the email is already in the database
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $this->errors['email'] = "Email is Not Valid";
        else if($this->query("SELECT * FROM user WHERE email = :email", ['email' => $data['email']])) $this->errors['email'] = "That email already exists";

        if(empty($data['address1'])) $this->errors['address1'] = "Address - 01 is Required";
        if(empty($data['address2'])) $this->errors['address2'] = "Address - 02 is Required";
        if(empty($data['city'])) $this->errors['city'] = "City is Required";
        if(empty($data['district'])) $this->errors['district'] = "District is Required";
        if(empty($data['user_type'])) $this->errors['user_type'] = "Account Type is Required";
        if(empty($data['password'])) $this->errors['password'] = "Password is Required";
        if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $data['password'])) $this->errors['password'] = "Password is not Strong enough";
        if($data['password'] !== $data['confirmPass']) $this->errors['confirmPass'] = "Passwords do not match";
        if(empty($data['contact_num'])) $this->errors['contact_num'] = "Contact number is Required";
        if(empty($data['terms'])) $this->errors['terms'] = "Please accept Terms and Conditions";
        
        if(empty($this->errors)) return true;
        else return false;
    }
}