<?php

class Database {
    
    private function connect(): PDO
    {
        $str = "mysql:hostname=".DB_HOST.";dbname=".DB_NAME;
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

//    public function create_tables() {
//        $query = "CREATE TABLE IF NOT EXISTS `ento_db`.`user` (
//            `user_id` INT NOT NULL AUTO_INCREMENT,
//            `fname` VARCHAR(45) NOT NULL,
//            `lname` VARCHAR(45) NOT NULL,
//            `password` VARCHAR(45) NULL,
//            `email` VARCHAR(45) NOT NULL,
//            `nic_num` VARCHAR(45) NULL,
//            `contact_num` VARCHAR(45) NOT NULL,
//            `user_type` VARCHAR(45) NOT NULL DEFAULT 'client',
//            PRIMARY KEY (`user_id`))
//          ENGINE = InnoDB;";
//
//        $this->query($query);
//    }
}