<?php include('partials/menu.php'); ?>

        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Add Admin</h1>

                <br><br>
                <?php   
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add']; // Display session message
                        unset($_SESSION['add']); // Remove session message
                    }
                ?>


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
                            <td>Password:</td>
                            <td><input type="text" name="password" placeholder="Enter Password"></td>
                        </tr>
                        <tr>
                            <td class="colspan=2"><input type="submit" name="submit" value="Add" class="btn btn-secondary"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>

<?php
    // Check  whether the submit button is clicked or not
    if(isset($_POST['submit'])){

        // Get data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Password Encryption with MD5

    // SQL query to save the data into database
        $sql = "INSERT  INTO admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'
        ";

    // Exetuce Query
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

    // Check whether the query executed or not and display message
        if($res==TRUE){
            //Data inserted
            //Create a session variable to display message 
            $_SESSION['add'] = "Admin Added Successfully";
            
            //Redirect page to Manage Admin bir önceki sayfa
            header("location:".SITEURL."admin/manage-admin.php");
        }
        else{
            //Failed to insert data
            //Create a session variable to display message 
            $_SESSION['add'] = "Failed to Add Admin";
            
            //Redirect page to Add Admin , bulundugu yer
            header("location:".SITEURL."admin/add-admin.php");
        }

    }

?>