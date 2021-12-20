<?php include('partials/menu.php'); ?>

        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Courses</h1>
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
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Course Code</th>
                        <th>Course ID</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        //Query to get all
                        $sql = "SELECT * FROM course_student";

                        //Execute the query
                        $res = mysqli_query($conn, $sql);

                        //Check whether the query is executed or not
                        if($res==TRUE){
                            //Count Rows we have data in db
                            $count = mysqli_num_rows($res);

                            $sn  = 1;

                            //Check the num of rows
                            if($count > 0){

                                while($rows = mysqli_fetch_assoc($res)){
                                    //Using while loop to get all data from database
                                    //Loop will run as long as we data in database
                                    //Get individual data
                                    $student_id = $rows['student_id'];
                                    $student_name = $rows['student_name'];
                                    $course_id = $rows['course_id'];
                                    $course_code = $rows['course_code'];
                                    //$instructor_id = $rows['instructor_id'];

                                    //Display the values in the table
                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $student_name; ?></td>
                                        <td><?php echo $student_id; ?></td>
                                        <td><?php echo $course_code; ?></td>
                                        <td><?php echo $course_id; ?></td>
                                        <!-- <td><?php echo $instructor_id; ?></td> -->
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/delete-course-from-student.php?student_id=<?php echo $student_id; ?>&course_id=<?php echo $course_id;?>" class="btn btn-danger">Delete</a>                                        
                                        </td>
                                    </tr>

                                    <?php
                                }

                            }else{
                                // We dont have data
                                ?>
                                    <tr>
                                        <td colspan="4">No Course Added</td>
                                    </tr>
                                <?php
                            }

                        }

                    ?>
                </table>
            </div>
        </div>
        <!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>