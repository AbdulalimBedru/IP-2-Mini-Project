<?php
include('conect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if session variables are not set
    header("Location: /../final/customer/login/login.php");
    exit();
}
$uid = $_SESSION['user_id'];
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
            <th>order States</th>  
        </tr>
</thead>
<tbody>
        <?php
        $query = mysqli_query($conn, "SELECT item_id,item_name,order_date,order_id,quantity,status FROM `ordered_item` WHERE `user_id` = $uid");
        while ($rows = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $rows['item_id'] ?></td>
            <td><?= $rows['item_name'] ?></td>
            <td><?= $rows['order_date'] ?></td>
            <td><?= $rows['order_id'] ?></td>
            <td><?= $rows['quantity'] ?></td>
            <td><?= $rows['status']?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>