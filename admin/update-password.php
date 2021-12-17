<?php include('partials/menu.php'); ?>

    <!--Main Content Sectiopn Starts-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Password</h1>

            <br><br>

            <?php
                // 1.Get the ID of selected admin
                $id = $_GET['id'];
            ?>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Current Password:</td>
                        <td>
                            <input type="password" name="current_password" placeholder="Current Password">
                        </td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td>
                            <input type="password" name="new_password" placeholder="New Password">
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm Password">
                        </td>
                    </tr>
                    <tr>
                        <td class="colspan=2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!--idyi yukardaki phpde aldık-->
                            <input type="submit" name="submit" value="Change Password" class="btn btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php

    // Check  whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        
        // 1. Get data from FORM
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        // 2. SQL query to check whether the user with current ID and current Password exists
        $sql = "SELECT *  FROM admin WHERE id=$id AND password = '$current_password'";

        // Execute Query
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==TRUE){
            
            //Check whether data is available or not
            $count = mysqli_num_rows($res);
            if($count==1){
                //User exists and password can be changed
               // Check whether the new password and confirm passw match or not
               if($new_password == $confirm_password){
                   //Update the password
                   //SQL Query to Update Password
                   $sql2 = "UPDATE admin SET
                   password = '$new_password'                
                   WHERE id = '$id'
                   ";

                   //Execute Query
                   $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

                   // Check whether the query executed or not and display message
                   if($res2==TRUE){
        
                        //Create a session variable to display success message and redirect
                        $_SESSION['change-pwd'] = "Password Successfully Changed";
                        header("location:".SITEURL."admin/manage-admin.php");
                    }
                    else{
                        //Create a session variable to display error message and redirect
                        $_SESSION['change-pwd'] = "Failed to Change Password";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }

               }
               else{
                   //Create a session variable to display error message and redirect
                   $_SESSION['pwd-not-match'] = "Password Does Not Match";
                   header('location:'.SITEURL.'admin/manage-admin.php');
               }
            }
            else{
                //User does not exists
                //Create a session variable to display error message and redirect
                $_SESSION['user-not-found'] = "User Not Found";
                header('location:'.SITEURL.'admin/manage-admin.php');
                //manage-admin'de display message

            }

         
        }

        // 3. 
        //Then go manage admin page and display the message
        // 4. Change Password if all above is true


    }
    else{

    }
?>
<?php include('partials/footer.php'); ?>

