<?php 
include('conect.php');
include __DIR__.'/../login/login1.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
// var_dump($_SESSION);
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if session variables are not set
    header("Location: /../final/customer/login/login.php");
    exit();
}
$uid = $_SESSION['user_id'];
//var_dump($uid);

if(isset($_POST['submit'])){
    $message = $_POST['feedback'] ;
    $date = date("Y-m-d");
   
    $query = mysqli_query($conn, "INSERT into feedbacks(message,feddback_date,user_id ) values 
    ('$message','$date','$uid')
    ");
     echo '<script>alert("Feedback Submited succesefuly."); window.location.href = "/../final/customer/home page/home.php";</script>'; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .word-count {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
        }
        input[type="submit"] {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Change the button color on hover */
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post">
    <label for="feedback">Message</label>
<textarea name="feedback" id="feedback" minlength="20" maxlength="255" oninput="countCharacters()" required>hg</textarea>
<input type="submit" value="Send" name="submit">
<div class="word-count" id="wordCount">Word count: 0</div>
    </form>
    <script>
      function countCharacters() {
        // Get the text from the textarea
        var text = document.getElementById("feedback").value;

        // Get the current character count
        var charCount = text.length;

        // Update the character count
        document.getElementById("wordCount").textContent = charCount;

        // Check if character count exceeds 250
        if (charCount >= 250) {
            // Limit the text to 250 characters
            var limitedText = text.substring(0, 250);
            document.getElementById("feedback").value = limitedText;
            // Optionally, you can display a message to the user
            alert("Character count exceeded. Only the first 250 characters will be kept.");
        }
    }
    </script>
    </body>

</html>