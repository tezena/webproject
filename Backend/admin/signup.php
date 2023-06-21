<!DOCTYPE html>
<html>
<?php  include('../config/constants.php') ?>
<head>
    <title>Signup Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: gray;
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

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
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

        .signin-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <form action="" method="POST">
        <h1>Signup</h1>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <input type="submit" value="Signup" name="submit"><br><br><br>

        <div class="signin-link">
            Already have an account? <a href="<?php echo SITEURL."admin/signin.php"; ?>">Sign in</a>
        </div>
    </form>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    // Retrieve user input
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];


    $sql = "INSERT INTO users SET
                first_name = '$firstName',
                last_name='$lastName',
                phone_number = '$phoneNumber',
                email = '$email',
                password = '$password',
                address_city='$address'";

    $res = mysqli_query($con, $sql);

    if($res == true){

        header("location:".SITEURL."admin/signin.php");

    }else{
        echo "error while login";

    }


}
?>