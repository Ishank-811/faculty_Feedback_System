<?php
session_start(); 

 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "facultyfeedback";
 
 //Create a connection
 $conn = mysqli_connect($servername, $username, $password, $database);

$sql="UPDATE `studentlogin` SET `status` = '1' WHERE `studentlogin`.`username` = ".$_SESSION['naam']."";
$result = mysqli_query($conn, $sql);
session_unset();
session_destroy();
header("location:start.html");
?>