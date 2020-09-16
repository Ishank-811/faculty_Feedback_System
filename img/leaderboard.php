<html>
    <head>
    <title>LEADERBOARD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    </head>
    <body>
        <h1>LEADERBOARD</h1>
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
       
          
           echo "<br>";
        
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