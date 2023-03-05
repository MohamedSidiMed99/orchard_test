<?php

class DB {

    private $host = "localhost" ;
    private $user = "root";
    private $pass = "";
    private $dbname = "orchard";
    private $con;

    public function Connection(){

        $this->con = mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);

        if($this->con){
            return $this->con;
        }else{
            return "not connected...";
        }
    }
}

