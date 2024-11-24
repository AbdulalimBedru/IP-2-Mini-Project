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
            <th>orderd date</th>
            <th>order id</th>
            <th>Quantity</th>
            <th>custemer Id</th>
            <th>order States</th>
            <th>price</th>
            <th></th>
        </tr>
</thead>
<tbody>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM `ordered_item`");
        while ($rows = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
             
            <td><?= $rows['item_id'] ?></td>
            <td><?= $rows['item_name'] ?></td>
            <td><?= $rows['order_date'] ?></td>
            <td><?= $rows['order_id'] ?></td>
            <td><?= $rows['quantity'] ?></td>
            <td><?= $rows['user_id'] ?></td>
            <td><?= $rows['status'] ?></td>
            <td><?= $rows['item_price']?></td>
            <th><a href="aprove.php?order_id=<?=$rows['order_id'];?>">
                Approve
            </a></th>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>