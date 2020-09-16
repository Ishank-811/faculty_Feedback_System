<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>STUDENT LOGIN</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
    body {
		font-family: 'Varela Round', sans-serif;
        background-image:url(./akgec.jpg) ;
		background-repeat: none;
    background-position: center;
    background-size:cover;
	background-origin: content-box;
    background-attachment: fixed;
	
	
	}
	.modal-login {
		
		color: #636363;
		width: 350px;
		margin: 30px auto;
        margin-top: 100px;
        margin-left:700px;
	}
	.modal-login .modal-content 
	{
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-login .modal-header 
	{
		border-bottom: none;
		position: relative;
		justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
	}
	.modal-login  .form-group 
	{
		position: relative;
	}
	.modal-login i 
	{
		position: absolute;
		left: 13px;
		top: 11px;
		font-size: 18px;
	}
	.modal-login .form-control 
	{
		padding-left: 40px;
	}
	.modal-login .form-control:focus 
	{
		border-color: #00ce81;
	}
	.modal-login .form-control, .modal-login .btn 
	{
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-login .hint-text 
	{
		text-align: center;
		padding-top: 10px;
	}
	.modal-login .close 
	{
        position: absolute;
		top: -5px;
		right: -5px;
	}
	.modal-login .btn 
	{
		background: #00ce81;
		border: none;
		line-height: normal;
	}
	.modal-login .btn:hover, .modal-login .btn:focus 
	{
		background: #00bf78;
	}
	.modal-login .modal-footer 
	{
		background: #ecf0f1;
		border-color: #dee4e7;
		text-align: center;
		margin: 0 -20px -20px;
		border-radius: 5px;
		font-size: 13px;
		justify-content: center;
	}
	.modal-login .modal-footer a 
	{
		color: #999;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
</head>
<body>

<?php
//if ($_SERVER['REQUEST_METHOD'] == 'POST'){

//include "conn.php";
$showlogin=false; 
$showError=false; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $userna = $_POST['username'];
  $sec= $_POST['section'];
 
 

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "facultyfeedback";

//Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
//Die if connection was not successful
if (!$conn){
	die("Sorry we failed to connect: ". mysqli_connect_error());
	echo "die"; 
}
else{ 
  //Submit these to a database
 // Sql query to be executed 
 
 
	$sql = "SELECT * FROM  studentlogin where username='$userna' and status=0 ";

   $result = mysqli_query($conn, $sql);
   $num = mysqli_num_rows($result);
 
   if ($num==1){
       $showlogin = true;
	$row = mysqli_fetch_assoc($result);
	$ids=$row{"id"}; 
	   session_start();
	   $_SESSION['section']=$sec; 
       $_SESSION['loggedin']=true;
       $_SESSION['naam']=$userna;
	   $_SESSION['sno']=$row['sno'];
	   header("location:subjects.php");
   }

else{
	$showError=true; 
	$showError="invalid credentials"; 
 
}



}
}

?>
<?php
 if($showlogin){
  echo '<div class="alert alert-success " role="alert">
    <strong>Success!</strong> You have been logged in 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>';
}
if($showError){
  echo '<div class="alert alert-danger " role="alert">
  <strong>Error! </strong>'.$showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">×</span>
</button>
</div>';
}
?>


	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 clxxass="modal-title">Student Login</h4>
				
			</div>
			<div class="modal-body">
				<form action="studentlogin.php" method="post">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="number" name="username" class="form-control" placeholder="Student Number" required="required">
					</div>
					<div class="form-group">
						SECTION :  
                            <select name="section" required>  
								<option value="Select">Select</option>
  
                                <option value="5">CSE-1</option>  
                                <option value="6">CSE-2</option>  
                                 <option value="7">CSE-3</option>  
								<option value="8">CS-1</option> 
								<option value="9">CS-2</option> 
								<option value="10">CS-3</option>
								<option value="11">CS/IT-1</option>
								<option value="12">CS/IT-2</option>
								<option value="13">CSIT-3</option>
								<option value="1">IT-1</option>  
								<option value="2">IT-2</option>  
								<option value="3">IT-3</option>  
								<option value="4">IT-4</option>  
								<option value="14">ECE-1</option>
								<option value="15">ECE-2</option>
								<option value="16">ECE-3</option>
								<option value="17">EEE-1</option>
								<option value="18">EEE-2</option>
								<option value="19">EEE-3</option>
								<option value="20">ME-1</option>
								<option value="21">ME-2</option>
								<option value="22">ME-3</option>
								<option value="23">CIVIL-1</option>
								<option value="24">CIVIL-2</option>
								<option value="25">CIVIL-3</option>

                            </select>   
					</div>
					<div class="form-group">
						BRANCH:
						<select name="branch" required>  
							<option value="Select">Select</option> 
							
							<option value="CSE">CSE</option>  
							
							<option value="CS">CS</option> 
						
							<option value="CS/IT">CS/IT</option>
							
							<option value="IT">IT</option>  
							
							<option value="ECE">ECE</option>
							
							<option value="EEE">EEE</option>
						
							<option value="ME">ME</option>
						
							<option value="CIVIL">CIVIL</option>
							
							
						  </select>   					
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">
					</div>
				</form>				
				
			</div>
			
		</div>
	</div> 
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
