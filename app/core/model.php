<?php

class Model extends Database{

    protected $table = "";
    protected $allowed_columns = [];

    public function insert($data) {

        if(!empty($this->allowed_columns)) {
            foreach($data as $key => $value) {
                if(!in_array($key, $this->allowed_columns)) {
                    unset($data[$key]);
                }
            }
        }
        
        /*
        ! Array Keys
        * arrays_keys function returns an array that contains only the keys of a given array (without the values).
        ! Implode function
        * implode function returns a string made by connecting the keys of the given array by the given string (",").
        */
        
        $keys = array_keys($data);

        $query = "INSERT INTO " . $this->table;
        
        $query .= " (". implode(",", $keys) .") VALUES (:". implode(", :", $keys) .")";

        //? $arr['date'] = date('Y-m-d H:i:s');

        $this->query($query, $data);
    }

    public function update($id, $data) {

        $temp_id = null;

        if(!empty($this->allowed_columns)) {
            foreach($data as $key => $value) {
                if(!in_array($key, $this->allowed_columns)) {
                    if(str_contains($key, 'id')) $temp_id = array($key => $value);
                    unset($data[$key]);
                }
            }
        }

        /*
        ! Array Keys
        * arrays_keys function returns an array that contains only the keys of a given array (without the values).
        ! Implode function
        * implode function returns a string made by connecting the keys of the given array by the given string (",").
        */

        $keys = array_keys($data);

        $query = "UPDATE " . $this->table . " SET ";


        foreach ($data as $key => $value) {
            $query .= $key . " = :" . $key . ", ";
        }

        $query = trim($query, ", ");
        $query .= " WHERE ";
        foreach ($temp_id as $key => $value) {
            $query .= $key . " = :" . $key;
            $data[$key] = $value;
        }

        show($query);

        //? $arr['date'] = date('Y-m-d H:i:s');

        $this->query($query, $data);
    }

    public function where($data) {

        $keys = array_keys($data);

        $query = "SELECT * FROM " . $this->table . " WHERE ";
        
        foreach($keys as $key) {
            $query .= "$key = :$key" . " && ";
        }

        //* Trim removes characters from the end and the beginning of a string
        $query = trim($query, "&& ");

        $result = $this->query($query, $data);

        if(is_array($result)) return $result;
        else return false;
    }

    public function get_all() {

        $query = "SELECT * FROM " . $this->table;

        return $this->query($query);
    }

    public function first($data) {

        $keys = array_keys($data);

        $query = "SELECT * FROM " . $this->table . " WHERE ";
        
        foreach($keys as $key) {
            $query .= "$key = :$key" . " && ";
        }

        //* Trim removes characters from the end and the beginning of a string
        $query = trim($query, "&& ");
        $query .= " ORDER BY user_id DESC LIMIT 1";
        $result = $this->query($query, $data);

        if(is_array($result)) return $result[0];
        else return false;
    }
}