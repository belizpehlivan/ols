<?php include('partials/menu.php'); ?>
<!--Main Content Sectiopn Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Student</h1>
        <br><br>

        <?php   
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; // Display session message
                unset($_SESSION['add']); // Remove session message
            }
        ?>
    
        <!-- Add Student Form Starts Here -->
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter Userame"></td>
                </tr>
                <tr>
                    <td>Mail:</td>
                    <td><input type="text" name="mail" placeholder="Enter Mail"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td class="colspan=2"><input type="submit" name="submit" value="Add" class="btn btn-secondary"></td>
                </tr>
            </table>
        </form>
        <!-- Add Student Form Ends Here -->
        
<?php
    // Check  whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        
        // Get data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $mail = $_POST['mail'];
        $password = md5($_POST['password']); // Password Encryption with MD5

        // SQL query to save the data into database
        $sql = "INSERT INTO student SET
        full_name = '$full_name',
        username = '$username',
        password = '$password',
        mail = '$mail'
        ";

        // Exetuce Query
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // Check whether the query executed or not and display message
        if($res==TRUE){
            $_SESSION['add'] = "Student Added Successfully";
            header("location:".SITEURL."admin/manage-teacher.php");
        }
        else{
            $_SESSION['add'] = "Failed to Add Student";
            header("location:".SITEURL."admin/add-teacher.php");
        }
    }
?>
    </div>
</div>
<!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>


