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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $uploadDir = 'uploads/';
        $dest_path = $uploadDir . $imageName;

        if (move_uploaded_file($imageTmpPath, $dest_path)) {
            $sql = "INSERT INTO images (image_path) VALUES ('$dest_path')";
            if ($conn->query($sql) === TRUE) {
                echo "Image uploaded and saved to database successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
}

$conn->close();
?>