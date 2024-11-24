<?php
include('conect.php');
  
  include __DIR__.'/../login/login1.php';
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if session variables are not set
    header("Location: /../final/customer/login/login.php");
    exit();
}
        $uid = $_SESSION['user_id'];
        $query = mysqli_query($conn,"SELECT * from custemr where user_id='$uid'");
        if (mysqli_num_rows($query)) {
            while ($rows = mysqli_fetch_assoc($query)) {
                $fname = $rows['fname'];
                $lname = $rows['lname'];
                $email = $rows['email'] ;
                $address = $rows['address'];
                $uname = $rows['username'];
            }}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    
</head>
<body>
    <div class="continer">
        <p>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;  <?php echo $fname . ' ' . $lname; ?></p>
        <p>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;  &emsp; <?php echo $email ; ?></p>
        <p>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;   <?php echo $address ; ?></p>
        <p>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp;   <?php echo $uname ; ?></p>
        <a href="updateu.php?update=<?= $uid ?>">
                    Edit Information
                </a>
        <a href="change_pass.php?change_pass=<?= $uid ?>">
            Change password
        </a>
    </div>
</body>
</html>