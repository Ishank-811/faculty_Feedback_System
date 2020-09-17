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
     
      padding-left:50px;
      padding-right:50px;
      background: rgb(58,52,157);
      background: linear-gradient(90deg, rgba(58,52,157,1) 9%, rgba(209,0,255,1) 100%);

    }
    .n{
            text-align:center;
            background-color:purple;
           
         
        }
        .n h4{
          color:white;
          
        }
        #myTable{
          background-color:purple;
        }

          
        }

  
    </style>
  </head>
  <body>
  <?php 
session_Start(); 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
  
    echo'
 
    <nav class="n">
  <a class="navbar-brand"><h4> WELCOME '.$_SESSION['username'].' ! <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-emoji-laughing" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5z"/>
  <path d="M7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
</svg></h4></a>
&nbsp;&nbsp; &nbsp;  &nbsp;
<a class="navbar-brand" href="logout.php"><h4> Logout <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/> </svg></h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
';}
else{
 echo'
<h1>no username</h1>;
        ';
    }


?>
<br>
<br>
<br>
<br>
<br>
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
        
      $totalsum=0; 
      while($row=mysqli_fetch_assoc($result))
      {
         
         $sno=$sno+1;
         
         $comments = $row{'comment'}; 
         $r1=$row{'rate1'};
         $r2=$row{'rate2'};
         $r3=$row{'rate3'};
         $r4=$row{'rate4'};
         $r5=$row{'rate5'};
        $sum = $r1+$r2+$r3+$r4+$r5; 
        $totalsum=  $totalsum+$sum; 


        echo "<tr>
     
    
  
     <td>$r1</td>
     <td> $r2</td>
     <td> $r3</td>
     <td>$r4</td>
     <td>$r5</td>
     <td>$comments</td>
     
   </tr> ";
      
     
      }
      echo "$totalsum";
      
      $sql2="UPDATE `teachers_rating` SET `sum` = '$totalsum' WHERE `teachers_rating`.`teacher` =  ".$_SESSION['username']."";
      $result = mysqli_query($conn, $sql);
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