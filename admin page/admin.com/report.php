<?php
include('conect.php');
$today = date('Y-m-d');
$totalprice = 0;
$totalquantity = 0;
$qurey = mysqli_query($conn, "SELECT * FROM ordered_item WHERE  DATE(order_date) = '$today' ");
       if($qurey){
        while($row = mysqli_fetch_assoc($qurey)){
            $allprice = $row['item_price'] ;
            $quantity = $row['quantity'];

            $totalprice += $allprice * $quantity;
            $totalquantity += $quantity;
        }
    }

$report = "
<html>
<head>
    <title>Daily Sales Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 50%; margin: 20px auto; }
        th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1 style='text-align: center;'>Daily Sales Report for $today</h1>
    <table>
        <tr>
            <th>Total Price</th>
            <th>Total Quantity</th>
        </tr>
        <tr>
            <td>$$totalprice</td>
            <td>$totalquantity</td>
        </tr>
    </table>
</body>
</html>
";

// Display the report
echo $report;
?>