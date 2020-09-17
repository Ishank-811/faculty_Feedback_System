<html>
    <head>
    <title>LEADERBOARD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
       body
        {
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 9%, rgba(0,212,255,1) 100%);
            padding-left:50px;
            padding-right:50px;
        }
        .n
        {
            text-align:center;
            background-color:black;
        }
        .n h4{
          color:white;
        }
        #myTable{
          background-color:white;
        }
        .dataTables_info
        {
            color:cyan;
        }
    </style>
    </head>
    <body>
        <nav class="n">
  <a class="navbar-brand" > <h4>LEADERBOARD <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bullseye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path fill-rule="evenodd" d="M8 13A5 5 0 1 0 8 3a5 5 0 0 0 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
          <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
          <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
        </svg></h4></a>
        &nbsp;&nbsp; &nbsp;  &nbsp;
        <a class="navbar-brand" href="logout.php"><h4>Logout <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/> </svg></h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
    </body>

  
      </tbody>
    <table>
    
    
    </div>
        
    
    <div class="ta"> 
    
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">RATINGS</th>
          <th scope="col">TEACHERS</th> 
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
        
       
          $sql= "SELECT DISTINCT(`teacher`) FROM `teachers_rating` ";
         
          $result=mysqli_query($conn,$sql);
          $num = mysqli_num_rows($result);
        
         
       
          while($row=mysqli_fetch_assoc($result))
          {
            $rating = 0  ;
           $t= $row{'teacher'};
           $sql3 ="SELECT `rating` from `teachers_rating` where `teacher`='$t' ";   
           $result3 = mysqli_query($conn, $sql3);
           while($rates=mysqli_fetch_assoc($result3)){

           $rating += $rates{'rating'}; 
            
           }
           $rating= $rating/5; 
       
          
        //    echo "<br>";
        
           echo "<tr>
         
        
          
          
           <td>$rating</td>
           <td>$t</td>
         
         </tr> ";
    
           
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
</html>