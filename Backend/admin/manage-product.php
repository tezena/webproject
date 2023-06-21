<?php
include("partials/menu.php");
?>

<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Product</h1>

        <br><br>

        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['no-catagory-found'])) {
            echo $_SESSION['no-catagory-found'];
            unset($_SESSION['no-catagory-found']);
        }

        if (isset($_SESSION['product'])) {
            echo $_SESSION['product'];
            unset($_SESSION['product']);
        }

        ?>

        <br>

        <a href="<?php echo SITEURL . 'admin/add-product.php' ?>" class="btn-primary">Add Product</a>
        <br><br><br>

        <table class="full-table">

            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Type</th>
                <th>Description</th>
                <th>Action</th>
            </tr>

            <?php

            $sql = "SELECT * FROM product_detail";


            $res = mysqli_query($con, $sql);


            $count = mysqli_num_rows($res);

            $sn = 1;

            if ($count > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $product_name = $row['product_name'];
                    $product_image = $row['product_image'];
                    $price = $row['price'];
                    $type = $row['type'];
                    $description = $row['description'];
            ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $product_name ?></td>
                        <td><?php
                            if ($product_image != "") {
                            ?>

                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $product_image; ?>" width="90px" alt="">

                            <?php
                            } else {
                                echo '<div class="error">"No Image";</div>';
                            } ?>

                        </td>
                        <td><?php echo $price ?></td>
                        <td><?php echo $type ?></td>
                        <td class="description"><?php echo $description ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-second">Update Product</a><br><br>
                            <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>&product_image=<?php echo $product_image; ?>" class="btn-danger">Delete Product</a>
                        </td>
                    </tr>

                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">
                        <div class="error">No Product Added</div>
                    </td>
                </tr>
            <?php


            }



            ?>

        </table>

    </div>
</div>
<!-- main content section ends -->

<?php include("partials/footer.php"); ?>