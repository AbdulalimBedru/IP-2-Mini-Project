<?php
include('conect.php');
include __DIR__.'/../login/login1.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if session variables are not set
    header("Location: /../final/customer/login/login.php");
    exit();
}

if (isset($_GET['item']) && isset($_GET['user'])) {
    $item_id = $_GET['item'];
    $user_id = $_GET['user'];
    
    // Fetch the item details
    $result = mysqli_query($conn, "SELECT * FROM items WHERE item_id = '$item_id'");

    if ($result) {
        while ($data = mysqli_fetch_assoc($result)) {
            $quantity = $data['quantity']; // Assuming 'quality' is actually 'quantity'
            $name = $data['name'];
            $price = $data['price'];
            
            // Decrease quantity
            $quantity--;
            
            // Update the item quantity
            $update_quantity_query = "UPDATE items SET quantity = '$quantity' WHERE item_id = '$item_id'";
            $qurye = mysqli_query($conn, $update_quantity_query);
            
            $date = date("Y-m-d");
            if ($qurye) {
                // Insert into ordered_item table
                $insert_query = "INSERT INTO ordered_item (item_name, order_date, item_id, quantity, user_id,item_price) VALUES ('$name', '$date', '$item_id', 1, '$user_id',$price)";
                $insert = mysqli_query($conn, $insert_query);
                
                if ($insert) {
                    echo '<script>alert("Order placed successfully."); window.location.href = "/../final/customer/home page/home.php";</script>';

                } else {
                    echo "Error placing order: " . mysqli_error($conn);
                }
            }
            
            if ($quantity <= 0) {
                // If quantity is zero, update ordered_item and delete from items
                $update_ordered_item_query = "UPDATE items SET statuse = 'out_of_stock' WHERE item_id = '$item_id'";
                $update = mysqli_query($conn, $update_ordered_item_query);
                
                if ($update) {
                  echo "updated successfully";
                } else {
                    echo "Error updating ordered_item: " . mysqli_error($conn);
                }
            }
        }
    } else {
        echo "Error fetching item: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
