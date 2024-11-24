<?php

if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['password'];
    $username = $_POST['useername'];
    $address = $_POST['address'];

     $fname = ucfirst($fname);
     $lname = ucfirst($lname);
    try{
    $query = mysqli_query($conn, "INSERT into custemr(email ,fname, lname,username, password,address) values 
    ('$email','$fname', '$lname','$username', '$pass' ,'$address')
    ");
    if ($query) {
        echo "<script>alert('Registered successfully')</script>";
    }
}    catch (mysqli_sql_exception $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        if (strpos($e->getMessage(), "'email'") !== false) {
            echo "<script>alert('Error: This email is already registered.')</script>";
        } elseif (strpos($e->getMessage(), "'username'") !== false) {
            echo "<script>alert('Error: This username is already taken.')</script>";
        } else {
            echo "<script>alert('Error: Duplicate entry.')</script>";
        }
    } else {
        echo "<script>alert('Error: Could not register.')</script>";
    }
}
}
?>