<?php include('partials/menu.php'); ?>

    <!--Main Content Sectiopn Starts-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Teacher</h1>

            <br><br>

            <?php   
                                
                // 1.Get the ID of selected admin
                $id = $_GET['id'];
                $old_username = $_GET['username'];
                $old_mail = $_GET['mail'];

                // 2.Create sql query to get details
                $sql = "SELECT * FROM teacher WHERE id=$id";

                // 3.Execute the query
                $res = mysqli_query($conn, $sql);

                // 4.Check whether the query executed successfully or not
                if($res == TRUE)
                {
                    //Check the data is available or not

                    $count = mysqli_num_rows($res);
                    if($count == 1){
                        //Get the details
                        $rows = mysqli_fetch_assoc($res);
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
                        $mail = $rows['mail'];
                    }
                    else
                    {
                        //Redirect to manage-admin page
                        header('location:'.SITEURL.'admin/manage-teacher.php');
                    }
                }
               
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Mail:</td>
                        <td>
                            <input type="text" name="mail" value="<?php echo $mail; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="colspan=2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update" class="btn btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!--Main Content Section Ends-->

<?php
    // Check  whether the submit button is clicked or not
    if(isset($_POST['submit'])){

        // Get data from FORM
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $mail = $_POST['mail'];
        $id = $_POST['id'];

        //$change = TRUE;
        if($username != $old_username){
            $sql2 = "SELECT * FROM teacher WHERE username='$username'";
            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
            $count2 = mysqli_num_rows($res2);
            if($count2 > 0){
                $exists_username = TRUE;
                $_SESSION['update'] = "Username is already exists.";
            }
            else{
                $exists_username = FALSE;
            }
        }

        if($mail != $old_mail){
            $sql3 = "SELECT * FROM teacher WHERE mail='$mail'";
            $res3 = mysqli_query($conn, $sql3) or die(mysqli_error());
            $count3 = mysqli_num_rows($res3);
            
            if($count3 > 0){
                $exists_mail = TRUE;
                $_SESSION['update'] = "Mail is already exists.";
            }
            else{
                $exists_mail = FALSE;
            }
        }

        if($exists_username && $exists_mail){ // both are already exists
            $_SESSION['update'] = "Username and mail is already exists.";
            header("location:".SITEURL."admin/manage-teacher.php");
        }
        else{
            if((!$exists_username)&&(!$exists_mail)) { 
                $sql = "UPDATE teacher SET
                full_name = '$full_name',
                username = '$username',
                mail = '$mail'
                WHERE id = '$id'
                ";
                $_SESSION['update'] = "Teacher information is changed successfully.";
            }
            elseif(($exists_username == FALSE)&&($exists_mail == TRUE)){ // Only mail exists
                $sql = "UPDATE teacher SET
                full_name = '$full_name',
                username = '$username'
                WHERE id = '$id'
                ";
            }
            elseif(($exists_username == TRUE)&&($exists_mail == FALSE)) { // Only username exists
                $sql = "UPDATE teacher SET
                full_name = '$full_name',
                mail = '$mail'
                WHERE id = '$id'
                ";
                $_SESSION['update'] = "Username is already exists.";
            }
            $res = mysqli_query($conn, $sql) or die(mysqli_error());
            if($res==TRUE){
                header("location:".SITEURL."admin/manage-teacher.php");
            }else{
                $_SESSION['update'] = "Failed to Update Teacher";
                header("location:".SITEURL."admin/manage-teacher.php");
            }

        }
        
/*
       
        if($change){
            // SQL query to update the database
            $sql = "UPDATE teacher SET
            full_name = '$full_name',
            username = '$username',
            mail = '$mail'
            WHERE id = '$id'
            ";

            // Exetuce Query
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            // Check whether the query executed or not and display message
            if($res==TRUE){

                //Create a session variable to display message 
                $_SESSION['update'] = "Teacher Updated";
                
                //Redirect page to Manage Admin bir önceki sayfa
                header("location:".SITEURL."admin/manage-teacher.php");
            }
            else{

                //Create a session variable to display message 
                $_SESSION['update'] = "Failed to Update Teacher";
                
                //Redirect page to Add Admin , bulundugu yer
                header("location:".SITEURL."admin/manage-teacher.php");
            }
            //Then go manage admin page and display the message
        }else{
            $_SESSION['update'] = "Failed to Update Teacher.";
                
            //Redirect page to Add Admin , bulundugu yer
            header("location:".SITEURL."admin/manage-teacher.php");
        }
        
    */    

    }

    

?>

<?php include('partials/footer.php'); ?>

