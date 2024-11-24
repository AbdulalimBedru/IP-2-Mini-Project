<?php
include('conect.php');

if(isset($_GET['order_id'])){
    $orderid = $_GET['order_id'];
    
     
    $update_ordered_item_query = "UPDATE ordered_item SET status = 'approved' WHERE order_id = '$orderid'  ";
    $update = mysqli_query($conn, $update_ordered_item_query);
    echo '<script>alert("Item approved succesefuly."); window.location.href = "/../final/admin page/admin.com/dashbord.php";</script>'; 
    
}
?>