<?php
include("partials/menu.php");
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Product</h1>
        <br><br>

        <?php if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        } ?>

        <?php
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $sql = "SELECT * FROM product_detail WHERE id=$id";


            $res = mysqli_query($con, $sql);

            $count = mysqli_num_rows($res);

            if ($count == 1) {

                $row = mysqli_fetch_assoc($res);

                $id = $row['id'];
                $product_name = $row['product_name'];
                $product_image = $row['product_image'];
                $price = $row['price'];
                $type = $row['type'];
                $description = $row['description'];
            } else {
                $_SESSION['no-catagory-found'] = '<div class="error">No Product Found</div>';
                header("location:" . SITEURL . 'admin/manage-product.php');
            }
        } else {

            header("location:" . SITEURL . 'admin/manage-product.php');
        } ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Product Name:</td>
                    <td><input type="text" name="product_name" value="<?php echo $product_name; ?>"></td>
                </tr>

                <tr>
                    <td>Product Price:</td>
                    <td><input type="text" name="price" value="<?php echo $price; ?>"></td>
                </tr>

                <tr>
                    <td>Type:</td>
                    <td>
                        <input <?php if ($type == "Mobile") {
                                    echo "checked";
                                }  ?> type="radio" name="type" value="Mobile">Mobile
                        <input <?php if ($type == "Home") {
                                    echo "checked";
                                }  ?> type="radio" name="type" value="Home">Home
                        <input <?php if ($type == "Laptop") {
                                    echo "checked";
                                }  ?> type="radio" name="type" value="Laptop">Laptop
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php
                        if ($product_image != "") {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/product/<?php echo $product_image; ?>" width="90px" alt="">

                        <?php
                        } else {
                            echo '<div class="error">"Image Not Added";</div>';
                        } ?>

                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td><input type="file" name="image"></td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" id="" cols="40" rows="10" value="textdata"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="product_image" value="<?php echo $product_image  ?>">
                        <input type="submit" name="submit" value="Update Product" class="btn-second">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {

    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $description = mysqli_real_escape_string($con, $_POST['description']);



    if (isset($_FILES['image']['name'])) {

        $image_name = $_FILES['image']['name'];


        if ($image_name != "") {


            $ext = end(explode('.', $image_name));

            $image_name = "Electronics Catagory_" . rand(000, 999) . '.' . $ext;


            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/product/" . $image_name;


            $upload = move_uploaded_file($source_path, $destination_path);

            if ($upload == false) {
                $_SESSION['upload'] = '<div class="error">Failed to Upload, Please Upload the Image</div>';

                header("location:" . SITEURL . 'admin/add-product.php');

                die();
            }

            if ($product_image != "") {


                $remove_path = "../images/product/" . $product_image;
                $remove  = unlink($remove_path);

                if ($remove == false) {
                    $_SESSION['product'] = '<div class="success">Failed to remove Product</div>';
                    header("location:" . SITEURL . 'admin/manage-product.php');
                }
            }
        } else {
            $image_name = $product_image;
        }
    }


    $sql2 = "UPDATE product_detail SET 
      product_name='$product_name',
      product_image='$image_name',
      price='$price',
      type='$type',
      description='$description'
      WHERE id = '$id'";

    $res2 = mysqli_query($con, $sql2);

    if ($res2 == true) {

        $_SESSION['product'] = '<div class="success">product Updated Succesfully</div>';
        header("location:" . SITEURL . 'admin/manage-product.php');
    } else {

        $_SESSION['product'] = '<div class="success">Failed to Update Product</div>';
        header("location:" . SITEURL . 'admin/manage-product.php');
    }
} ?>


<?php include("partials/footer.php"); ?>