<?php include('partials/menu.php'); 

$student_id = $_GET['student_id'];
$student_name = $_GET['student_name'];

?>

        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Edit Student Courses - <?php echo $student_name; ?></h1>
                <br>
                <?php   
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']); 
                    }
                ?>
                <br><br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Course Code</th>
                        <th>Course ID</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM course_student WHERE student_id='$student_id'";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE){
                        
                            $count = mysqli_num_rows($res);
                            $sn  = 1;
                            if($count > 0){
                                while($rows = mysqli_fetch_assoc($res)){
                                    $course_code = $rows['course_code'];
                                    $course_id = $rows['course_id'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $course_code; ?></td>
                                        <td><?php echo $course_id; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/edit-student-delete-course-from-student.php?student_id=<?php echo $student_id; ?>&course_id=<?php echo $course_id;?>&student_name=<?php echo $student_name;?>" class="btn btn-danger">Delete</a>                                        
                                        </td>
                                    </tr>

                                <?php
                                }

                            }else{
                                ?>
                                    <tr>
                                        <td>No Course Added</td>
                                    </tr>
                                <?php
                            }

                        }else{
                            
                        }
                    ?>
                </table>
            </div>
        </div>
        <!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>