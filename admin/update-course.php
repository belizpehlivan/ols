<?php include('partials/menu.php'); ?>

    <!--Main Content Sectiopn Starts-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Course</h1>

            <br><br>

            <?php   
                                
                // 1.Get the data of selected course
                $course_id = $_GET['id'];
                $code = $_GET['code'];
                $course_name = $_GET['course_name'];
                $inst_id = $_GET['inst_id'];
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Course Code:</td>
                        <td>
                            <input type="text" name="new_code" value="<?php echo $code; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Course Name:</td>
                        <td>
                            <input type="text" name="new_course_name" value="<?php echo $course_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Instructor ID:</td>
                        <td>
                        <select name="new_inst_id">
                            <?php 
                                $sql = "SELECT * FROM teacher";
                                $res = mysqli_query($conn, $sql);
                                if($res==TRUE){
                                    $count = mysqli_num_rows($res);
                                    if($count > 0){
                                        while($rows = mysqli_fetch_assoc($res)){
                                            $i_id = $rows['id'];
                                            $i_full_name = $rows['full_name'];
                                            ?>
                                                <option value="<?php echo $i_id; ?>"><?php echo $i_id. ' - ' . $i_full_name ?></option>
                                            <?php
                                        }
                                    }

                                }
                            ?>
                        </select>
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
        $new_code = $_POST['new_code'];
        $new_course_name = $_POST['new_course_name'];
        $new_inst_id = $_POST['new_inst_id'];
        
        $sql = "SELECT *  FROM course WHERE code='$new_code'";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        $count = mysqli_num_rows($res);

        $change = TRUE;
        if($new_code != $code){ //kod değiştiyse
            if($count!=0){ //daha önceden böyle bir kod varsa
                $change = FALSE;
            }
        }
        elseif($new_inst_id != $inst_id){   //kod değişmemişse ama öğretmen değiştiyse
            $sql2 = "SELECT *  FROM course WHERE code='$code' AND instructor_id='$new_inst_id'";
            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
            $count2 = mysqli_num_rows($res2);
            if($count2 != 0){ // daha önceden böyle bir kurs-öğretmen varsa
                $change = FALSE;
            }
        }

        if($change){
            $sql3 = "UPDATE course SET
            code = '$new_code',
            course_name = '$new_course_name',
            instructor_id = '$new_inst_id'
            WHERE id = '$course_id'
            ";
            $res3 = mysqli_query($conn, $sql3) or die(mysqli_error());
            if($res3==TRUE){

                $sql4 = "UPDATE course_student SET
                course_code = '$new_code',
                course_name = '$new_course_name'
                WHERE course_id = '$course_id'
                ";

                mysqli_query($conn, $sql4);
                
                $sql5 = "UPDATE course_content SET
                course_code = '$new_code',
                course_name = '$new_course_name'
                WHERE course_code = '$code'
                ";

                mysqli_query($conn, $sql5);

                $_SESSION['update'] = "Course Updated";
                header("location:".SITEURL."admin/manage-courses.php");
            }

        }else{
            $_SESSION['update'] = "Failed to Update Course $test1 $test2";
            header("location:".SITEURL."admin/manage-courses.php");
        }
        
    }

?>

<?php include('partials/footer.php'); ?>

