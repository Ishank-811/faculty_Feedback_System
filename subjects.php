<?php
session_start(); 
$sec=  $_SESSION['section']; 
$stu_no=$_SESSION['naam'];
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

        #logout
        {
            display: block;
           position:absolute; 
           top:10px; 
           right:50px; 
            font-size: 40px;
            border-radius: 40px;
            font-family: cursive;
            margin-bottom: 10px;
            background-color:red; 
            color:white; 

        }
        #button1:hover
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
 
    <h1>welcome '.$stu_no.'</h1>
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

 
  $sql="SELECT * FROM `mock_data__1__1` WHERE id=$sec";
  $result = mysqli_query($conn, $sql);

    
//  $num = mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
    $sub=$row{'subjec'}; 
//echo "$sub"; 
    $sql2="SELECT * FROM `branch_1` WHERE student_no= $stu_no and subjec='$sub' and status=0 ";
    $result2 = mysqli_query($conn, $sql2); 
    $num2 = mysqli_num_rows($result2);
  

    if($num2==1){
    $sno=$row{'sno'}; 
    
echo '
<div id="container">
    <button id="button1"><a style="color:black;" href="./index.php?index='.$sno.'&subjec='.$sub.'">'.$sub.'</button>
</div> 
<input actions="./index.php?index='.$sno.' " type="hidden" class="form-control" id="sno" name="sno" value="'.$sub.'">
';
    }
    else{
       echo " "; 
    }
}


?>
<button id="logout"><a href="logout.php" >logout</a></button>

<script type="text/javascript" src="./jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="./main.js"></script>
<script>
$(document).ready(function (){


$('#button1').click(function(){
$('#button1').css({display:'none'});
console.log("graphic show"); 
}); 
}); 

</script>
     
  

</body>
</html>