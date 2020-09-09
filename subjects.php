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
 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userna = $_POST['username'];
    $sec= $_POST['section'];

 $servername = "localhost";
 $username = "root";
 $describe = "";
 $database = "facultyfeedback";
  
 $conn = mysqli_connect($servername, $username, $describe, $database);
 // Die if connection was not successful
 if (!$conn){
     die("Sorry we failed to connect: ". mysqli_connect_error());
 }
 else{ 

//$id= $_GET['subjects'];
$sql="SELECT * FROM `mock_data__1_` WHERE Section ='$sec'";
//$sql2="SELECT * FROM `subjectsList` WHERE sub = '$sec'";

     $result = mysqli_query($conn, $sql);
    // $result2 = mysqli_query($conn, $sql2);
     $num = mysqli_num_rows($result);
   
     

     $noresult=true;
      echo "$num"; 
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['sno']; 
          $sub=$row['Subjec']; 
         $noresult=false; 
        echo "
     
     <div id='container'>
         <button id='button1'><a style='color:black;' href='./index.php?index=".$id." '>".$row['Subjec']."</button>
     </div>   
         ";
      }
    }
}
 
  ?>





</body>
</html>