<?php

class Database {
    
    private function connect(): PDO
    {
        $str = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        return new PDO($str, DB_USER, DB_PASS);
    }

    public function query($query, $data = []): false|array
    {
        $con = $this->connect();

        $stm = $con->prepare($query);
        
        if($stm) {
            $check = $stm->execute($data);

            if($check){
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                if($result && count($result) > 0) return $result;
            }
        }

        return false;
    }

    public function join_tables($fields = ['*'], $first_table, $other_tables, $filter = null, $data = []): false|array
    {
        $con = $this->connect();

        $query = "SELECT ";

        if(sizeof($fields) > 1) {
            foreach ($fields as $field) {
                $query .= $field. ", ";
            }
        } else {
            $query .= $fields[0];
        }

        $query = trim($query, ', ');

        $query .= " FROM ".$first_table." ";

        if(sizeof($other_tables) > 1) {
            foreach ($other_tables as $table) {
                $query .= "JOIN ".$table[0]." ON ".$table[1]." ";
            }
        } else {
            $query .= "JOIN ".$other_tables[0][0]." ON ".$other_tables[0][1]." ";
        }

        $query = trim($query);

        if(!empty($filter)) {
            $query .= " WHERE ".$filter;
        }

        $stm = $con->prepare($query);

        if($stm) {
            $check = $stm->execute($data);

            if($check){
                $result = $stm->fetchAll(PDO::FETCH_OBJ);

                if($result && count($result) > 0) return $result;
            }
        }

        return false;
    }
}