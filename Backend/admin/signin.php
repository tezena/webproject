<!DOCTYPE html>
<html>
<?php  include('../config/constants.php') ?>
<head>
  <title>Signin Page</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
      font-size: 24px;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    form {
      width: 400px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
    }

    label {
      display: inline-block;
      width: 100px;
      margin-bottom: 10px;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .signup-link {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <form action="" method="post">
  <h1>Signin</h1>

  <?php

if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}

  ?>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Signin" name="submit"><br><br><br>
    <div class="signup-link">
    Don't have an account? <a href ="signup.php">Signup</a>
  </div>
  </form>
  
</body>
</html>

<?php

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $res = mysqli_query($con, $sql);

    $count = mysqli_num_rows($res);

    if($count == true){

        $_SESSION['login'] = "<div class='success'><h3>Welcome user</></div>";
        header("location:".SITEURL."admin");
    }
    else
    {
        $_SESSION['login'] = "<div class='error'>Failed to Login</div>";
        header("location:".SITEURL."admin/signin.php");
    }

}

?>
