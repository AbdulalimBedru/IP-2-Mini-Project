<?php
  include('home page/conect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="bgimg.jpg">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <title>ethioShopping.com</title>
</head>
<body>
    <div class="nav"> <span><a href="login/login.php">Login</a></span> <span><a href="register page/register.php">Register</a></span></div>
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
                <a href="login/login.php" class="btn">Buy</a>
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
                <li><a href="home page/home.php">Home</a></li>
                <li><a href="home page/about.html">About</a></li>
                <li><a href="home page/myAccount.php">My Account</a></li>
                <li><a href="home page/history.php">History</a></li>
                <li><a href="home page/feedback.php">Feedback</a></li>
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