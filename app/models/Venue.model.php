<?php

class Venue extends model {

    protected string $table = "venue";
    protected string $pk = "venue_id";

    protected array $allowed_columns = [
        'venue_id',
        'name',
        'location',
        'image',
        'seat_count',
        'contact_num',
        'packages',
        'other',
        'venueM_id',
        'deleted',
        'verified'
    ];

    public function validate($data): bool
    {

        $this->errors = [];

        $db = new Database();
        $name_check = $db->query('SELECT * FROM venue WHERE name = :name', ['name' => $data['name']]);

        if($name_check) {
            $this->errors['name'] = "The name already exists";
        }

        if(empty($data['name'])) $this->errors['name'] = "Name is Required";
        if(empty($data['location'])) $this->errors['location'] = "Location is Required";

        if(empty($data['seat_count'])) $data['seat_count'] = 0;

        if(empty($this->errors)) return true;
        else return false;

    }

}