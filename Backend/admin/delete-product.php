<?php 

include("../config/constants.php");

if(isset($_GET['id']) AND isset($_GET['product_image'])){

    $id = $_GET['id'];
    $image_name = $_GET['product_image'];

    if ($image_name != "" || $id != ''){

        //delete the image

        $path = "../images/product/".$image_name;

        $remove = unlink($path);

        if($remove == false AND $id == ''){
            $_SESSION['remove'] = '<div class="error">Failed to Remove Product</div>';

            header("location:".SITEURL.'admin/manage-product.php');

            die();
        }

        $sql = "DELETE FROM product_detail WHERE id=$id";


        $res = mysqli_query($con, $sql);

        if($res == true){

            $_SESSION['delete'] = '<div class="success">Product deleted Successfully</div>';
            header('location:'.SITEURL.'admin/manage-product.php');

        }else{

            $_SESSION['delete'] = '<div class="error"> Failed to Delete Product</div>';
            header('location:'.SITEURL.'admin/manage-product.php');

        }
    }else
    {
        header("location:".SITEURL.'admin/manage-product.php');
    
    }
}else
{
    header("location:".SITEURL.'admin/manage-product.php');
}
