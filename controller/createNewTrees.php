<?php


class AddNewTrees{
   private $table;
   private $name;
   private $length;

   public function newTrees($table,$name,$length){



    $this->table = $table; 
    $this->name = $name ;
    $this->length =$length ;

    $create = new Create();
    $create->createAllTrees($this->table,$this->name,$this->length,"new");

    header("location:http://localhost/orchard/main.php");
    }
}