<?php 

    // Include constants.php for SITEURL
    include('config/constants.php');
    
    // 1.Destroy the session
    session_destroy(); // Unsets $_SESSION['user]

    if($_SESSION['student']){
        $_SESSION['student'] = FALSE;
    }
    if($_SESSION['teacher']){
        $_SESSION['teacher'] = FALSE;
    }

    // 2.Redirect
    header("location:".SITEURL."login.php");
?>