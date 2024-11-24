<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3308);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT image_path FROM images";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $images[] = $row['image_path'];
    }
}

$conn->close();
echo json_encode($images);
?>