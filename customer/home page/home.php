<?php
  include('conect.php');
  //include('C:\xampp\htdocs\php project\login\login1.php');
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
        }}

$timeout_duration = 1200; 
// Check if the last activity session variable is set
if (isset($_SESSION['last_activity'])) {
    // Calculate the session's lifetime
    $duration = time() - $_SESSION['last_activity'];

    // If the duration is greater than the timeout duration, destroy the session
    if ($duration > $timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: /../final/customer/login/login.php"); // Redirect to the login page or any other page
        exit();
    }
}
// Update last activity time
$_SESSION['last_activity'] = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="bgimg.jpg">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <title>ethioShopping.com</title>
</head>
<body>
    <i class="fa-solid fa-bars fa-2x " style="margin: 30px; cursor: pointer;" id="menu"></i>
    <div class="navbar">
        
            <img src="user.jpg" alt="user" class="img">
           <p class="name"> <?php echo $fname . ' ' . $lname; ?></p>
            
        <span></span>
        <ul class="nav-links" style="padding: 20px; ">
            <li style="padding: 10px;"><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
            <li style="padding: 10px;"><a href="about.html"><i class="fas fa-info-circle"></i> About</a></li>
            <li style="padding: 10px;"><a href="myAccount.php"><i class="fa-solid fa-user"></i> My Account</a></li>
            <li style="padding: 10px;"><a href="history.php"><i class="fas fa-history"> </i>History</a></li>
            <li style="padding: 10px;"><a href="feedback.php"><i class="fa-solid fa-comment"></i>Feedback</a></li>
            <li style="padding: 10px;"><a href="log out.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
     <div class="container"  >
        <h1>Welcome to My Website</h1>
     </div>
             <h1 id="heading" class="heading">Products</h1>
            
        <div class="items" style="margin-left: 400px; margin-right: 400px; " >
            <?php
              $result = mysqli_query($conn, "SELECT *from items where quantity > 0");
              while($row = mysqli_fetch_assoc($result)){
           ?>
           
            <div class="info-card" >
                <img src="<?php echo $row['image'] ?>" >
                <h4 class="itme-nmae"><?php echo $row['name'] ?></h4>
                <p class="price"><?php echo $row['price'] ?> birr</p>
                <p class="disc"><?php echo $row['description'] ?></p>
                <a href="orders.php?item=<?= $row['item_id']?>&user=<?=$uid?>" class="btn" ">Buy</a>
                </div>
                <?php } ?>         
        </div>
        <footer class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h2>About Us</h2>
            <p>We are committed to providing the best products and services to our customers.</p>
        </div>
        <div class="footer-section links">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="myAccount.php">My Account</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                
            </ul>
        </div>
        <div class="footer-section contact">
            <h2>Contact Us</h2>
            <p>Email: abduselam@gmail.com</p>
            <p>Phone: +251 996797926</p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Ethio Shopping
    </div>
</footer> 
        <script src="home.js"></script>
</body>
</html>