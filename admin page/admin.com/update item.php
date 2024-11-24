<?php
include('conect.php');
$dec = '';
$name = '';
$price = '';
$quality = '';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if(!isset($_SESSION['admin_id'])){
  
    header("Location: /../final/admin page/login/admin_login.php");
      exit();
  }
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    
    $query = mysqli_query($conn, "SELECT * from items where item_id='$id'");
    if (mysqli_num_rows($query)) {
        while ($rows = mysqli_fetch_assoc($query)) {
            $dec = $rows['description'];
            $name = $rows['name'];
            $price = $rows['price'];
            $quality = $rows['quantity']; 
        }
    } else {
        header('Location: item info.php');
    }
    
}
if (isset($_POST['update'])) {
    $updated_name = $_POST['name'];
    $updated_price = $_POST['price'];
    $updated_dec = $_POST['dec'];
    $updated_quantity = $_POST['quality'];
    $id = $_POST['id'];
    $query = mysqli_query($conn, "UPDATE `items` SET `description` = '$updated_dec', `name`='$updated_name',`price` = '$updated_price',`quantity` = '$updated_quantity'
     WHERE `items`.`item_id` = $id");
    if ($query) {
        echo '<script>alert("Item updated succesefuly."); window.location.href = "/../final/admin page/admin.com/item info.php";</script>'; 
      
    }
    else{
        echo "<script>alert('faild')</script>";
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
    <h1>Product Info Update!</h1>
    <form  method="post" action="update item.php">
        <div><label>Name:</label>
            <input type="text" name="name" required placeholder="Name" value="<?= $name ?>" />
        </div>
        <div><label>Price:</label>
            <input type="text"  name="price" placeholder="Username" value="<?= $price ?>" required />
        </div>
        <div><label>Description:</label>
            <input type="text"  name="dec" placeholder="Username" value="<?= $dec ?>" required />
        </div>
        <div><label>Quantity:</label>
            <input type="text"  name="quality" placeholder="Username" value="<?= $quality ?>" required min="1"/>
        </div>
        <div>
            <input type="submit"  name="update" value="Update" />
        </div>
        <input type="hidden" name="id" value="<?= $id ?>" />
    </form>

</body>

</html>