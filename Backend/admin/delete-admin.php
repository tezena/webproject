<?php 

include("../config/constants.php");

// steps to delet an admin


//1 first get the id of deleted admin by using get method

$id = $_GET['id'];

//2 creat sql query to delete the id 

$sql = "DELETE FROM table_admin WHERE id=$id";

//3 excute the query


$res = mysqli_query($con, $sql);

if($res == true){
    //create a session and redirect to admin page

    $_SESSION['delete'] = 'Admin deleted successfully';
    header('location:'.SITEURL.'admin/manage-admin.php');

}else{
    $_SESSION['delete'] = 'Faild to Delete Admin';
    header('location:'.SITEURL.'admin/manage-admin.php');

}
