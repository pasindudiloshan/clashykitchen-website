<?php
include 'database.php';

if (!isset($_SESSION["email"])) {
    header("Location: signup.php"); 
    exit();
}

if(isset($_GET['remove'])) {
    $id = $_GET['remove'];
    
    $query = "DELETE FROM cart WHERE id = $id";
    mysqli_query($connection, $query);
    header("Location: cart.php"); 
    exit();
}

// Update quantity
if(isset($_POST['update_update_btn']) && isset($_POST['update_quantity'])) {
    $id = $_POST['update_quantity_id'];
    $quantity = $_POST['update_quantity'];
    
    $query = "UPDATE cart SET quantity = $quantity WHERE id = $id";
    mysqli_query($connection, $query);
    header("Location: cart.php"); 
    exit();
}


if(isset($_GET['delete_all'])) {
   
    $query = "TRUNCATE TABLE cart"; 
    mysqli_query($connection, $query);
    header("Location: cart.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="css/menustyle.css">
    <link rel="shortcut icon" type="image" href="./image/favicon.png">

    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- fonts links -->

    <!-- icons links -->
    <link rel="stylesheet" href="fontsicon/css/all.css">
    <!-- icons links -->

</head>
<body>

    <?php
    include 'navbar.php';
    ?>

    <div class="cart-container">
        
        <section class="shopping-cart">

            <h1 class="heading">Shopping Cart</h1>
            <td><a href="myorder.php" class="option-btn" style="display: inline-block; width:120px; margin-left: 88%; margin-bottom: 10px;background-color: green;">My Orders</a></td>

            <?php
            
            $select_cart = mysqli_query($connection, "SELECT * FROM `cart`");
            if(mysqli_num_rows($select_cart) == 0) {
                echo '<p style="text-align: center; font-size: 2.5rem; color: red; font-weight: bold;">Your cart is empty.</p>';
            } else {
            ?>

            <table>
                <thead>
                    <th>Food</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>
                <tbody>

                    <?php 
                    $grand_total = 0;
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
                        $grand_total += $sub_total;
                    ?>

                    <tr>
                        <td><img src="<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td>Rs.<?php echo number_format($fetch_cart['price']); ?>/-</td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                                <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                                <input type="submit" value="Update" name="update_update_btn">
                            </form>
                        </td>
                        <td>Rs.<?php echo $sub_total; ?>/-</td>
                        <td>
                            <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remove item from cart?')" class="btn-delete">
                                <i class="fas fa-trash"></i> Remove
                            </a>
                        </td>
                    </tr>

                    <?php 
                    }     
                    ?>

                    <tr class="tabel-bottom">
                        <td><a href="menu.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
                        <td colspan="3">Grand Total</td>
                        <td class="grand-total" >Rs.<?php echo $grand_total; ?>/-</td>
                        <td>
                            <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="btn-delete">
                                <i class="fas fa-trash"></i> Delete All
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="checkout-btn">
            <a href="checkout.php" class="cheakout-bun" <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>>Proceed to Checkout</a>
            </div>

            <?php } ?>

        </section>
    </div>
    
    <?php
    include 'footer.php';
     ?>

</body>
</html>   
