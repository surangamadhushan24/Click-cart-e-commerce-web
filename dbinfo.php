<?php 

$dbName = "webproject";
$userName = "root";
$password = "";
$hostname = "localhost";

$conn = mysqli_connect($hostname,$userName,$password);

mysqli_select_db($conn,$dbName);
session_start();

if(!$conn){
    die("connnection failed :".mysqli_connect_error());
}

?>