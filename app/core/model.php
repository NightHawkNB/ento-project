<?php

class Model extends Database{

    protected string $table = "";
    protected string $pk = "";
    protected array $allowed_columns = [];

    public array $errors = [];

    public function insert($data): void
    {

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

    public function update($id, $data): void
    {

        $temp_id = null;

        if(!empty($this->allowed_columns)) {
            foreach($data as $key => $value) {
                if(str_contains($key, $this->pk)) $temp_id = array($key => $value);
                else $temp_id[$this->pk] = $id;
                if(!in_array($key, $this->allowed_columns)) {
//                    if(str_contains($key, 'id')) $temp_id = array($key => $value);
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
        if(empty($temp_id)) $query .= "Empty";
        foreach ($temp_id as $key => $value) {
            $query .= $key . " = :" . $key;
            $data[$key] = $value;
        }

//        show($query);
        //? $arr['date'] = date('Y-m-d H:i:s');

        $this->query($query, $data);
    }

    public function where($data): false|array
    {

        if(!empty($this->allowed_columns)) {
            foreach($data as $key => $value) {
                if(!in_array($key, $this->allowed_columns)) {
//                    if(str_contains($key, 'id')) $temp_id = array($key => $value);
                    unset($data[$key]);
                }
            }
        }

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

    public function get_all(): false|array
    {

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