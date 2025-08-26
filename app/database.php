<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "clashykitchen"; 


$connection = new mysqli($servername, $username, $password, $database);


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>