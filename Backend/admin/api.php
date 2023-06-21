<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');

session_start();

// defining constants
define('SITEURL', 'http://localhost/fullstack/Backend/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'alfaproject');


// now we will excute our query, first connect to the database then select the database
$con = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //connecting to a database
$select_db = mysqli_select_db($con, DB_NAME); //connecting to a specific database

?>

<?php

$sql = "SELECT * FROM product_detail";

$res = mysqli_query($con, $sql);
$jsonarray = array();

while ($row = mysqli_fetch_assoc($res)) {
    array_push($jsonarray, $row);
}

$data = json_encode(array("data" => $jsonarray));

echo $data;


?>