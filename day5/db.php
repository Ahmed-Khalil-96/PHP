<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'day5';

$conn = mysqli_connect($hostname, $username, $password,$database );

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn , "CREATE DATABASE IF NOT EXISTS day5");
mysqli_select_db($conn, $database);
?> 