<?php
include 'database.php';

// Delete all items from the cart
$delete_query = mysqli_query($connection, "DELETE FROM `cart`");

if ($delete_query) {
    // Redirect back to the shopping menu after clearing the cart
    header("Location: menu.php");
    exit();
} else {
    echo "Failed to clear cart.";
}
?>