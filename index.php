<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback!</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            margin-bottom: 32px;
            margin-top:-16px;
            color:ghostwhite;
        }
        form
        {
            background-color: #ffffff;
            border:1px solid black;
            opacity: 0.6;
            text-align: center;
            font-weight: 200;
            margin:60px;
            font-family: 'Kumbh Sans', sans-serif;
            color: black;
            font-size: 19px;
            font-weight: 800;
            margin-top: -30px;
        }
        button
        {
            margin-top: -15px;
            padding: 5px;
            font-size: 21px;
            border-radius: 23px;
            font-family: cursive;
            margin-left: 750px;
        }
        button:hover
        {
            background-color: gray;
            cursor: pointer;
            color: honeydew;
            border:none;
        }
        textarea
        {
            margin-left: 92px;
            margin-top: 8px;
        }
    </style>
</head>
<body>




<?php


$servername = "localhost";
$username = "root";
$describe = "";
$database = "facultyfeedback";
// // Create a connection
$conn = mysqli_connect($servername, $username, $describe, $database);

$s_no= $_GET['index'];
  $sql="SELECT * FROM `mock_data__1__1` WHERE sno = $s_no";
  $result = mysqli_query($conn, $sql);
    
//  $num = mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result)){
    $sno=$row{'sno'};
    $name=$row{'first_name'} ;
echo '

    <h1 style="margin-top:10px;">'.$row{'first_name'}.' '.$row{'last_name'}.'</h1>';

}



session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){ 
  




$method= $_SERVER['REQUEST_METHOD'];

if($method=='POST'){
  $rate1= $_POST['rate1'];
  $rate2= $_POST['rate2'];
  $rate3= $_POST['rate3'];
  $rate4= $_POST['rate4'];
  $rate5= $_POST['rate5'];
   $comment= $_POST['comment'];
   
   $sum = $rate1+$rate2+$rate3+$rate4+$rate5; 
   $totalsum=  $totalsum+$sum;  
$sql3="INSERT INTO `teachers_rating` (`sno`, `student_number`, `teacher`, `rate1`, `rate2`, `rate3`, `rate4`, `rate5`, `comment`,`time`, `rating` )  VALUES (NULL, '".$_SESSION['naam']."', ' $name', '$rate1', '$rate2', '$rate3', '$rate4', '$rate5', '$comment', current_timestamp(), '$totalsum');";
$result3 = mysqli_query($conn , $sql3);
header("location:subjects.php");
}
else{
echo ""; 
}
}

?>



    <?php 
    echo '
   
    <h1 class="rate">RATE THE QUESTIONS</h1>
   
    <form action=" '. $_SERVER["REQUEST_URI"].'" method="POST">
        <p>Does the faculty clarify your doubts in class?</p>
        <div  class="form-group">
            <input type="radio" name="rate1" value="1"> 1 
            <input type="radio" name="rate1" value="2"> 2 
            <input type="radio" name="rate1" value="3"> 3 
            <input type="radio" name="rate1" value="4"> 4 
            <input type="radio" name="rate1" value="5">5 

        </div>
        <p>Does faculty explain all topics & cover syllabus?</p>
        <div  class="form-group">
            <input type="radio" name="rate2" value="1"> 1 
            <input type="radio" name="rate2" value="2"> 2 
            <input type="radio" name="rate2" value="3"> 3 
            <input type="radio" name="rate2" value="4"> 4 
            <input type="radio" name="rate2" value="5">5 

        </div>
        <p>Does faculty able to relate subject with practical example?</p>
        <div  class="form-group">
            <input type="radio" name="rate3" value="1"> 1 
            <input type="radio" name="rate3" value="2"> 2 
            <input type="radio" name="rate3" value="3"> 3 
            <input type="radio" name="rate3" value="4"> 4 
            <input type="radio" name="rate3" value="5">5 

        </div>
        <p> Were class test conducted?</p>
        <div  class="form-group">
            <input type="radio" name="rate4" value="1"> 1 
            <input type="radio" name="rate4" value="2"> 2 
            <input type="radio" name="rate4" value="3"> 3 
            <input type="radio" name="rate4" value="4"> 4 
            <input type="radio" name="rate4" value="5">5 

        </div>
        <p>Do faculty provide you with assignments. If yes are they enough to clear all arising doubts?</p>
        <div  class="form-group">
            <input type="radio" name="rate5" value="1"> 1 
            <input type="radio" name="rate5" value="2"> 2 
            <input type="radio" name="rate5" value="3"> 3 
            <input type="radio" name="rate5" value="4"> 4 
            <input type="radio" name="rate5" value="5">5 

        </div>
        <textarea name="comment" id="comments" cols="90" rows="9" placeholder="Add Comments"></textarea>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    '; 
    ?>    
  

    
</body>
</html>