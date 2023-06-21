<?php
include("partials/menu.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>

        <?php  // displaying failed to add admin
        if (isset($_SESSION['add'])) {

            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        ?>

        <form action="#" method="POST">

            <table class="tbl-30">
                <tr>
                    <td> Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td> Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                </tr>
                <tr>
                    <td> Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-second">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php

// Let us recive input form user form
if (isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $user_name = $_POST['username'];
    $password = md5($_POST['password']); //encrypting password

    // let us save it into database

    $sql = "INSERT INTO table_admin SET 
    full_name='$full_name',
    user_name='$user_name',
    password='$password'";


    // excuting query and saving into database
    $res = mysqli_query($con, $sql);


    // check the data is inserted properlly

    if ($res == true) { // setting a session to check wether the admin is added or not

        $_SESSION['add'] = 'Admin Added Successfully';

        header("location:" . SITEURL . '/admin/manage-admin.php');
    } else {

        $_SESSION['add'] = 'Faild to Add Admin';

        header("location:" . SITEURL . '/admin/add-admin.php');
    }
}



?>
<?php include("partials/footer.php"); ?>