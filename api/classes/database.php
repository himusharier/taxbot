<?php

class Database {

    private function connect(){

        $string = DBDRIVER .":host=" .DBHOST.";dbname=" .DBNAME;
        $con = new PDO($string, DBUSER, DBPASS);

        if(!$con){
            die("Could not connect!");
        }

        return $con;
    }

    public function run($query, $var = array()){

        $con = $this->connect();
        $stmt = $con->prepare($query);

        if($stmt){
            $check = $stmt->execute($var);
            if($check){
                $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                if(is_array($data) && count($data) > 0){

                    return $data;
                }
            }
        }

        return false;
    }
}
