 <?php
include('conect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if(!isset($_SESSION['admin_id'])){
  
    header("Location: /../final/admin page/login/admin_login.php");
      exit();
  }
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quan = $_POST['quan'];
    $desc = $_POST['desc'];
    $date = date("Y-m-d");

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $uploadDir = "uploads/";
        $dest_path = $uploadDir . $imageName;

        if (move_uploaded_file($imageTmpPath, $dest_path)) {
            $dbdir = "\\final\admin page\admin.com\uploads\\".$imageName;
            $stmt = $conn->prepare("INSERT INTO items (name, image, price, quantity, description, inserted_date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $name, $dbdir, $price, $quan, $desc, $date);

            if ($stmt->execute()) {
                echo "<script>alert('Item Registered successfully')</script>";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Item Registration</title>
    <style>
        body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: azure;
    font-family: 'Playfair Display', serif;
        }
        .contrner{
    border: 3px solid aqua;
    height: 50vh;
    width: 30vw;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 30px;
    background-color: violet;
    font-size: 1rem;
    color: #fefefe;
}
input{
    height: 3vh;
    width: 15vw;
    border-radius: 5px;
    border: 2px solid white;
    margin: 10px;  
}
    </style>
</head>
<body>
    <div class="contrner">
    <form method="post" enctype="multipart/form-data" id="itemForm">
        <label for="name">Item Name</label><br>
        <input type="text" name="name" id="name" required><br>
        <label for="price">Price</label><br>
        <input type="number" name="price" id="price" required><br>
        <label for="quan">Quantity</label><br>
        <input type="number" name="quan" id="quan" required><br>
        <label for="desc">Description</label><br>
        <input type="text" name="desc" id="desc" required><br>
        <label for="image">Image</label><br>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>
        <input type="submit" value="Register" name="signup">
    </form>
    </div>
    <script >
        document.getElementById('itemForm').addEventListener('submit', function(event) {
            // Get form elements
            var name = document.getElementById('name');
            var price = document.getElementById('price');
            var quan = document.getElementById('quan');
            var desc = document.getElementById('desc');
            var image = document.getElementById('image');
            var maxSizeInBytes = 5000000; // 5MB for example

            // Validation
            if(name.value.length < 4 || name.value === ""){
                alert("Please enter a proper item name");
                event.preventDefault();
                return false;
            }
            if(price.value > 100000 || price.value < 1000){
                alert("Please enter a proper item price");
                event.preventDefault();
                return false;
            }
            if(quan.value == 0 || quan.value > 20){
                alert("Quantity cannot be zero or greater than 20");
                event.preventDefault();
                return false;
            }
            if(desc.value.length < 5 || desc.value === ""){
                alert("Please enter a proper item description");
                event.preventDefault();
                return false;
            }
            if(image.files[0].size > maxSizeInBytes){
                alert("File size exceeds limit");
                event.preventDefault();
                return false;
            }
        });
        </script>
</body>
</html>
