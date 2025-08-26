<?php
include 'database.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    
    $userName = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $number = mysqli_real_escape_string($connection, $_POST['number']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $insertSignUpQuery = "INSERT INTO users (username, email, number, password) VALUES 
    ('$userName', '$email', '$number', '$password')";
    
  if (mysqli_query($connection, $insertSignUpQuery)) {
    // Query executed successfully
    echo 'alert("Sign up Successfully!");';
    header("Location: signin.php");
} else {
    // Query execution failed
    echo 'alert("Sign up failed! Please try again.");';
    echo "Error: " . mysqli_error($connection);
}
}

?>


<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontsicon/css/all.css.css">
    <link rel="stylesheet" href="css/signup.css">
    
    <title>Login Page</title>

    

    <link rel="shortcut icon" type="image" href="./image/favicon.png">
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
        <form action="" method="POST"> <!-- Empty action attribute -->
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-solid fa-utensils"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" name="username" placeholder="Name" required >
                <input type="email" name="email" placeholder="Email" required  >
                <input type="number" name="number" placeholder="Phone Number" required  >
                <input type="password" name="password" placeholder="Password"  required  >
                <a href="signup.php" target="_self"><button type="submit">Sign Up</button></a>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome!<img src="image/logo.png" alt="" width="240px"></h1>
                    <p>Enter your personal details to use all of site features</p>
                    <a href="signin.php" target="_self"><button class="hidden" id="login">Sign In</button></a>
                </div>
            </div>
        </div>
    </div>

   
         <script src="js/script.js"></script>


  </body>
</html>