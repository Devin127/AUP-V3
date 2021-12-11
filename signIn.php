<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <form action= "signInProcess.php" method="post" enctype="multipart/form-data">
        <h2>Login</h2>

        <input type="email" name="UserEmail" placeholder="Email" required>
        <input type="password" name="UserPassword" placeholder="Password" required>
        <input id="login" type="submit" name="login" value="Login">


    </form>
    <p>Dont have an account?<a href="signUp.php">Sign Up</a></p>
</body>