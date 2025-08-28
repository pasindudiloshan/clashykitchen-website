<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Code for adding new item goes here
    $itemName = mysqli_real_escape_string($connection, $_POST['foodname']);
    $itemDescription = mysqli_real_escape_string($connection, $_POST['foodinfo']);
    $itemPrice = mysqli_real_escape_string($connection, $_POST['foodprice']);
        
    if (isset($_FILES['foodimage'])) {
        $imageFileName = $_FILES['foodimage']['name'];
        $imageTempName = $_FILES['foodimage']['tmp_name'];
        $imageDestination = "add_food_image/" . $imageFileName;

        if (move_uploaded_file($imageTempName, $imageDestination)) {
            $itemImage = mysqli_real_escape_string($connection, $imageDestination);

            $insertitemQuery = "INSERT INTO popitems (name, image, info, price)
             VALUES ('$itemName', '$itemImage', '$itemDescription', '$itemPrice')";
        
            if (mysqli_query($connection, $insertitemQuery)) {
                echo '<script>alert("Food Item record inserted successfully!");</script>';
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "Error uploading the image.";
        }
    }
}

// Handle item deletion
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    echo '<script>
        if(confirm("Are you sure you want to delete this item?")) {
            window.location.href = "addpopitem.php?confirm_delete='.$id.'";
        }
    </script>';
}

if(isset($_GET['confirm_delete'])) {
    $id = $_GET['confirm_delete'];
    mysqli_query($connection, "DELETE FROM popitems WHERE Id = $id");
    echo '<script>alert("Food Item deleted successfully!");</script>';
    header('location:addpopitem.php');
}

// Handle search
if (isset($_GET['submit_search'])) {
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $select = mysqli_query($connection, "SELECT * FROM popitems WHERE name LIKE '%$search%'");
} else {
    $select = mysqli_query($connection, "SELECT * FROM popitems");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Item</title>
    <link rel="stylesheet" type="text/css" href="css/additems.css">
    <link rel="stylesheet" href="fontsicon/css/all.css.css">
</head>
<body>
    <?php include 'adminnavbar.php'; ?>
    <div class="additem-container">
        <div class="admin-product-from-container">
            <!-- Form for adding new item -->
            <form method="post" id="add_food" enctype="multipart/form-data">
                <h3>Add Popular Product</h3>
                <input type="text" placeholder="Enter food name" name="foodname" class="box" required>
                <input type="file"  name="foodimage" class="box">
                <textarea name="foodinfo" placeholder="Enter food description" rows="3" cols="47" class="box" required></textarea>
                <input type="text" placeholder="enter food price" name="foodprice" size="50" class="box" required>
                <input type="submit" class="add_items" name="add_product" value="Add Item">
            </form>
        </div> 
        <div class="product-display">
            <!-- Search form -->
            <form method="get" action="addpopitem.php" class="search-form navbar-search-bar" style="display: flex; align-items: center; margin: 10px; margin-left: 31%;">
                <input name="search" class="navbar-search-input" type="search" placeholder="Search Food Items" aria-label="Search" style="padding: 10px 130px; border: 1px solid #ccc; border-radius: 12px; margin-right: 5px;">
                <button name="submit_search" class="navbar-search-button" type="submit" style="background-color: #cd5316; color: white; border: none; border-radius: 50px; padding: 10px 10px; cursor: pointer;">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <?php
            // Display search results or all items
            if(mysqli_num_rows($select) == 0) {
                echo '<p style="text-align: center; font-size: 4rem; color: red; font-weight: bold;">No items found.</p>';
            } else {
            ?>
            <!-- Display items table -->
            <table class="product-display-table">
                <!-- Table headers -->
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_assoc($select)) {
                    // Display each item row
                ?>
                    <tr>
                        <td><img src="<?php echo $row['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['info']; ?></td>
                        <td>Rs.<?php echo $row['price']; ?></td>
                        <td>
                            <a href="admin_popitem_update.php?edit=<?php echo $row['id']; ?>" class="add_items" > <i class="fas fa-edit"></i></a>
                            <a href="addpopitem.php?delete=<?php echo $row['id']; ?>" class="add_items" > <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php }; ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
    </div>
</body>
</html>
