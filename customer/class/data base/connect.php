<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db= "kiot";
$port = 3308;

  $conn = mysqli_connect($host,$user,$pass,$db,$port);

  if($conn){
    echo "conected sucessefully";
  }
  else{
    die("database couldnot connect");
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
    <form action="connect.php" method="post">
    <label for="fname">First Name</label><br>
    <input type="text" name="fname" id="fname"><br>
    <label for="fname">last Name</label><br>
    <input type="text" name="lname" id="lname"><br>
    <label for="addres">Address</Address></label><br>
    <input type="text" name="addres" id="addres"><br>
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email"><br>
    <label for="pnum">Phone Number</label><br>
    <input type="number" name="pnum" id="pnum"><br>
    <label for="dob">date of barth</label><br>
    <input type="date" name="dob" id="dob"><br><br>
    <input type="submit" value="add" name="register">
    <input type="submit" value="search" name="ser">
    <input type="submit" value="update" name="update">
    <input type="submit" value="delete" name="del">
    <input type="submit" value="viwe" name="viwe">
    </form>
</body>
</html>

<?php
if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $addres = $_POST['addres'];
    $email = $_POST['email'];
    $pnum = $_POST['pnum'];
    $dob= $_POST['dob'];

    $query = mysqli_query($conn, "INSERT into student(fname, lnmae,email,addrese, phone,barthDate) values 
    ('$fname','$lname', '$addres','$email', '$pnum','$dob' )
    ");

    if ($query) {
        echo "<script>alert('Registered successfully')</script>";
    }else{
        echo "<script>alert('Registered faild')</script>";
    }
}

?>