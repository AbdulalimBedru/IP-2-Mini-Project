<?php
include('login1.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title>Login page</title>
</head>
<body>
    <h1>Sign in</h1>
    <div class="container">
       
        <form  method="post">
            <label for="username">User Name</label><br>
            <input type="text" name="username" id="username" placeholder="user name"><br>
            <span class="msg "></span><br>
            <label for="password">Password</label><br>
            <input type="password"  name="password" id="password" placeholder="******"><span class="show">Show</span><br>
            <span class="msg "></span><br>
            <input type="submit" value="Login"  name="signup" id="btn"><br>
            <p> create new account :  <a href="/final/customer/register page/register.php">Signup</a></p>
        </form>
    </div>
    <?php
include('login1.php');
?>
    <script src="login.js"></script>
</body>
</html>