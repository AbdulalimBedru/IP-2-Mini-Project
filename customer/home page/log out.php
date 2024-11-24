<?php
// Start session
session_start();


    session_unset();
    session_destroy();
    
    
    header("Location: /../final/customer/index.php");
    exit();

?>