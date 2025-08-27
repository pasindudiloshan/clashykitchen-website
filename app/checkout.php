<?php
include 'database.php';

if(isset($_POST['order_btn'])){

    $name = $_POST['name'];
    $number = $_POST['number'];
    $province = $_POST['province'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $method = $_POST['method'];

    
    $cart_query = mysqli_query($connection, "SELECT * FROM `cart`");
    $price_total = 0;
    $product_name = array(); 
    if(mysqli_num_rows($cart_query) > 0){
        while($product_item = mysqli_fetch_assoc($cart_query)){
            $product_name[] = $product_item['name'] .'('.$product_item['quantity'] .')';
            $total_price = $product_item['price'] * $product_item['quantity']; 
            $price_total += $total_price;
         };
    };

    $total_product = implode(',', $product_name);

    $detail_query = mysqli_query($connection, "INSERT INTO `order`(name, number, email,
    province, `address`, city, postal_code, method, total_products, total_price) VALUES('$name', '$number', '" . $_SESSION['email'] . "',
    '$province', '$address', '$city', '$postal_code', '$method', '$total_product', '$price_total')") or die('query failed');



    if($detail_query){
        
        echo "
        <div class='order-message-container'>
            <h3>Thank you for shopping!</h3>
            <div class='order-detail'>
                <span>".$total_product."</span>
                <span class='total'>Total: Rs.".$price_total."/-</span>
            </div>
            <div class='customer-details'>
                <p>Your name: <span>".$name."</span></p>
                <p>Your number: <span>".$number."</span></p>
                <p>Your address: <span>".$address.", ".$city.", ".$province.", ".$postal_code."</span></p>
                <p>Your payment method: <span>".$method."</span></p>
                <p>(*Thank you for your order! <br> We're working hard to confirm it. Please bear with us for a moment.*)</p>
            </div>
            <a href='cartclear.php' class='option-btn'>Continue Shopping</a>
        </div>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

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

    <div class="checkout-container">
        <section class="checkout-form">

            <h1 class="heading">Complete your Order</h1>
                
            <form action="" method="post">

                <div class="display-order">
                    <?php 
                        $select_cart = mysqli_query($connection, "SELECT * FROM `cart`");
                        $grand_total = 0;
                        if (mysqli_num_rows($select_cart) > 0) {
                            while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                $total_price = $fetch_cart['price']  * $fetch_cart ['quantity']; 
                                $grand_total += $total_price; 
                    ?>
                        <span>
                            <img src="<?= $fetch_cart['image']; ?>" width="100" height="100" alt="Product Image"><br>
                            <?= $fetch_cart['name']; ?><br>
                            (<?= $fetch_cart['quantity']; ?>)
                        </span>
                    <?php 
                            }
                        } else {
                            echo "<div class='display-order'><span>Your cart is empty!</span></div>";
                        }
                    ?>
                    <span class="grand-total">Grand total: Rs.<?= $grand_total; ?>/-</span>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Your Name: </span>
                        <input type="text" placeholder="Enter your name" name="name"  required>
                    </div>
                    <div class="inputBox">
                        <span>Your Number:</span>
                        <input type="number" placeholder="Enter your number" name="number" required>
                    </div>
                   
                    <div class="inputBox">
                        <span>Province:</span>
                        <select name="province" required>
                            <option hidden>Province</option>
                            <option value="Western">Western</option>
                            <option value="Central">Central</option>
                            <option value="Southern">Southern</option>
                            <option value="Northern">Northern</option>
                            <option value="Eastern">Eastern</option>
                            <option value="North-Western">North-Western</option>
                            <option value="North-Central">North-Central</option>
                            <option value="Uva">Uva</option>
                            <option value="Sabaragamuwa">Sabaragamuwa</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Address:</span>
                        <input type="text" placeholder="E.g. 111/1, street name" name="address" required>
                    </div>
                    <div class="inputBox">
                        <span>City:</span>
                        <input type="text" placeholder="E.g. Ja-Ela" name="city" required>
                    </div>
                    <div class="inputBox">
                        <span>Postal Code:</span>
                        <input type="text" placeholder="E.g. 00001" name="postal_code" required>
                    </div>
                    <div class="inputBox">
                        <span>Payment Method:</span>
                        <select name="method" required>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                            <option value="Credit/Debit Card Payment">Card Payment</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Order Now" name="order_btn" class="option-btn">
            </form>
        </section>
    </div>

    <?php
    include 'footer.php';
     ?>

    <script src="js/menu.js"></script>


</body>
</html>
