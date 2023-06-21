<?php
include("partials/menu.php");
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>

        <br><br>
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Product Name</td>
                    <td><input type="text" name="name" placeholder="Product Name"></td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><input type="text" name="price"></td>
                </tr>

                <tr>
                    <td>Type:</td>
                    <td>
                        <input type="radio" name="type" value="Mobile">Mobile
                        <input type="radio" name="type" value="Home">Home Aliases
                        <input type="radio" name="type" value="Laptop">Laptop
                    </td>
                </tr>   

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="textarea" id="" cols="40" rows="10"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Product" class="btn-second">
                    </td>
                </tr>

            </table>
        </form>

        <?php

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['textarea'];


            if (isset($_POST['type'])) {
                $type = $_POST['type'];
            } else {

                $type = '';
            }


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
                } else {
                    $image_name = "";
                }

                $sql = "INSERT INTO product_detail SET
                                        product_name = '$name',
                                        product_image='$image_name',
                                        type = '$type',
                                        price = '$price',
                                        description = '$description'";

                $res = mysqli_query($con, $sql);

                if ($res == true) {

                    $_SESSION['add'] = "<div class='success'> Catagory Added Sucessefully. </div>";

                    header('location:' . SITEURL . 'admin/manage-product.php');
                } else {

                    $_SESSION['add'] = "<div class='success'> Failed to Add Product. </div>";

                    header("location:" . SITEURL . 'admin/add-product.php');
                }
            }
        }
        ?>

    </div>
</div>

<?php include("partials/footer.php"); ?>