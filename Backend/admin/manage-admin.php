<?php
include("partials/menu.php");
?>


<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>

        <?php
        if (isset($_SESSION['add'])) {

            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])) {

            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {

            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?><br><br><br>

        <!-- Button to add an admin -->

        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br><br>

        <table class="full-table">

            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>

            <?php

            // let us fetch the data from the database 

            // query to get all the admin from the database

            $sql = 'SELECT * FROM table_admin';


            // excute the query

            $res = mysqli_query($con, $sql);


            // check wether the query is excuted or not

            if ($res == true) {

                // count the rows to check wether we have the data in table or not
                $rows = mysqli_num_rows($res);

                if ($rows > 0) {
                    //we have data in database

                    // create an id var to incrementally update the database id
                    $sn = 1;
                    while ($rows = mysqli_fetch_assoc($res)) {
                        // while looping for all data found in database we fatch all colum values
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $user_name = $rows['user_name'];

                        // dispaly the value in our table
            ?>
                        <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $full_name ?></td>
                            <td><?php echo $user_name ?></td>
                            <td>
                                <a href="<?php echo SITEURL ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-second">Update Admin</a>
                                <a href="<?php echo SITEURL ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>


            <?php
                    }
                } else {

                    //we have no data in database
                }
            } else {
                echo "connection and query done successfully";
            }
            ?>
        </table>

    </div>
</div>
<!-- main content section ends -->

<?php include("partials/footer.php"); ?>