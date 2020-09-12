<?php
session_start(); 
$sec=  $_SESSION['section']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body
        {
            background-image: url(img/class1.jpg);
            background-repeat: no-repeat;
            background-size: cover ;
        }
        h1
        {
            text-align: center;
            color: ghostwhite;
            margin-top:2px;
        }
        #container
        {
            text-align: center;
            font-size:large 
        }
        #button1
        {
            margin: auto;
            font-size: 50px;
            border-radius: 50px;
            font-family: cursive;
            margin-bottom: 10px;
            margin-top: 50px;

        }
        #button2
        {
            display: block;
            margin: auto;
            font-size: 50px;
            border-radius: 50px;
            font-family: cursive;
            margin-bottom: 10px;
        }
        #button3
        {
            display: block;
            margin: auto;
            font-size: 50px;
            border-radius: 50px;
            font-family: cursive;
            margin-bottom: 10px;
        }
        #button4
        {
            display: block;
            margin: auto;
            font-size: 50px;
            border-radius: 50px;
            font-family: cursive;
            margin-bottom: 10px;
        }
        #button5
        {
            display: block;
            margin: auto;
            font-size: 50px;
            border-radius: 50px;
            font-family: cursive;
            margin-bottom: 10px;
        }
        #button1:hover
        {
            cursor: pointer;
            color: rgb(240, 239, 239);
            background-color:rgb(68, 67, 67);
            
        }
        #button2:hover
        {
            cursor: pointer;
            color: rgb(240, 239, 239);
            background-color:rgb(68, 67, 67);
        }
        #button3:hover
        {
            cursor: pointer;
            color: rgb(240, 239, 239);
            background-color:rgb(68, 67, 67);
        }
        #button4:hover
        {
            cursor: pointer;
            color: rgb(240, 239, 239);
            background-color:rgb(68, 67, 67);
        }
        #button5:hover
        {
            cursor: pointer;
            color: rgb(240, 239, 239);
            background-color:rgb(68, 67, 67);
        }

    </style>
</head>
<body>
<?php 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
  
    echo'
 
    <h1>welcome '.$_SESSION['naam'].'</h1>
';}
else{
 echo'
<h1>no username</h1>;
        ';
    }


?>
<?php


// $sec= $_GET['subject'];

$servername = "localhost";
$username = "root";
$describe = "";
$database = "facultyfeedback";
// // Create a connection
$conn = mysqli_connect($servername, $username, $describe, $database);

 
  $sql="SELECT * FROM `mock_data__1__1` WHERE id= $sec";
  $result = mysqli_query($conn, $sql);
    
//  $num = mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
    $sno=$row{'sno'}; 
echo '
<div id="container">
    <button id="button1"><a style="color:black;" href="./index.php?index='.$sno.' ">'.$row{'subjec'}.'</button>
</div>';
}

?>



     
  

</body>
</html>