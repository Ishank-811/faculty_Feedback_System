<?php



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    
    <title>FACULTY PAGE</title>
    <style>
    body{
      background-color:darkgrey;
      padding-left:50px;
      padding-right:50px;
    }
  
    </style>
  </head>
  <body>
  <?php 
session_Start(); 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
  
    echo'
 
    <h1>welcome '.$_SESSION['username'].'</h1>
';}
else{
 echo'
<h1>no username</h1>;
        ';
    }


?>
  </tbody>
<table>


</div>
    

<div class="ta"> 

<table class="table" id="myTable">
  <thead>
    <tr>
      
    
     
      <th scope="col">RATE 1</th>
      <th scope="col">RATE 2</th>
      <th scope="col">RATE 3</th>
      <th scope="col">RATE 4</th>
      <th scope="col">RATE 5</th>
      <th scope="col">COMMENT</th>
     
    </tr>
  </thead>

  <tbody>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "facultyfeedback"; 
    //Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    //Die if connection was not successful
    if (!$conn)
    {	die("Sorry we failed to connect: ". mysqli_connect_error());	echo "die"; }
    else
    {
    

      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){

      $username=$_SESSION["username"]; 

      $sql= "SELECT * FROM `teachers_rating` where `teacher`= ' $username' ";
     
      $result=mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
    
      $sno=0;

      while($row=mysqli_fetch_assoc($result))
      {
         $sno=$sno+1;
         
         $comments = $row{'comment'}; 
         $r1=$row{'rate1'};
         $r2=$row{'rate2'};
         $r3=$row{'rate3'};
         $r4=$row{'rate4'};
         $r5=$row{'rate5'};

        echo "<tr>
   
    
  
     <td>$r1</td>
     <td> $r2</td>
     <td> $r3</td>
     <td>$r4</td>
     <td>$r5</td>
     <td>$comments</td>
     
   </tr> ";
      
     
      }
    }
    else {
      echo "wrong connection"; 
    }
  }
    ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src= "//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
     <script>  
    $(document).ready( function () {
    $('#myTable').DataTable();
     } );
    </script>
    </body>
    </html>