<?php 
$servername = "localhost";
$database = "manage";
$username = "root";
$password = "password";

$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>