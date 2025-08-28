<?php
include 'database.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    // Update the status of the order in the database
    $update_query = mysqli_query($connection, "UPDATE `order` SET `status`='$status' WHERE `id`='$id'");
}

if (isset($_GET['submit_search'])) {
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $query = mysqli_query($connection, "SELECT * FROM `order` WHERE `name` LIKE '%$search%'");
} else {
    $query = mysqli_query($connection, "SELECT * FROM `order`");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="fontsicon/css/all.css">
</head>
<body>

<?php include 'adminnavbar.php'; ?>

<div class="container">
    <div class="content">
    <form method="get" action="vieworder.php" class="search-form navbar-search-bar" style="display: flex; align-items: center; margin: 10px; margin-left: 31%;">
                <input name="search" class="navbar-search-input" type="search" placeholder="Search Food Items" aria-label="Search" style="padding: 10px 130px; border: 1px solid #ccc; border-radius: 12px; margin-right: 5px;">
                <button name="submit_search" class="navbar-search-button" type="submit" style="background-color: #cd5316; color: white; border: none; border-radius: 50px; padding: 10px 10px; cursor: pointer;">
                <i class="fa fa-search"></i>
                </button>
            </form>
        <div class="content-2">
            <!-- Search form -->

            <?php
            // Check if there are orders
            if (mysqli_num_rows($query) > 0) {
            ?>
            <div class="recent-payments">
                <div class="title">
                    <h2>Recent Orders</h2>
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
                        <th>Total Price</th>
                        <th>Total Item</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $i = 1;
                    while ($result = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $result['name']; ?></td>
                        <td><?php echo $result['number']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['province']; ?></td>
                        <td><?php echo $result['address']; ?></td>
                        <td><?php echo $result['city']; ?></td>
                        <td><?php echo $result['postal_code']; ?></td>
                        <td><?php echo $result['method']; ?></td>
                        <td>Rs.<?php echo $result['total_price']; ?>/-</td>
                        <td><?php echo $result['total_products']; ?></td>
                        <td>
                            <?php 
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
                            ?>
                        </td>
                        <td>
                        <select onchange="status_update(this.value, <?php echo $result['id']; ?>)">
                                <option value="1"></option>
                                <option value="2">Accepted</option>
                                <option value="3">Dispatched</option>
                                <option value="4">Rejected</option>
                                <option value="5">Pending</option>
                            </select>
                        </td>
                    </tr>
                    <?php   
                    }
                    ?>
                </table>
            </div>
            <?php
            } else {
                echo "<p style='text-align: center; font-size: 2.5rem; color: red; font-weight: bold;'>No recent orders.</p>";
            }
            ?>
        </div>
    </div>
</div>

<script>
function status_update(value, id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'vieworder.php?id=' + id + '&status=' + value, true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            // Reload the page to reflect the updated status
            window.location.reload();
        } else {
            // Handle error
            console.error('Error updating order status: ' + xhr.statusText);
        }
    };
    xhr.send();
}
</script>

</body>
</html>
