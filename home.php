<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Only-Books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
    <?php
    if(isset($_SESSION['UserRole']) && $_SESSION['UserRole'] == 'Librarian'){
        // header ("Location: home.php");
        include ('Librarian.php');
    } else if(isset($_SESSION['UserRole']) && $_SESSION['UserRole'] == 'Member') {
        // header ("Location: home.php");
        include ('Member.php');
    } else {
        header ('Location: signIn.php');
    }
    ?> 
