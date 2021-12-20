<?php include('partials/menu.php'); ?>
<!--Main Content Sectiopn Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Student to Course</h1>
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
                    <td>Student ID:</td>
                    <td><input type="text" name="student_id" placeholder="Enter Student ID"></td>
                </tr>
                <tr>
                    <td>Student Name:</td>
                    <td><input type="text" name="student_name" placeholder="Enter Student Full Name"></td>
                </tr>
                <tr>
                    <td class="colspan=2"><input type="submit" name="submit" value="Add" class="btn btn-secondary"></td>
                </tr>
            </table>
        </form>
    
        
<?php

    // Check  whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        
        $course_id = $_GET['course_id'];
        $course_code = $_GET['course_code'];
        
        // Get data from form
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];

        // SQL query to save the data into database
        $sql = "INSERT INTO course_student SET
        student_id = '$student_id',
        student_name = '$student_name',
        course_id = '$course_id',
        course_code = '$course_code'
        ";

        // Exetuce Query
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // Check whether the query executed or not and display message
        if($res==TRUE){
            $_SESSION['add-student-to-course'] = "Student Added Successfully";
            header("location:".SITEURL."admin/manage-courses.php");
        }
        else{
            $_SESSION['add-student-to-course'] = "Failed to Add Student";
            header("location:".SITEURL."admin/manage-courses.php");
        }
    }
?>
    </div>
</div>
<!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>


