<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "phptutorials";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
