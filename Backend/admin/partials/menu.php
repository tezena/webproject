<?php include("../config/constants.php");

// if (!isset($_SESSION['user'])){

//     header("location:".SITEURL."admin/login.php");

// }

?>


<html>
    <head><title>Food Order website - Home Page</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>

    <body>
        <!-- Menu section starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-product.php">Product</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="../admin/logout.php">LogOut</a></li>
                </ul>
            </div>
        </div>
        <!-- menu section ends -->