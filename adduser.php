<?php
include 'database.php';

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user input from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $userName = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $number = isset($_POST['number']) ? htmlspecialchars($_POST['number']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    
    if (empty($userName) || empty($email) || empty($password)) {
        echo "Please fill out all required fields.";
    } else {
       
        $query = "INSERT INTO users (username, number, email, password) VALUES ('$userName', '$number', '$email', '$password')";

        
        if (mysqli_query($connection, $query)) {
            echo "User Added Successfully!.";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="fontsicon/css/all.css.css">
</head>
<body>

    <?php
    include 'adminnavbar.php';
    ?>

    <div class="container">
        <h1>Add User</h1>
        <!-- HTML form to get the user inputs and send them to the server to process -->
        <form action="adduser.php" method="POST" style="padding: 100px;">
            <label for="first_name">First Name:</label>
            <input type="text" name="username" required>
            <br><br>
            <label for="number">Phone Number:</label>
            <input type="text" name="number" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br><br>
            <input type="submit" value="Add User">
        </form>
    </div>
</body>
</html>
