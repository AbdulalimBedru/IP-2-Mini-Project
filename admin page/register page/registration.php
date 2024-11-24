<?php
     if (isset($_POST['signup'])) {
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pass = $_POST['password'];
        $username = $_POST['useername'];
       
    
         $fname = ucfirst($fname);
         $lname = ucfirst($lname);
     
         // Check if email or username already exists
         $check_query = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' OR username='$username'");
         if (mysqli_num_rows($check_query) > 0) {
             $row = mysqli_fetch_assoc($check_query);
             if ($row['email'] == $email) {
                 echo "<script>alert('Error: This email is already registered.')</script>";
             } elseif ($row['username'] == $username) {
                 echo "<script>alert('Error: This username is already taken.')</script>";
             }
         } else {
             // Insert new admin record
             try {
                 $query = mysqli_query($conn, "INSERT INTO admin (email, fname, lname, username, password) VALUES ('$email', '$fname', '$lname', '$username', '$pass')");
                 if ($query) {
                     echo "<script>alert('Registered successfully')</script>";
                 } else {
                     // Display detailed error message for debugging
                     echo "<script>alert('Error: Could not register. " . mysqli_error($conn) . "')</script>";
                 }
             } catch (mysqli_sql_exception $e) {
                 echo "<script>alert('Error: " . $e->getMessage() . "')</script>";
             }
         }
     }
     ?>