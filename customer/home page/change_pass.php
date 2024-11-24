<?php

include('conect.php');
$pass = '';
include __DIR__.'/../login/login1.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if session variables are not set
    header("Location: /../final/customer/login/login.php");
    exit();
}
if (isset($_GET['change_pass'])) {
    $id = $_GET['change_pass'];
    
 } else {
        header('myAccount.php');
    }

if(isset($_POST['change'])){
    $new_pass = $_POST['newpass'];
    $current_pass = $_POST['cupass'];
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * from custemr where user_id='$id'");
    if (mysqli_num_rows($query)) {
        while ($rows = mysqli_fetch_assoc($query)) {
            $pass = $rows['password'];  
        }
    }else {
        header('myAccount.php');
    }
    if($pass === $current_pass){
        $query = mysqli_query($conn, "UPDATE `custemr` SET `password` = '$new_pass' WHERE `custemr`.`user_id` = $id");
       if ($query) {
           echo '<script>alert("Password Changed succesefuly."); window.location.href = "/../final/customer/home page/myAccount.php";</script>';
       }
    } else{
        echo '<script>alert("faild");  window.location.href = "/../final/customer/home page/myAccount.php";</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            height: 400px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 50%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form  method="post" id="form">
        <label for="cupass">Current Password</label><br>
        <input type="password" name="cupass" id="cupass" required><span id="curpass">show</span><br>
        <label for="newpass">New Password</label><br>
        <input type="password" name="newpass" id="newpas" required><span id="npass">show</span><br>
        <label for="cupass">Confirem Password</label><br>
        <input type="password" name="cpass" id="cpass" required><span id="copass">show</span><br><br>
        <input type="submit" value="Change" name="change">
        <input type="hidden" name="id" value="<?= $id ?>" />
    </form>
</body>
<script>
    document.addEventListener("DOMContentLoaded",function(){
    var newpass = document.querySelector("#newpas");
    var cpass = document.querySelector("#cpass");
    var passwordregx = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,14}$/;
       
    function validatepass(){
  if(!passwordregx.test(newpass.value)){
    alert("pls enter valid password");
    newpass.style.border = "2px solid red"; 
  }
  else{
    newpass.style.border = "2px solid green";
}

}
 function validateconfirmpass(){
  if(newpass.value != cpass.value){
   alert("Password must be the same.");
   cpass.style.border = "2px solid red"; 
  }
  
  else{
    cpass.style.border = "2px solid green"; 
}

 }
 //password validation event listener
 newpass.addEventListener("change",function(){
  validatepass();
  validateconfirmpass();
});
cpass.addEventListener("change",function(){
  validateconfirmpass();
});

document.querySelector("#form").addEventListener("submit", function (event) {
            var isPasswordValid = validatepass();
            var isConfirmPasswordValid = validateconfirmpass();
            
            if (!isPasswordValid || !isConfirmPasswordValid) {
                // Prevent form submission if validation fails
                return false;
            }
            console.log(document.querySelector("#form"));
        });

var cupass = document.querySelector('#curpass');
 npass = document.querySelector('#npass');
var copass = document.querySelector('#copass');

cupass.addEventListener("click" , function(e){
    if(e.target.previousElementSibling.type === "password"){
      e.target.previousElementSibling.type = "text";
      e.target.textContent = " Hide ";
    }
    else{
      e.target.previousElementSibling.type = "password";
      e.target.textContent = "Show";
 }
 console.log("hgdf");
});
npass.addEventListener("click" , function(e){
  if(e.target.previousElementSibling.type === "password"){
    e.target.previousElementSibling.type = "text";
    e.target.textContent = " Hide ";
  }
  else{
    e.target.previousElementSibling.type = "password";
    e.target.textContent = "Show";
} 

});
copass.addEventListener("click" , function(e){
  if(e.target.previousElementSibling.type === "password"){
    e.target.previousElementSibling.type = "text";
    e.target.textContent = " Hide ";
  }
  else{
    e.target.previousElementSibling.type = "password";
    e.target.textContent = "Show";
} 

});
});
</script>
</html>