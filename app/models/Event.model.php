<?php

class Event extends Model{

    protected string $table = "event";
    protected string $pk = "event_id";

    protected array $allowed_columns = [
        'name',
        'pending',
        'details',
        'ticketing_plan',
        'DataTime',
        'image',
        's_image',
        'district',
        'venue_id',
        'band_id',
        'venueO_id'
    ];

    public function validate($data) {
        $this->errors = [];

        if(empty($data['name'])) $this->errors['name'] = "Name cannot be empty";

        if(empty($data['details'])) $this->errors['details'] = "Details cannot be empty";

        if(empty($data['ticketing_plan'])) $this->errors['ticketing_plan'] = "Ticketing plan cannot be empty";

        if(empty($data['district'])) $this->errors['district'] = "District cannot be empty";

        if(empty($data['DataTime'])) $this->errors['DataTime'] = "Data and Time cannot be empty";

        if(empty($data['venue_id'])) $_POST['venue_id'] = "Not Specified";

        if(empty($data['band_id'])) $_POST['band_id'] = "Not Specified";

        if(empty($data['venueO_id'])) $_POST['venueO_id'] = "Not Specified";

        if(empty($data['image'])) $_POST['image'] = "general.png";
        if(empty($data['s_image'])) $_POST['s_image'] = "general.png";

        if(empty($this->errors)) return true;
        else return false;
    }

}