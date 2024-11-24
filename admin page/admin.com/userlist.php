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
    body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Username</th>
            <th>Email</th>
            <th>custemer Id</th>
        </tr>
</thead>
<tbody>
        <?php
        $query = mysqli_query($conn, "SELECT fname,lname,email,address,username,user_id FROM `custemr`");
        while ($rows = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            
            <td><?= $rows['fname'] ?></td>
            <td><?= $rows['lname'] ?></td>
            <td><?= $rows['address'] ?></td>
            <td><?= $rows['username'] ?></td>
            <td><?= $rows['email'] ?></td>
            <td><?= $rows['user_id'] ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>