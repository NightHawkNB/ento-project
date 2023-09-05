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

        echo "After unsetting";
        show($data);
        
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