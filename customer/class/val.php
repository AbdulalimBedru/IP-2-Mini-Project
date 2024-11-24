<?php
/*
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$addrese = $_GET['addrese'];
$email = $_GET['email'];
$text = $_GET['text'];

$num = "aaa";
$num1 = "ssss";
echo $num . " " .$num1 . "<br>";
$num.=$num1 ;
echo $num . "<br>";
 echo "welcome " . $_POST['fname'] . "<br>";
 echo $_POST['lname'] . "<br>";
 echo  $_POST['addrese'] . "<br>";
 echo  $_POST['email'] . "<br>";
 echo $_POST['text'] . "<br>";

*/


if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["addrese"]) || empty( $_POST["email"])){
   echo "<p>pls File The form </p>";
}
else{
    if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
       echo "plse enter valid email";
    }
 echo "welcome " . $_POST['fname'] . "<br>";
 echo $_POST['lname'] . "<br>";
 echo  $_POST['addrese'] . "<br>";
 echo  $_POST['email'] . "<br>";
 echo $_POST['text'] . "<br>";
}
?>