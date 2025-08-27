<?php
include 'database.php';


if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $selectQuery = "SELECT * FROM users WHERE id = '$userId'";
    $result = mysqli_query($connection, $selectQuery);

    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        
        header("Location: viewuser.php");
        exit();
    }
} else {
    
    header("Location: viewuser.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $userId = $_POST['user_id'];
    $userName = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $number = isset($_POST['number']) ? htmlspecialchars($_POST['number']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : $user['password']; // Use existing password if not provided

    
    if (empty($userName) || empty($email)) {
        echo "Please fill out all required fields.";
    } else {
        
        $query = "UPDATE users SET username = '$userName', number = '$number', email = '$email', password = '$password' WHERE id = $userId";

        
        if (mysqli_query($connection, $query)) {
            echo "User Updated Successfully!";
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
    <title>Update User</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="fontsicon/css/all.css.css">
</head>
<body>
    <?php include 'adminnavbar.php'; ?>

    <div class="container">
        <h1>Update User</h1>
        <!-- HTML form to display user details and allow updating -->
        <form action="updateuser.php?id=<?php echo $userId; ?>" method="POST" style="padding: 100px;">
            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
            <label for="first_name">Username:</label>
            <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
            <br><br>
            <label for="number">Phone Number:</label>
            <input type="text" name="number" value="<?php echo $user['number']; ?>" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="text" name="password" value="<?php echo $user['password']; ?>" required>
            <br><br>
            <input type="submit" value="Update User">
        </form>
    </div>
</body>
</html>
