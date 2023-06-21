<?php include('../config/constants.php');?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/logincss/login.css">
</head>


<body>
    <div class="form-container">

        <form action="" method="POST" autocomplete="off">
            <h2>Login As Admin</h2>

            <!-- <p> default username = <span>admin</span> and password = <span>333</span></p> -->

            <div class="box">
                <input type="text" name="username" maxlength="20" required placeholder="Enter username" oninput="this.value = this.value.replace(/\s/g, '')">
                <!-- <span>Username</span> -->
                <i></i>
            </div>

            <div class="box">
                <input type="password" name="pass" maxlength="20" required placeholder="Enter password" oninput="this.value = this.value.replace(/\s/g, '')">
                <!-- <span>Password</span> -->
                <i></i>
            </div>
            <?php  

              if (isset($_SESSION['login'])) {

                   echo $_SESSION['login'];
                   unset($_SESSION['login']);
                }
            
            
            ?>
            <br><br>

            <input type="submit" value="Login" name="submit" class="btn">

        </form>

    </div>
    <script src="script.js"></script>
</body>

</html>

<?php


if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = md5($_POST['pass']);


    $sql = "SELECT * FROM table_admin WHERE user_name = '$username' AND password = '$password'";

    $res = mysqli_query($con, $sql);

    $count = mysqli_num_rows($res);

    if($count == true){

        $_SESSION['login'] = "<div class='success'><h3>Welcome ". $username ."</></div>";
        $_SESSION['user'] = $username;
        header("location:".SITEURL."admin");
    }
    else
    {
        $_SESSION['login'] = "<div class='error'>Failed to Login</div>";
        header("location:".SITEURL."admin/login.php");
    }

}

?>