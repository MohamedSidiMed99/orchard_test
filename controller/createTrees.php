<?php



class CreateTrees extends DB{


 ///----------------- create apples tress --------------------------
    public function createappleTrees(){
       
        $creat = new Create();

        $count = $this->check("apples")->num_rows;

        if($count > 0){
            // $this->deleteTrees("apples");
        }else{
            $creat->createAllTrees("apples","apple_",10,"");
            echo "created Trees Apples sucssufull<br>";
        }
      
    }

  ///----------------- create pears tress --------------------------
    public function createpearsTrees(){
        $creat = new Create();
        
        $count = $this->check("pears")->num_rows;

        if($count > 0){
            // $this->deleteTrees("pears");
        }else{
            $creat->createAllTrees("pears","pear_",15,"");
            echo "created Trees Pears sucssufull <br>";
        }
    }



     ///----------------- check tress --------------------------
    public function check($tree){
        $sql = "SELECT * FROM $tree";
        $result = $this->Connection()->query($sql);
        return $result;

    }
   

  ///----------------- delete tress --------------------------
    // public function deleteTrees($tree){
    //     $sql = "DELETE FROM $tree";
    //     $res = $this->Connection()->query($sql);

    //     if($res){
    //         echo "deleted Trees from $tree<br>";
    //     }
    // }


 
}


class Create extends DB{

      //--------------- Create trees -------------------
  public function createAllTrees($table,$name,$length,$new){

    $getT =new GetTrees();
    $check = $getT->getAllTreas($table);
    $num =  count($check);
   
    if($new == "new"){
      

      

       for($i = 1 ; $i <= $length ; $i++){

        ///------------- пожинают ----------------
        if($table == "apples"){
            $reap = random_int(40,50);
            $weight = random_int(150,180);
        }else{
            $reap = random_int(0,20);
            $weight = random_int(130,170);
        }

        $n = $i + $num;
    

        $sql = "INSERT INTO $table(`name`,`reap`,`weight`) VALUES ('$name$n',$reap,$weight)";
        $result = $this->Connection()->query($sql);
        
     }
    }else{
   
     for($i = 1 ; $i <= $length ; $i++){

        ///------------- пожинают ----------------
        if($table == "apples"){
            $reap = random_int(40,50);
            $weight = random_int(150,180);
        }else{
            $reap = random_int(0,20);
            $weight = random_int(130,170);
        }

        $sql = "INSERT INTO $table(`name`,`reap`,`weight`) VALUES ('$name$i',$reap,$weight)";
        $result = $this->Connection()->query($sql);
        
     }
    }

 }

}


class GetTrees extends DB{

    ///----------------- get all tress --------------------------
    public function getAllTreas($tree){

        $sql = "SELECT * FROM $tree";
        $result = $this->Connection()->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        return($data);
    
    }
}


class ReapT {

    ///----------------- total reap from tress --------------------------
    public function ReapTotal(){
       
        $getT =new GetTrees();

        $number1 = 0;
        $number2 = 0;

        $w1 = 0;
        $w2 = 0;

       $reap1 =  $getT->getAllTreas("apples");
       $reap2 =   $getT->getAllTreas("pears");

       for($i = 0 ; $i < count($reap1) ; $i++){
           $number1 += $reap1[$i]['reap'];
           $w1 += $reap1[$i]['weight'];
       }
       for($i = 0 ; $i < count($reap2) ; $i++){
        $number2 += $reap2[$i]['reap'];
        $w2 += $reap1[$i]['weight'];
      }
    

       $total = $number1 + $number2;
       $totalW = $w1 + $w2 ;

       return array("total"=>$total, "applesReap"=>$number1,"pearsReap"=>$number2, "totalw"=>$totalW, "applesw"=>$w1,"pearsw"=>$w2,);
    
    }

}