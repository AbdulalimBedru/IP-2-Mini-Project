<?php
// Start session
session_start();


    session_unset();
    session_destroy();
    
    
    header("Location: /../admin/admin page/login/admin_login.php");
    exit();

?>