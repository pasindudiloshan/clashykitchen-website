<?php
session_start(); // Start the session
include 'database.php';

if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($email == "admin@gmail.com" && $password == "admin123") {
        $_SESSION['email'] = $email; // Set session email for admin
        echo '<script>alert("Admin login successful!");</script>';
        header("Location: adminindex.php");
        exit();
    } else {
        $select = mysqli_query($connection, "SELECT * FROM users WHERE email='$email' AND password='$password'");
        $row = mysqli_fetch_array($select);
        
        if ($row) {
            $_SESSION['email'] = $email; // Set session email for regular user
            echo '<script>alert("Login successful!");</script>';
            header("Location: index.php");
            exit();
        } else {
            echo '<script>';
            echo 'alert("Invalid Email or Password!");';
            echo '</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontsicon/css/all.css">
    <link rel="stylesheet" href="css/signin.css">
    <title>Login Page</title>
    <link rel="shortcut icon" type="image" href="./image/favicon.png">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="signin.php" method="POST">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-solid fa-utensils"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email & password</span>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password"  placeholder="Password" required />
                <button type="submit" name="signin">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!<img src="image/logo.png" alt="" width="240px"></h1>
                    <p>Enter your personal details to use all of site features</p>
                    <a href="signup.php" target="_self"><button class="hidden" id="register">Sign Up</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
