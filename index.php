<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback!</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <style>
        
        body
        {
            background-image: url(img/class1.jpg);
            background-repeat: no-repeat;
            background-size:cover;
            
        }
        h1
        {
            text-align: center;
            text-decoration: underline;
            font-family: cursive;
            margin-bottom: 47px;
            margin-top:-9px;
            color:ghostwhite;
        }
        form
        {
            text-align: center;
            font-weight: 200;
            font-family: 'Kumbh Sans', sans-serif;
            color: ghostwhite;
            font-size: 19px;
            font-weight: 800;
        }
        button
        {
            margin-top: 39px;
            font-size: 21px;
            border-radius: 23px;
            font-family: cursive;
        }
        button:hover
        {
            background-color: gray;
            cursor: pointer;
            color: honeydew;
            border:none;
        }
    </style>
</head>
<body>
<?php

    //$userna = $_POST['username'];
  //  $sec= $_POST['section'];
  //  $sub= $_POST['Subjec'];


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
$s_no= $_GET['index'];
$sql2="SELECT * FROM `mock_data__1_` WHERE sno= '$s_no' ";

     $result2 = mysqli_query($conn, $sql2);
     $num2 = mysqli_num_rows($result2);
   echo"$num2" ; 
     

     $noresult=true;
     
      while($row=mysqli_fetch_assoc($result2)){
         $noresult=false; 
        echo "
     
     <div id='container'>
         <h1>".$row['first_name']."</h1>
     </div>   
         ";
      }
    }


  ?>
    <h1 class="rate">RATE THE QUESTIONS</h1>
    <form action="#">
        <p>Does the faculty clarify your doubts in class?</p>
        <div>
            <input type="radio" name="rate1" value="1"> 1 
            <input type="radio" name="rate1" value="2"> 2 
            <input type="radio" name="rate1" value="3"> 3 
            <input type="radio" name="rate1" value="4"> 4 
            <input type="radio" name="rate1" value="5">5 

        </div>
        <p>Does faculty explain all topics & cover syllabus?</p>
        <div>
            <input type="radio" name="rate2" value="1"> 1 
            <input type="radio" name="rate2" value="2"> 2 
            <input type="radio" name="rate2" value="3"> 3 
            <input type="radio" name="rate2" value="4"> 4 
            <input type="radio" name="rate2" value="5">5 

        </div>
        <p>Does faculty able to relate subject with practical example?</p>
        <div>
            <input type="radio" name="rate3" value="1"> 1 
            <input type="radio" name="rate3" value="2"> 2 
            <input type="radio" name="rate3" value="3"> 3 
            <input type="radio" name="rate3" value="4"> 4 
            <input type="radio" name="rate3" value="5">5 

        </div>
        <p> Were class test conducted?</p>
        <div>
            <input type="radio" name="rate4" value="1"> 1 
            <input type="radio" name="rate4" value="2"> 2 
            <input type="radio" name="rate4" value="3"> 3 
            <input type="radio" name="rate4" value="4"> 4 
            <input type="radio" name="rate4" value="5">5 

        </div>
        <p>Do faculty provide you with assignments. If yes are they enough to clear all arising doubts?</p>
        <div>
            <input type="radio" name="rate5" value="1"> 1 
            <input type="radio" name="rate5" value="2"> 2 
            <input type="radio" name="rate5" value="3"> 3 
            <input type="radio" name="rate5" value="4"> 4 
            <input type="radio" name="rate5" value="5">5 

        </div>
        <button>Submit</button>
    </form>
    

    
</body>
</html>