<?php

class User extends Model{

    protected string $table = "user";
    protected string $pk = "user_id";
    
    protected array $allowed_columns = [
        'user_id',
        'fname',
        'lname',
        'address1',
        'address2',
        'province',
        'district',
        'user_type',
        'email',
        'password',
        'contact_num',
        'image',
        'verified',
        'profile_visible',
        'joined_year_month'
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
        if(empty($data['province'])) $this->errors['province'] = "Province is Required";
        if(empty($data['district'])) $this->errors['district'] = "District is Required";
        // if(empty($data['user_type'])) $this->errors['user_type'] = "Account Type is Required";
        if(empty($data['password'])) $this->errors['password'] = "Password is Required";
        if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $data['password'])) $this->errors['password'] = "Password is not Strong enough";
        if($data['password'] !== $data['confirmPass']) $this->errors['confirmPass'] = "Passwords do not match";
        if(empty($data['contact_num'])) $this->errors['contact_num'] = "Contact number is Required";
        if(empty($data['terms'])) $this->errors['terms'] = "Please accept Terms and Conditions";
        
        if(empty($this->errors)) return true;
        else return false;
    }

    public function validate_vo($data) {
        if(empty($data['fname'])) $this->errors['fname'] = "Please enter the first name";
        if(empty($data['lname'])) $this->errors['lname'] = "Please enter the last name";
        if(empty($data['contact_num'])) $this->errors['contact_num'] = "Please enter a Contact Number";
        if(empty($data['province'])) $this->errors['province'] = "Please select a Province";
        if(empty($data['district'])) $this->errors['district'] = "Please select a District";
        /*if(empty($data['email'])) $this->errors['email'] = "Please enter an Email"; */

        if(!empty($data['change_pass'])) {
            if(empty($data['password'])) $this->errors['password'] = "Please enter a password";
            if(empty($data['confirmPass'])) $this->errors['confirmPass'] = "Please enter the password";
            if($data['password'] != $data['confirmPass']) $this->errors['confirmPass'] = "Passwords do not match";

            if(empty($this->errors['password']) && empty($this->errors['confirmPass'])) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
        } else {
            unset($_POST['password']);
            unset($_POST['confirmPass']);
        }

        if(empty($this->errors)) return true;
        else return false;
    }


}