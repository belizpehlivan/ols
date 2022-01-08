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
                    <td>Course  Name:</td>
                    <td><input type="text" name="name" placeholder="Enter Course Name"></td>
                </tr>
                <tr>
                    <td>Instructor Id:</td>
                    <td>
                        <select name="instructor_id">
                            <?php 
                                $sql = "SELECT * FROM teacher";
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
        <!-- Add Course Form Ends Here -->
        
<?php
    // Check  whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        
        // Get data from form
        $code = $_POST['code'];
        $name = $_POST['name'];
       $instructor_id = $_POST['instructor_id'];

       

        $course_exists = "SELECT *  FROM course WHERE code='$code'";
        $res3 = mysqli_query($conn, $course_exists) or die(mysqli_error());
        $cnt = mysqli_num_rows($res3);

        if(!($cnt == 1)){

            $sql = "INSERT INTO course SET
            code = '$code',
            instructor_id = '$instructor_id',
            course_name = '$name'
            ";
                   
            $res = mysqli_query($conn, $sql) or die(mysqli_error());
                       
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
            $_SESSION['course-exists'] = "Course is Already Exists";
            header("location:".SITEURL."admin/manage-courses.php");
        }
    }
?>
    </div>
</div>
<!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>


