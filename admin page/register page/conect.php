<?php
$host = "localhost";
$username = 'root';
$pass = '';
$db = 'onlinshopping';


    $conn = mysqli_connect($host, $username, $pass);
    if($conn == false){
        die("conaction eror " . mysqli_connect_error());
    }

$db_check_query = mysqli_query($conn, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db'");

if (mysqli_num_rows($db_check_query) == 0) {
    // Database does not exist, create it
    $create_db_query = mysqli_query($conn, "CREATE DATABASE $db");
    if ($create_db_query) {
        echo "Database created successfully.";
    } else {
        die("Error creating database: " . mysqli_error($conn));
    }
}

mysqli_select_db($conn, $db) or die("Could not select database: " . mysqli_error($conn));

$create_table = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS admin(
    user_id int PRIMARY KEY AUTO_INCREMENT,  
    fname varchar(15),
    lname varchar(15),
    username varchar(20) UNIQUE,
    password varchar(14),
    email varchar(35) UNIQUE
    )");
 ?>