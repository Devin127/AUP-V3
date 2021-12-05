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
    if(isset($_SESSION['UserRole']) == 'Librarian'){
        include ('Librarian.php');
    } else {
        include ('Member.php');
    }
