<?php

$conn = mysqli_connect("localhost","root","","its",3308);

if($conn){
echo "<h2>connected</h2>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="newdatabase.php" method="post">
        <label for="fname">First Name</label><br>
        <input type="text" name="fname"><br>
        <label for="lname">Last Name</label><br>
        <input type="text" name="lname"><br>
        <label for="email">Email</label><br>
        <input type="email" name="email"><br><br>
        <input type="submit" value="add" name="add">
    </form>
</body>
</html>
<?php
if(isset($_POST['add'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $query = mysqli_query($conn," INSERT INTO student(fname,lnmae,email) VALUES
     ('$fname','$lname','$email')
     ");

    if ($query) {
        echo "<script>alert('Registered successfully')</script>";
    }else{
        echo "<script>alert('Registered faild')</script>";
    }
}
?>