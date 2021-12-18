<?php include('config/constants.php'); ?>
<html>
    <head>
        <title>Login - Online Learning System</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body> 
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br>
            <?php   
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login']; // Display session message
                    unset($_SESSION['login']); // Remove session message
                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message']; // Display session message
                    unset($_SESSION['no-login-message']); // Remove session message
                }
            ?>
            <br>

            <!-- Login Form Starts Here -->
            
            <form action="" method="POST" class="text-center">
                <h3>Teacher Login</h3>
                Username:<br>
                <input type="text" name="username" placeholder="Enter Username"><br><br>
                Password:<br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name="submit-teacher" value="Login" class="btn btn-primary">
            </form>
            <br>
            <form action="" method="POST" class="text-center">
                <h3>Student Login</h3>
                Username:<br>
                <input type="text" name="username" placeholder="Enter Username"><br><br>
                Password:<br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name="submit-student" value="Login" class="btn btn-primary">
            </form>
            <!-- Login Form Starts Here -->

            <br><br>
            <p class="text-center">Copyright ©2020 - E-Learning - All rights reserved.</p>
        </div>
    </body>
</html>

<?php 

    // Check whether the submit button is clicked or not
    if(isset($_POST['submit-teacher'])){

        // 1.Get data from form
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        // 2.SQL query -to check whether the user with username and pwd exists or not
        $sql = "SELECT * FROM teacher WHERE username = '$username' AND password = '$password'";
        
        // 3.Execute the query
        $res = mysqli_query($conn, $sql); //must include constants.php to use $conn

        // 4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count == 1){

            $_SESSION['login'] = "Login Successfull";

            // Want to check whther the user is logged in or not
            // Add session
            // This value is set when only on login
            // Also, destroy this user session on the logout.php
            $_SESSION['user'] = $username;

            header("location:".SITEURL."teacher/");
        }
        else{

            $_SESSION['login'] = "<div class='text-center'>Failed To Login</div>";
            header("location:".SITEURL."login.php");
        }
    }
    if(isset($_POST['submit-student'])){

        // 1.Get data from form
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        // 2.SQL query -to check whether the user with username and pwd exists or not
        $sql = "SELECT * FROM student WHERE username = '$username' AND password = '$password'";
        
        // 3.Execute the query
        $res = mysqli_query($conn, $sql); //must include constants.php to use $conn

        // 4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count == 1){

            $_SESSION['login'] = "Login Successfull";

            // Want to check whther the user is logged in or not
            // Add session
            // This value is set when only on login
            // Also, destroy this user session on the logout.php
            $_SESSION['user'] = $username;

            header("location:".SITEURL."student/");
        }
        else{

            $_SESSION['login'] = "<div class='text-center'>Failed To Login</div>";
            header("location:".SITEURL."login.php");
        }
    }

?>