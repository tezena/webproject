<?php
include("partials/menu.php");
?>


<!-- main content section starts -->
<div class="main-content">
   <div class="wrapper">
      <h1>Update Admin</h1>
      <br><br>


      <?php  
      $id = $_GET['id'];

      $sql = "SELECT * FROM table_admin WHERE id=$id";

      $res = mysqli_query($con, $sql);

      if($res == true){

         $count = mysqli_num_rows($res);

         if($count == 1){

            $row = mysqli_fetch_assoc($res);

            $full_name = $row['full_name'];
            $user_name = $row['user_name'];

         }else{

             header("location:".SITEURL.'admin/manage-admin.php');

         }

      }


      ?>

      <form action="#" method="POST">
         <table class="tbl-30">
            <tr>
               <td> Full Name: </td>
               <td><input type="text" name="full_name" placeholder="Enter Your Name" value="<?php echo $full_name; ?>"></td>
            </tr>
            <tr>
               <td> Username: </td>
               <td><input type="text" name="username" placeholder="Enter Your Username" value="<?php echo $user_name;?>"></td>
            </tr>

            <tr>
               <td> Password: </td>
               <td><input type="text" name="password" placeholder="Enter Your Password" value=""></td>
            </tr>

            <tr>
               <td colspan="2">
                  <input type="submit" name="submit" value="Update Admin" class="btn-second">
               </td>
            </tr>
         </table>
      </form>
   </div>
</div>

<?php

if(isset($_POST['submit'])){

      $full_name = $_POST['full_name'];
      $user_name = $_POST['username'];
      $password = $_POST['password'];

      $sql = "UPDATE table_admin SET 
      full_name='$full_name',
      user_name='$user_name',
      password='$password'
      WHERE id = '$id'";

      $res = mysqli_query($con, $sql);

      if($res == true){

         $_SESSION['update'] = '<div class="success">Admin Updated Succesfully</div>';
         header("location:".SITEURL.'admin/manage-admin.php');

      }else{

         $_SESSION['update'] = '<div class="success">Failed to Update Admin</div>';
         header("location:".SITEURL.'admin/manage-admin.php');

      }
}


?>

<?php include("partials/footer.php"); ?>