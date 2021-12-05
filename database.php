<?php
$servername='localhost:3306';
$username='root';
$password='root';
$dbname = "onlybooks";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Failed to Connect to onlyBooks database'.mysqli_connect_error());
}
?>