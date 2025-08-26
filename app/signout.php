<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "clashykitchen"; 

$connection = new mysqli($servername, $username, $password, $database);

session_start();

$delete_query = mysqli_query($connection, "DELETE FROM `cart`");

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a different page (optional)
header("Location: index.php"); // Redirect to your homepage or another desired page
exit();

?>