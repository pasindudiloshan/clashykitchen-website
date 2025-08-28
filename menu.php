<?php
include 'database.php';

if(isset($_POST['add_to_cart'])) {
    if($_SESSION['email'] == null) {
        header("Location: signin.php");
        exit();
    } else {
        $product_name = $_POST['product_name'];
        $product_info = $_POST['product_info'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;

        $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE name = '$product_name'");
        
        if(mysqli_num_rows($select_cart) > 0) {
            echo "<p style='color:#b30000; font-size:22px; font-weight:bold; padding: 0.3rem;'><i class='fa-solid fa-circle-exclamation fa-xl'></i> Product already added to cart!</p>";
        } else {
            $insert_product = mysqli_query($connection, "INSERT INTO `cart` (name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
            echo "<p style='color:green; font-size:22px; font-weight:bold; padding: 0.3rem;'><i class='fa-regular fa-circle-check fa-xl'></i> Product added to cart successfully!</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clashy Kitchen Menu</title>

    <link rel="stylesheet" href="css/menustyle.css">
    <link rel="shortcut icon" type="image" href="./image/favicon.png">

    <!-- bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap links -->

    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- fonts links -->

    <!-- icons links -->
    <link rel="stylesheet" href="fontsicon/css/all.css.css">
    <!-- icons links -->
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="menu">
        <h1>Most<span>Popular</span></h1>
        <div class="menu-box">
            <?php 
            if (isset($_POST['query'])) {
                $search_query = $_POST['query'];
                $select_products = mysqli_query($connection, "SELECT * FROM `popitems` WHERE name LIKE '%$search_query%'");
            } else {
                $select_products = mysqli_query($connection, "SELECT * FROM `popitems`");
            }

            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>
            <div class="menu-card">
                <img src="image/popular ribbon.png" alt="Popular Ribbon" class="ribbon">
                <div class="menu-image">
                    <img src="<?php echo $fetch_product['image']; ?>">
                </div>
                <div class="small-card">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="small-card2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="menu-info">
                    <h2><?php echo $fetch_product['name']; ?></h2>
                    <p><?php echo $fetch_product['info']; ?></p>
                    <h3>Rs.<?php echo $fetch_product['price']; ?></h3>
                    <div class="menu-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_info" value="<?php echo $fetch_product['info']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="submit" class="menu-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p style='text-align: center; font-size: 2.5rem; color: red; font-weight: bold;'>No food items match your search.</p>";
            }
            ?>
        </div>
    </div>

    <div class="menu">
        <h1>All<span>Menu</span></h1>
        <div class="products-list">
            <div class="products">
                <?php 
                if (isset($_POST['query'])) {
                    $search_query = $_POST['query'];
                    $select_products = mysqli_query($connection, "SELECT * FROM `items` WHERE name LIKE '%$search_query%'");
                } else {
                    $select_products = mysqli_query($connection, "SELECT * FROM `items`");
                }

                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_product = mysqli_fetch_assoc($select_products)){
                ?>
                <form action="" method="post">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="<?php echo $fetch_product['image']; ?>">
                        </div>
                        <div class="add-to-cart" onclick="addToCart()">
                            <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                        </div>
                        <div class="menu-info">
                            <h2><?php echo $fetch_product['name']; ?></h2>
                            <p><?php echo $fetch_product['info']; ?></p>
                            <h3>Rs.<?php echo $fetch_product['price']; ?></h3>
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <input type="hidden" name="product_info" value="<?php echo $fetch_product['info']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                            <input type="submit" class="menu-btn" value="Add to Cart" name="add_to_cart">
                        </div>
                    </div>
                </form>
                <?php
                    }
                } else {
                    echo "<p style='text-align: center; font-size: 2.5rem; color: red; font-weight: bold;'>No food items match your search.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="js/menu.js"></script>
</body>
</html>
