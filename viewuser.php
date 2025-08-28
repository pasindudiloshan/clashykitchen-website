<?php
include 'database.php';

$search_query = "";
if (isset($_GET['submit_search'])) {
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $search_query = " WHERE `username` LIKE '%$search%'";
}

$query = mysqli_query($connection, "SELECT * FROM users $search_query");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="fontsicon/css/all.css">
</head>
<body>
    <?php include 'adminnavbar.php'; ?>

    <div class="container">
        <div class="content">

        <form method="get" action="viewuser.php" class="search-form navbar-search-bar" style="display: flex; align-items: center; margin: 10px; margin-left: 31%;">
            <input name="search" class="navbar-search-input" type="search" placeholder="Search Users" aria-label="Search" style="padding: 10px 130px; border: 1px solid #ccc; border-radius: 12px; margin-right: 5px;">
            <button name="submit_search" class="navbar-search-button" type="submit" style="background-color: #cd5316; color: white; border: none; border-radius: 50px; padding: 10px 10px; cursor: pointer;">
            <i class="fa fa-search"></i>
            </button>
        </form>

            <div class="content-2">
                <div class="new-user">
                    <div class="title">
                        <h2>New Users</h2>
                    </div>
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>Operation</th>
                        </tr>

                        <?php
                        if (mysqli_num_rows($query) > 0) {
                            while ($result = mysqli_fetch_assoc($query)) {
                                echo "
                                <tr>
                                    <td>" . $result['id'] . "</td>
                                    <td>" . $result['username'] . "</td>
                                    <td>" . $result['number'] . "</td>
                                    <td>" . $result['email'] . "</td>
                                    <td>
                                        <a href='updateuser.php?id=" . $result['id'] . "' class='btn-edit'> <i class='fas fa-edit'></i></a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' style='text-align: center; font-size: 2.5rem; color: red; font-weight: bold;'>No users found.</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
