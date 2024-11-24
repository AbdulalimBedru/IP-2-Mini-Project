<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$username = 'root';
$pass = '';
$db = 'onlinshopping';


    $conn = mysqli_connect($host, $username, $pass, $db);
    if($conn == false){
        die("conaction eror " . mysqli_connect_error());
    }else{
if (isset($_POST['signup'])){
    $password = $_POST['password'];
    $username = $_POST['username'];

        
$stet = mysqli_prepare($conn, "SELECT * FROM custemr where username  = ?");
mysqli_stmt_bind_param($stet,"s",$username);
mysqli_stmt_execute($stet);
   
$stet_result = mysqli_stmt_get_result($stet);

if($stet_result->num_rows > 0){
    $data = mysqli_fetch_assoc($stet_result);
    $uid = $data['user_id'];

    if($data['password'] === $password){ 
            $_SESSION['user_id'] = $uid;
        header("Location: /final/customer/home page/home.php");
        exit();
    }else{
        echo "<script>alert('Invalid Username  Password'); window.location.href='login.php';</script>";
    }
    }else{
        echo "<script>alert('Invalid Username'); window.location.href='login.php';</script>";
    }
}
}
    
   
?>