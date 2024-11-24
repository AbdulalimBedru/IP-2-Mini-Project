<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
    <title>register page</title>
</head>
<?php
include('conect.php');
require_once('registration.php');
?>
<body>
    <h1>Sign up</h1>
    <div class="container">
         <form  id="form" method="post">
            <label for="email" >Email</label><br>
            <input type="email" name="email" id="email" ><br>
            <span class="error"></span><br>
            <label for="fname" >First Name</label><br>
            <input type="text" name="fname" id="fname" ><br>
            <span class="error"></span><br>
            <label for="lname" >Last Name</label><br>
            <input type="text" name="lname" id="lname"><br>
            <span class="error"></span><br>
            <label for="username" >User Name</label><br> 
            <input type="text" name="useername" id="uname" ><br>
            <span class="error"></span><br>
            <label for="address" >Address</address></label><br> 
            <input type="text" name="address" id="adr" required><br>
            <span class="error"></span><br>
            <label for="password" >Password</label><br>
            <input type="password" name="password" id="pass" ><span class="showp">Show</span><br>
            <span class="error "></span><br>
            <label for="cpassword" >Confirme password</label><br>
            <input type="password" name="cpassword" id="cpass"><span class="showcp">Show</span><br>
            <span class="error"></span><br><br>
            <input type="submit" value="Signup" name="signup" id="btn"><br>
            <p>Have an account : <a href="/final/customer/login/login.php">Login</a></p>
        </form>   
     </div>
    
     <script src="register.js"></script>
</body>
</html>