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
                    <td>Select Student:
                    
                        <select name="student_id">
                            <?php 
                                $sql = "SELECT * FROM student";
                                $res = mysqli_query($conn, $sql);
                                if($res==TRUE){
                                    $count = mysqli_num_rows($res);
                                    if($count > 0){
                                        while($rows = mysqli_fetch_assoc($res)){
                                            $id = $rows['id'];
                                            $full_name = $rows['full_name'];
                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $id. ' - ' . $full_name ?></option>
                                            <?php
                                        }
                                    }

                                }
                            ?>
                        </select>  
                    </td>
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

        $exists = "SELECT *  FROM course_student WHERE course_id='$course_id' AND student_id='$student_id'";
        $res_exists = mysqli_query($conn, $exists) or die(mysqli_error());
        $cnt = mysqli_num_rows($res_exists);

        if($cnt!=0){
            $_SESSION['add-student-to-course'] = "Already Exists";
            header("location:".SITEURL."admin/manage-courses.php");
        }else{

            $sql = "SELECT *  FROM student WHERE id='$id'";
            $res = mysqli_query($conn, $sql) or die(mysqli_error());
            $rows = mysqli_fetch_assoc($res);
            $student_name = $rows['full_name'];

             // SQL query to save the data into database
            $sql2 = "INSERT INTO course_student SET
            student_id = '$student_id',
            student_name = '$student_name',
            course_id = '$course_id',
            course_code = '$course_code'
            ";

            // Exetuce Query
            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

            // Check whether the query executed or not and display message
            if($res2==TRUE){
                $_SESSION['add-student-to-course'] = "Student Added Successfully";
                header("location:".SITEURL."admin/manage-courses.php");
            }
            else{
                $_SESSION['add-student-to-course'] = "Failed to Add Student";
                header("location:".SITEURL."admin/manage-courses.php");
            }
        }
        
    }
?>
    </div>
</div>
<!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>


