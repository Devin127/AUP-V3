<?php 
session_start();
include_once ('database.php');
if(isset($_POST['submit'])){
    $UserName = $_POST['UserName'];
    $UserSurname = $_POST['UserSurname'];
    $UserEmail = $_POST['UserEmail'];
    $UserType = $_POST['UserRole'];
    $UserPassword = $_POST['UserPassword'];
    $sql = "INSERT INTO users (UserName, UserSurname, UserEmail, UserRole, password) VALUES ('$UserName', '$UserSurname', '$UserEmail', '$UserType', '$UserPassword')";
    if(mysqli_query($conn, $sql)){
        header ("Location: signIn.php");
    } else {
        echo "Something Is Broken";
    }
    mysqli_close($conn);
}

if(isset($_POST['submit'])){
    $_SESSION['UserName'] = $_POST['UserName'];
    $_SESSION['UserSurname'] = $_POST['UserSurname'];
    $_SESSION['UserEmail'] = $_POST['UserEmail'];
    $_SESSION['UserRole'] = $_POST['UserRole'];
    $_SESSION['UserPassword'] = $_POST['UserPassword'];
}

?>
