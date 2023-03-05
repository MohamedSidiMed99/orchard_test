<?php

error_reporting(0);

include("connect.php");
include("controller/createTrees.php");
include("controller/createNewTrees.php");


if(isset($_POST["apple"],$_POST['pear'])){

    $apple = $_POST['apple'];
    $pear = $_POST['pear'];

    $add = new AddNewTrees();

    if(empty($apple) && !empty($pear)){
        
        $add->newTrees("pears","pear_",$pear);

    }else if(!empty($apple) && empty($pear)){
      
        $add->newTrees("apples","apple_",$apple);

    }else if(empty($apple) && empty($pear)){
       echo "enter number <br>";
    }else{
      
        $add->newTrees("apples","apple_",$apple);
        $add->newTrees("pears","pear_",$pear);
    }
  
}


$trees= new CreateTrees();
$getT = new GetTrees();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        body{
            background:#FFFFE0;
        }
        .container{
            width:1000px;
            margin:auto;
           display:flex;

        }
        .add{
            width:100%;
            text-align:center;
        }
        input{
            width:50%;
            border-radius: 10px;
            outline:none;
            border:none;
            height: 30px;
            padding:0 0 0 10px;
        }
        button{
            border-radius: 10px;
            outline:none;
            border:none;
            padding:10px 30px 10px 30px;
            background:#007FFF;
            font-size:20px;
            color:white;
            margin:10px;
        }
        .row{
            flex:1;
            
        }
        table{

        }

        td{
            padding:10px;
        }

        .total{
            width:1000px;
            margin:auto;
           display:flex;
        }
        .totlaspan{
            color:#66FF00;
        }
    </style>
</head>
<body>

    <div class="container">
        
            <form action="" method="POST" class="add">
                <label for="">New Apples</label><br>
                <input type="number" name="apple" placeholder="enter number of new Apple"><br>
                <label for="">New Pears</label><br>
                <input type="number" name="pear" placeholder="enter number of new Pears"><br>
                <button>Add new Trees</button>
            </form>
        
    </div>
    <div class="container">
        <div class="row">
        <h1>Apples Tree</h1>

                <?php
                   
                    $trees->createappleTrees();
                $allApples = $getT->getAllTreas("apples");

                foreach($allApples as $key=>$data){
                    ?>

                <table>
                            <tr>
                            <td><?php echo $key+1 ?> -  </td>
                                <td>Id = <?php echo $data['id'] ?>,</td>
                                <td>Name = <?php echo $data['name'] ?>, </td>
                                <td> Reaps = <?php echo $data['reap'] ?></td>
                                <td> weight = <?php echo $data['weight'] ?> gm</td>
                            </tr>
                        </table>

                    
                    <?php
                }
                ?>
        </div>
        <div class="row">
        <h1>Pears Tree</h1>

        <?php
            
            $trees->createpearsTrees();
            $allPears = $getT->getAllTreas("pears");
            foreach($allPears as $key=>$data){
                ?>
                <table>
                    <tr>
                    <td><?php echo $key+1 ?> -  </td>
                        <td>Id = <?php echo $data['id'] ?>,</td>
                        <td>Name = <?php echo $data['name'] ?>, </td>
                        <td> Reaps = <?php echo $data['reap'] ?></td>
                        <td> weight = <?php echo $data['weight'] ?>gm</td>
                    </tr>
                </table>
                
                <?php
            }
            ?>
        </div>
    </div>

    <div class="container">
        <?php

               $reapT= new ReapT();
            $data =  $reapT->ReapTotal();
            // echo json_encode($data);
        ?>

       <div class="total">
      
        <div class="row">
        
            <h1>урожай</h1>
            <h3>Яблоки пожинают = <?php echo $data['applesReap']  ?> яблонь</h3>
            <h3>груши пожинают = <?php echo $data['pearsReap']  ?> груш</h3>
            <h1>Общий урожай = <span class="totlaspan"> <?php echo $data['total']  ?></span></h1>
        </div>
        <div class="row">
            <h1>Вес</h1>
            <h3>Яблоки Вес = <?php echo $data['applesw']  ?> яблонь</h3>
            <h3>груши Вес = <?php echo $data['pearsw']  ?> груш</h3>
            <h1>Общий Вес = <span class="totlaspan"> <?php echo $data['totalw']  ?></span></h1>
        </div>
       </div>
    </div>
   
   
   
</body>
</html>