<?php 
session_start();
if(isset($_POST['login'])){
    extract($_POST);
    include ('database.php');
    $sql = "SELECT * FROM users WHERE UserEmail = '$UserEmail' AND password = '$UserPassword'";
    $row = mysqli_fetch_array(mysqli_query($conn,$sql));
    if(is_array($row)){
        $_SESSION['ID'] = $row['UserID'];
        $_SESSION['UserEmail'] = $row['UserEmail'];
        $_SESSION['UserPassword'] = $row['password'];
        $_SESSION['UserName'] = $row['UserName'];
        $_SESSION['UserRole'] = $row['UserRole'];
        $_SESSION['UserSurname'] = $row['UserSurname'];
        header('location:home.php');
} else {
    echo "Login Failed";
}
}
?>