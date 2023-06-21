<?php


session_start();

// defining constants
define('SITEURL', 'http://localhost/fullstack/Backend/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'project');


// now we will excute our query, first connect to the database then select the database
$con = mysqli_connect(LOCALHOST,DB_USERNAME, DB_PASSWORD);//connecting to a database
$select_db = mysqli_select_db($con, DB_NAME);//connecting to a specific database

?>