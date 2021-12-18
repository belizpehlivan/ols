<?php include('partials/menu.php'); ?>

    <!--Main Content Sectiopn Starts-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Student</h1>

            <br><br>

            <?php   
                                
                // 1.Get the ID of selected admin
                $id = $_GET['id'];

                // 2.Create sql query to get details
                $sql = "SELECT * FROM student WHERE id=$id";

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
                        header('location:'.SITEURL.'admin/manage-student.php');
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
        
        // SQL query to update the database
        $sql = "UPDATE student SET
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
            $_SESSION['update'] = "Student Updated";
            
            //Redirect page to Manage Admin bir önceki sayfa
            header("location:".SITEURL."admin/manage-student.php");
        }
        else{

            //Create a session variable to display message 
            $_SESSION['update'] = "Failed to Update Student";
            
            //Redirect page to Add Admin , bulundugu yer
            header("location:".SITEURL."admin/manage-student.php");
        }
        //Then go manage admin page and display the message

    }

    

?>

<?php include('partials/footer.php'); ?>

