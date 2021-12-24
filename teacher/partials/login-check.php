<?php 
    // Authorization - Access Control
    // Check whther the user is logged in or not

    if(!isset($_SESSION['user'])){  // If user session is not set
        // User is not logged in
        // Redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='text-center'>Please Login</div>";
        header("location:".SITEURL."login.php"); 

        /*
        This file will include to menu.php 
        menu.php has constants.php, bcs of that we dont include constants.php in this file
        */
    }
    if(!$_SESSION['teacher']){  
        

        $_SESSION['no-login-message'] = "<div class='text-center'>Please Login</div>";
        header("location:".SITEURL."login.php"); 

    }
    
    

?>