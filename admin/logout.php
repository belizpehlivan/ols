<?php 

    // Include constants.php for SITEURL
    include('../config/constants.php');
    
    // 1.Destroy the session
    session_destroy(); // Unsets $_SESSION['user]

            
    $_SESSION['admin'] = FALSE;
    
    // 2.Redirect
    header("location:".SITEURL."admin/login.php");
?>