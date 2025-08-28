<?php
include 'database.php';

$select = "SELECT * FROM `order` WHERE email = '" . $_SESSION['email'] . "'";
$query = mysqli_query($connection, $select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>

    <link rel="stylesheet" href="css/myorder.css">
    <link rel="shortcut icon" type="image" href="./image/favicon.png">

</head>
<body>

    <?php
    include 'navbar.php';
    ?>

    
<div class="container">
    <div class="content">
        <div class="content-2">
            <?php
            // Check if there are orders
            $num = mysqli_num_rows($query);
            if ($num > 0) {
            ?>
            <div class="recent-payments">
                <div class="title">
                    <h2>Recent Payments</h2>
                </div>
                <table>
                    <tr>
                        
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>                        
                        <th>Address</th>
                        <th>City</th>
                        <th>Payment method</th>
                        <th>Total Items</th>
                        <th>Total Price</th>
                        <th>Order Status</th>
                    </tr>

                    <?php
                        while ($result = mysqli_fetch_assoc($query)) {
                            echo "
                            <tr>
                                
                                <td>" . $result['name'] . "</td>
                                <td>" . $result['number'] . "</td>
                                <td>" . $result['email'] . "</td>                               
                                <td>" . $result['address'] . "</td>
                                <td>" . $result['city'] . "</td>
                                <td>" . $result['method'] . "</td>
                                <td>". $result['total_products'] . "</td>
                                <td>Rs." . $result['total_price'] . "/-</td>
                                <td>";
                                    switch ($result['status']) {
                                        case 1:
                                            echo "";
                                            break;
                                        case 2:
                                            echo "Accepted";
                                            break;
                                        case 3:
                                            echo "Dispatched";
                                            break;
                                        case 4:
                                            echo "Rejected";
                                            break;
                                        default:
                                            echo "Pending";
                                    }
                            echo "</td>
                            </tr>  
                            ";
                        }
                    ?>

                </table>
            </div>
            <?php
            } else {
                
                echo "<p style='text-align: center; font-size: 2.5rem; color: red; font-weight: bold;'>No recent payments.</p>";
            }
            ?>
        </div>
    </div>
</div>

    <?php
    include 'footer.php';
     ?>


</body>
</html>