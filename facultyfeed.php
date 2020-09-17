<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <style>
          body{
      background: rgb(58,52,157);
background: linear-gradient(90deg, rgba(58,52,157,1) 9%, rgba(0,212,255,1) 100%);
      padding-left:50px;
      padding-right:50px;
    }
        .n{
            text-align:center;
            background-color:black;
            color:yellow;
           
          
        }
      
    </style>
</head>
    <nav class="n">
  <a class="navbar-brand" href="adminpage.html">ADMIN PAGE <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-award-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M8 0l1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
  <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
</svg></a>
&nbsp;&nbsp; &nbsp;  &nbsp;
<a class="navbar-brand" href="logout.php">Logout <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/> </svg></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<br>
<br>
<br>
<div class="ta"> 

<table class="table" id="myTable">
  <thead>
 <tr style="background-color:darkgrey">
      <th  scope="col">S.NO.</th>
      <th scope="col">ST.NO.</th>
      <th scope="col">TEACHER</th>
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
  
  
  
  //connect to Database
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
  
  $sql= "SELECT * FROM `teachers_rating` ";
  $result=mysqli_query($conn,$sql);
  $sno=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $sno=$sno+1;
   
    $st=$row{'student_number'};
    $t=$row{'teacher'};
    $r1=$row{'rate1'};
    $r2=$row{'rate2'};
    $r3=$row{'rate3'};
    $r4=$row{'rate4'};
    $r5=$row{'rate5'};
    $co=$row{'comment'};
    
    
  
     echo "<tr>
     <th scope='row'>$sno</th>
    
     <td >$st</td>
     <td>$t</td>
     <td>$r1</td>
     <td> $r2</td>
     <td> $r3</td>
     <td>$r4</td>
     <td>$r5</td>
     <td>$co</td>
     
   </tr> ";
   

  }
}
?>
</tbody>
</table>


</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src= "//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
     <script>  
    $(document).ready( function () {
    $('#myTable').DataTable();
     } );
    </script>
      <script>  
       </body>
</html>