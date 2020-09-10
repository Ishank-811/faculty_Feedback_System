<?php
    require 'register_fac.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Login </title>
    <!-- <link rel="stylesheet" href="/admin.css"> -->
    <style>
    body
    {
        margin: 0;
        padding:0;
        background-image: url(img/akgec.png);
        background-position: center;
        background-size:cover;
        background-origin: content-box;
        background-attachment: fixed;
    }
    .loginbox
    {
        width:320px;
        height: 420px;
        background:#000;
        opacity: 0.7;
        color:#fff;
        top:50%;
        left:50%;
        position: absolute;
        transform: translate(-50%,-50%);
        box-sizing: border-box;
        padding:70px 30px;
    }
    .avatar
    {
        width: 100px;
        height:100px;
        border-radius: 50%;
        position: absolute;
        top: -50px;
        left: calc(50% - 50px);
    }
    h1
    {
        margin:0;
        padding:0 0 20px;
        text-align: center;
        font-size: 22px;
    }
    .loginbox p
    {
        margin:0;
        padding:0;
        font-weight: bold;
    }
    .loginbox input
    {
        width: 100%;
        margin-bottom:20px;
    }
    .loginbox input[type="text"], input[type="password"]
    {
        border:none;
        border-bottom:1px solid #fff;
        background:transparent;
        outline:none;
        height: 40px;
        color:#fff;
        font-size:16px;

    }
    .loginbox input[type="submit"]
    {
        border:none;
        outline:none;
        height: 40px;
        background:#fb2525;
        color:#fff;
        font-size: 18px;
        border-radius: 20px;
        margin-top:21px;
    }
    .loginbox input[type="submit"]:hover
    {
        cursor: pointer;
        background:#ffc107;
        color:#000;
    }

</style>
</head>
<body>
    <div class="loginbox">
        <img src="img/avatar.png" class="avatar">
        <!-- <p class="error"><?php echo $error;?></p><p class="success"><?php echo $success;?></p> -->
        <h1>Faculty Login </h1>
        <form method="post" action="faculty_login.php">
            <?=$error ; ?>
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            
        </form>
    </div>
</body>
</html>