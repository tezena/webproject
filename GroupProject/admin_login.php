
<?php
include'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
$user_id =$_SESSION['user_id'];

}
else{
$user_id='';
}

if(isset($_POST['submit'])){
$email=$_POST['email'];
$email =filter_var($email,FILTER_SANITIZE_EMAIL);
$pass=sha1($_POST['pass']);


            $email = stripcslashes($email);
            $pass= stripcslashes($pass);
            $email = mysqli_real_escape_string($con, $email);
            $pass = mysqli_real_escape_string($con, $pass);

$sql = "SELECT * FROM from users where email = '$email' and pass='$pass'";
$result = mysqli_query($conn,$sql);
$rows =   mysqli_fetch_array($result,MYSQLI_ASSOC);
$count =  mysqli_num_rows($result);
if($count==1){
$_SESSION['user_id']=$result['id'];
header('location:home.php');

}
else{

    echo"<h2>Incorrect username or password!</h2>";
}



}




?>



<?php

include 'footer.php';
?>









