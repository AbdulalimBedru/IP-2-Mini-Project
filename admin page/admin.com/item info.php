<?php
include('conect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if(!isset($_SESSION['admin_id'])){
  
    header("Location: /../final/admin page/login/admin_login.php");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        
    </style>
</head>
<body>
    <table>
<thead>
        <tr>
            <th>Item id</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>inserted date</th>
            <th></th>
            
        </tr>
</thead>
<tbody>
        <?php
        $query = mysqli_query($conn, "SELECT item_id,name,inserted_date,quantity,price,description FROM `items`");
        while ($rows = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $rows['item_id'] ?></td>
            <td><?= $rows['name'] ?></td>
            <td><?= $rows['description'] ?></td>
            <td><?= $rows['price'] ?></td>
            <td><?= $rows['quantity'] ?></td>
            <td><?= $rows['inserted_date'] ?></td>
            <td><a href="update item.php?update=<?= $rows['item_id'] ?>">
           <i class="fa-sharp fa-solid fa-pen" style="color: aqua;"></i>
        </a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>