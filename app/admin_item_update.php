<?php
include 'database.php';

$id = $_GET['edit'];

if (isset($_POST['update_product'])) {
    $itemName = mysqli_real_escape_string($connection, $_POST['foodname']);
    $itemDescription = mysqli_real_escape_string($connection, $_POST['foodinfo']);
    $itemPrice = mysqli_real_escape_string($connection, $_POST['foodprice']);

    
    if (isset($_FILES['foodimage']) && $_FILES['foodimage']['error'] === UPLOAD_ERR_OK) {
        $imageFileName = $_FILES['foodimage']['name'];
        $imageTempName = $_FILES['foodimage']['tmp_name'];
        $imageDestination = "add_food_image/" . $imageFileName;

        
        if (move_uploaded_file($imageTempName, $imageDestination)) {
            $itemImage = mysqli_real_escape_string($connection, $imageDestination);
        } else {
            echo "Error uploading the image.";
            exit(); 
        }
    } else {
        
        $selectImageQuery = "SELECT image FROM items WHERE Id = $id";
        $result = mysqli_query($connection, $selectImageQuery);
        $row = mysqli_fetch_assoc($result);
        $itemImage = $row['image'];
    }

    
    $update = "UPDATE items SET name = '$itemName', price = '$itemPrice', image = '$itemImage', info = '$itemDescription' WHERE Id = $id";

    if (mysqli_query($connection, $update)) {
        echo '<script>alert("Food Item Updated successfully!"); window.location.href = "additem.php";</script>';
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Item Update</title>
    
    <link rel="stylesheet" type="text/css" href="css/additems.css">
    <link rel="stylesheet" href="fontsicon/css/all.css.css">
</head>
<body>

    <?php
    include 'adminnavbar.php';
     ?>

    <div class="additem-container">
        <div class="admin-product-from-container centered">

            <?php
            $select = mysqli_query($connection,"SELECT * FROM items WHERE Id = '$id'");
            while ($row = mysqli_fetch_assoc($select)) {
            ?>
            <form method="post" id="add_food" enctype="multipart/form-data">
                <h3>Update the Product</h3>
                <input type="text" placeholder="Enter food name"  value="<?php echo $row['name']; ?>" name="foodname" class="box" required>
                <input type="file" name="foodimage" class="box" onchange="previewImage(this);">
                <div id="imagePreviewContainer">
                    <img id="imagePreview" src="<?php echo $row['image']; ?>" alt="Image Preview">
                </div>
                <textarea name="foodinfo" placeholder="Enter food description" rows="3" cols="47" class="box" required><?php echo $row['info']; ?></textarea>
                <input type="text" placeholder="Enter food price" value="<?php echo $row['price']; ?>" name="foodprice" size="50" class="box" required>
            
                <input type="submit" class="add_items" name="update_product" value="Update Item" >
                <a href="additem.php" class="back-btn"><i class="fa-solid fa-rotate-left"></i></a>
            </form>
            <?php }; ?>
            
        </div> 
    </div>
</body>
</html>
