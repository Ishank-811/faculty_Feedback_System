<?php
include 'connection.php';
$error = '';
if(isset($_POST["submit"]))
{
    // validate username empty
    if(isset($_POST['username']) && empty($_POST['username'])) //empty data in HTML.
    {
        $error .= "<div class='alert alert-danger text-center' role='alert'>
        Name is invalid, Please try again!</div>";
    }
    else
    {
        // validate
        if(!preg_match("/^[a-zA-Z ]*$/", $_POST['username'])) //returns whether a match was found in a string.
        {
            $error  .= "<div class='alert alert-success text-center' role='alert'>
            Name is valid.</div>";
        }
    }
    // validate password empty
    if(isset($_POST['password']) && empty($_POST['password']))
    {
        $error .= "<div class='alert alert-danger text-center' role='alert'>
        Password is invalid, please try again.</div>";
    }
    else
    {
        // validate
        if(!preg_match("/^[a-zA-Z ]*$/", $_POST['password'])) //Matching Password!
        {
            $error  .= "<div class='alert alert-success text-center' role='alert'>
            Password is valid.</div>";
        }
    }
    //variables declaration
    $username = $_POST["username"];
    $password = $_POST["password"];


    if(trim($username)!=""and trim($password)!= "") //gives error if $username is empty only whitespace! 
    {
        
        $username= mysqli_real_escape_string($conn,$username);
        // mysqli_real_escape_string is used to escapes special ch. in a string for use in sql query!
        $password= mysqli_real_escape_string($conn,$password);


        //SQL Query
        $query = mysqli_query($conn,"SELECT * FROM admins WHERE 
        username='$username' AND password ='$password'");
        
        //apply mysqli
        $numrows= mysqli_num_rows($query);
        if($numrows >0)
        {
            //session username 
            $_SESSION["username"]= $username; 
            header("location:adminpage.php");


            $error = "<div class='alert alert-success text-center' role='alert'>
            Login is Successfull.</div>";
        }
        else
        {
            $error = "<div class='alert alert-danger text-center' role='alert'>
            Username/Password is incorrect.</div>";
        }
    }
}