<?php include('partials/menu.php'); ?>

    <!--Main Content Sectiopn Starts-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Course</h1>

            <br><br>

            <?php   
                                
                // 1.Get the ID of selected course
                $id = $_GET['id'];

                // 2.Create sql query to get details
                $sql = "SELECT * FROM course WHERE id=$id";

                // 3.Execute the query
                $res = mysqli_query($conn, $sql);

                // 4.Check whether the query executed successfully or not
                if($res == TRUE)
                {
                    //Check the data is available or not

                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        //Get the details
                        $rows = mysqli_fetch_assoc($res);
                        $code = $rows['code'];
                        $instructor_id = $rows['instructor_id'];
        
                    }
                    else
                    {
                        //Redirect to manage-admin page
                        header('location:'.SITEURL.'admin/manage-courses.php');
                    }
                }
               
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Course Code:</td>
                        <td>
                            <input type="text" name="code" value="<?php echo $code; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Instructor ID:</td>
                        <td>
                            <input type="text" name="instructor_id" value="<?php echo $instructor_id; ?>">
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
        $code = $_POST['code'];
        $instructor_id = $_POST['instructor_id'];
        $id = $_POST['id'];
        
        // SQL query to update the database
        $sql = "UPDATE course SET
        code = '$code',
        instructor_id = '$instructor_id'
        WHERE id = '$id'
        ";

        // Exetuce Query
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // Check whether the query executed or not and display message
        if($res==TRUE){
        
            $selected_course_id = $_GET['id'];
            
            $sql2 = "UPDATE course_student SET
            course_code = '$code'
            WHERE course_id = '$selected_course_id'
            ";
            $res2 = mysqli_query($conn, $sql2);
      

           
            $_SESSION['update'] = "Course Updated";
            header("location:".SITEURL."admin/manage-courses.php");
        }
        else{

            //Create a session variable to display message 
            $_SESSION['update'] = "Failed to Update Course";
            
            //Redirect page to Add Admin , bulundugu yer
            header("location:".SITEURL."admin/manage-courses.php");
        }
        //Then go manage admin page and display the message

    }

    

?>

<?php include('partials/footer.php'); ?>

