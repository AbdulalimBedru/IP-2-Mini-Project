<?php


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!isset($_SESSION['admin_id'])){

  
  header("Location: /../final/admin page/login/admin_login.php");
    exit();
}

$timeout_duration = 1200; 
// Check if the last activity session variable is set
if (isset($_SESSION['last_activity'])) {
    // Calculate the session's lifetime
    $duration = time() - $_SESSION['last_activity'];

    // If the duration is greater than the timeout duration, destroy the session
    if ($duration > $timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: /../final/admin page/login/admin_login.php"); // Redirect to the login page or any other page
        exit();
    }
}
// Update last activity time
$_SESSION['last_activity'] = time();

// Your other code...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"> -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
    <div class="container"  >
        <a class="reg-item" href="register item.php">
         <i class="fa-solid fa-cart-plus fa-2x"></i>
           <span>Regiter Item</span>
        </a>
        <a class="bord" href="dashbord.php">
         <i class="fa-sharp fa-solid fa-list fa-2x"></i>
           <span>Dashboard</span> 
        </a>
         <a class="feedback" href="feedback.php">
            <i class="fa-solid fa-comment fa-2x"></i>
          <span>Feedbacks</span> 
         </a>
         <a class="item-info" href="item info.php">
            <i class="fa-solid fa-circle-info fa-2x"></i>
            <span>Item Information</span>
         </a>
         <a class="users"  href="userlist.php">
            <i class="fa-solid fa-users fa-2x"></i>
            <span>Show Users</span>
         </a>
         <a class="report" href="report.php">
            <i class="fa-solid fa-folder-open fa-2x"></i>
           <span>Report</span> 
         </a>
         <a class="logout" href="log out.php">
         <i class="fas fa-sign-out-alt fa-2x"></i>
           <span>Log out</span> 
         </a>
    </div>
</body>
</html>