<?php

include 'database.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="css/navbar.css">

  <!-- bootstrap links -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- bootstrap links -->

  <!-- fonts links -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Rubik:wght@400;500;600;700&family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- fonts links -->
  
  <!-- icons links -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="fontsicon/css/all.css.css">
  <!-- icons links -->
</head>
<body>
  <!-- Navbar link -->
  <nav class="navbar navbar-expand-md" id="navbar">
    <a class="navbar-brand" href="#" id="logo"><img src="./image/logo.png" alt="" width="200px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span><img src="./image/menu.png" alt="" width="30px"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menu.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reviews.php">Reviews</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About Us</a>
        </li>
        <form class="search-bar ml-auto" method="POST" action="menu.php">
        <input class="search-input" type="search" name="query" placeholder="Search" aria-label="Search">
        <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </ul>
    </div>
    <div class="icons">
        <?php if (isset($_SESSION["email"])){ ?>
        <a class="nav-link"  href="signout.php">Sign Out</a>
        <?php } else { ?>
        <a class="nav-link" href="signin.php" target="_blank" title="Sign In">Sign In</a>
        <?php } ?>

      <a class="nav-link" href="signup.php" target="_blank" title="Sign Up">Sign Up</a>

      <?php 
      $select_rows = mysqli_query($connection, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      ?>
      <a href="cart.php"> <img src="./image/add.png" alt="" width="40px"> </a>
      <h5> <?php echo $row_count; ?> </h5>
    </div>
  </nav>
  <!-- navbar end -->
  <script src="js/menu.js"></script>
  </body>
  </html>