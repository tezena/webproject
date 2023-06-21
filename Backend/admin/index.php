<?php
include("partials/menu.php")
?>

        <!-- main content section starts -->
        <div class="main-content">
           <div class="wrapper">

               <h1>Dashboard</h1><br><br>

               <?php
                 if (isset($_SESSION['login'])) {

                     echo $_SESSION['login'];
                     unset($_SESSION['login']);

            }?><br><br>

               <div class="col-4 text-center">
                <h1>
                    <?php

                    $sql = "SELECT * FROM product_detail";

                    $res = mysqli_query($con, $sql);

                    $count = mysqli_num_rows($res);

                    echo $count;

                    ?>
                </h1><br>
                Available Products
               </div>

               <div class="col-4 text-center">
                <h1>

                <?php 

                $sql = "SELECT * FROM table_admin";

                $res = mysqli_query($con, $sql);

                $count = mysqli_num_rows($res);


                echo $count;
                
                ?>
                </h1><br>
                Admins
               </div>

               <div class="col-4 text-center">
                <h1>

                <?php 

                $sql = "SELECT * FROM users";

                $res = mysqli_query($con, $sql);

                $count = mysqli_num_rows($res);


                echo $count;
                
                ?>
                </h1><br>
                Registered Users
               </div>

               <div class="col-4 text-center">
                <h1>5</h1><br>
                Catagory
               </div>
               <div class="clearfix"></div>
           </div>
        </div>
        <!-- main content section ends -->

<?php  include("partials/footer.php")?>
