<?php

include 'database.php';


$result = mysqli_query($connection, "SELECT COUNT(*) AS userCount FROM users");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $userCount = $row['userCount'];
} else {
    $userCount = 0; 
}

$result = mysqli_query($connection, "SELECT COUNT(*) AS orderCount FROM `order`");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $orderCount = $row['orderCount'];
} else {
    $orderCount = 0; 
}

$result = mysqli_query($connection, "SELECT COUNT(*) AS itemCount FROM items");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $itemCount = $row['itemCount'];
} else {
    $itemCount = 0; 
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = mysqli_query($connection, "DELETE FROM `order` WHERE `id`='$id'");
}

$select = "SELECT * FROM `order` ORDER BY id DESC LIMIT 4";
$query = mysqli_query($connection, $select);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="fontsicon/css/all.css.css">
    <title>Admin Panel</title>
</head>

<body>

    <?php
    include 'adminnavbar.php';
     ?>

    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?php echo $userCount; ?></h1>
                        <h3>Users</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-users fa-2xl"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo $orderCount; ?></h1>
                        <h3>Orders</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-truck-fast fa-2xl"></i> 
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo $itemCount; ?></h1>
                        <h3>Food Items</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-utensils fa-2xl"></i>
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="vieworder.php" class="btn" title="View all Orders" >View All</a>
                    </div>
                    <table>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Province</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postal code</th>
                        <th>Payment method</th>
                        <th>Total Item</th>
                        <th>Total Price</th>
                    </tr>

                    <?php
                        while ($result = mysqli_fetch_assoc($query)) {
                            echo "
                            <tr>
                                <td>" . $result['id'] . "</td>
                                <td>" . $result['name'] . "</td>
                                <td>" . $result['number'] . "</td>
                                <td>" . $result['email'] . "</td>
                                <td>" . $result['province'] . "</td>
                                <td>" . $result['address'] . "</td>
                                <td>" . $result['city'] . "</td>
                                <td>" . $result['postal_code'] . "</td>
                                <td>" . $result['method'] . "</td>
                                <td>" . $result['total_products'] . "</td>
                                <td>Rs.". $result['total_price'] . "/-</td>
                            </tr>  
                            ";
                        }
                    ?>

                </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>