<?php
include('conect.php');
$fname = '';
$username = '';
$lname = '';
$addres = '';

include __DIR__.'/../login/login1.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if session variables are not set
    header("Location: /../final/customer/login/login.php");
    exit();
}
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    
    $query = mysqli_query($conn, "SELECT * from custemr where user_id='$id'");
    if (mysqli_num_rows($query)) {
        while ($rows = mysqli_fetch_assoc($query)) {
            $fname = $rows['fname'];
            $username = $rows['username'];
            $addres = $rows['address'];
            $lname = $rows['lname']; 
        }
    } else {
        header('Location: myAccount.php');
    }
}
if (isset($_POST['update'])) {
    $updated_fname = $_POST['fname'];
    $updated_username = $_POST['username'];
    $updated_lname = $_POST['lname'];
    $updated_addres = $_POST['addres'];
    $id = $_POST['id'];
    $check_query = mysqli_query($conn, "SELECT * FROM custemr WHERE username='$updated_username' AND user_id != '$id'");
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.')</script>";
    }else{
    $query = mysqli_query($conn, "UPDATE `custemr` SET `fname` = '$updated_fname', `username`='$updated_username',`lname` = '$updated_lname',`address` = '$updated_addres'
     WHERE `custemr`.`user_id` = $id");
    if ($query) {
        echo '<script>alert("Information updated succesefuly."); window.location.href = "/../final/customer/home page/myAccount.php";</script>';    
    }
    else{
        echo "<script>alert('faild')</script>";
    }
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
            background-color: azure;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>user info Update!</h1>
    <form  method="post" >
        <div><label>First Name:</label>
            <input type="text" name="fname" required placeholder="Name" value="<?= $fname ?>" />
        </div>
        <div><label>Last Name:</label>
            <input type="text"  name="lname" placeholder="Username" value="<?= $lname ?>" required />
        </div>
        <div><label>Username:</label>
            <input type="text"  name="username" placeholder="Username" value="<?= $username ?>" required />
        </div>
        <div><label>Address:</label>
            <input type="text"  name="addres" placeholder="Username" value="<?= $addres ?>" required />
        </div>
        <div>
            <input type="submit"  name="update" value="Update" />
        </div>
        <input type="hidden" name="id" value="<?= $id ?>" />
    </form>

</body>

</html>