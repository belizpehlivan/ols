<?php include('partials/menu.php'); ?>
<!--Main Content Sectiopn Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Course</h1>
        <br><br>

        <?php   
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; // Display session message
                unset($_SESSION['add']); // Remove session message
            }
        ?>
    
        <!-- Add Course Form Starts Here -->
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Course Code:</td>
                    <td><input type="text" name="code" placeholder="Enter Course Code"></td>
                </tr>
                <tr>
                    <td>Instructor Id:</td>
                    <td><input type="text" name="instructor_id" placeholder="Enter Instructor Id"></td>
                </tr>
                <tr>
                    <td class="colspan=2"><input type="submit" name="submit" value="Add" class="btn btn-secondary"></td>
                </tr>
            </table>
        </form>
        <!-- Add Course Form Ends Here -->
        
<?php
    // Check  whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        
        // Get data from form
        $code = $_POST['code'];
        $instructor_id = $_POST['instructor_id'];

        $sql2 = "SELECT *  FROM teacher WHERE id='$instructor_id'";
        $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
        if($res2==TRUE){
            $count = mysqli_num_rows($res2);
            if($count==1){
                
                // SQL query to save the data into database
                $sql = "INSERT INTO course SET
                code = '$code',
                instructor_id = '$instructor_id'
                ";

                // Exetuce Query
                $res = mysqli_query($conn, $sql) or die(mysqli_error());

                // Check whether the query executed or not and display message
                if($res==TRUE){
                    $_SESSION['add'] = "Course Added Successfully";
                    header("location:".SITEURL."admin/manage-courses.php");
                }
                else{
                    $_SESSION['add'] = "Failed to Add Course";
                    header("location:".SITEURL."admin/add-course.php");
                }
            }
            else{
                //Teacher does not exists
                //Create a session variable to display error message and redirect
                $_SESSION['instructor-not-found'] = "Instructor Not Found";
                header('location:'.SITEURL.'admin/manage-courses.php');
            }
        }
    }
?>
    </div>
</div>
<!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>


