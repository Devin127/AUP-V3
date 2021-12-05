<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up</title>
    </head>
    <body>
        <form method="POST" action="process.php" >
            <input id="UserName" type="text" name="UserName" placeholder="Your Name" required>
            <input id="UserSurname" type="text" name="UserSurname" placeholder="Your Surname" required>
            <input id="UserEmail" type="text" name="UserEmail" placeholder="Your Email" required>

            <br>
            <!-- add a radio for librarian or member -->
            <p>Are you a librarian?</p>
            <input id="UserRole" type="radio" name="UserRole" value="Librarian" required>
            <p>Or a Member?</p>
            <br>
            <input id="UserRole" type="radio" name="UserRole" value="Member" required>
            
            <input id="UserPassword" type="password" name="UserPassword" placeholder="Your Password" required>
            <input id="UserPassword2" type="password" name="UserPassword2" placeholder="Confirm Password" required>
            <input type="submit" name="submit" value="Sign Up">
        </form>
    </body>
        