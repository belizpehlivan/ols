<?php include('partials/menu.php'); ?>

        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Courses</h1>
                <?php
                    $act_user = $_SESSION['user'];
                    $sql = "SELECT * FROM student WHERE username = '$act_user'";
                    $res = mysqli_query($conn, $sql);
                    if($res==TRUE){
                        $count = mysqli_num_rows($res);
                        if($count == 1){
                            $rows = mysqli_fetch_assoc($res);
                            $id = $rows['id'];

                            $sql2 = "SELECT * FROM course_student WHERE student_id = '$id'";
                            $res2 = mysqli_query($conn, $sql2);
                            if($res2==TRUE){
                                $count2 = mysqli_num_rows($res2);
                                if($count2 > 0){
                                    while($rowscourse = mysqli_fetch_assoc($res2)){
                                        $course_code = $rowscourse['course_code'];
                                        $course_id = $rowscourse['course_id'];
                                        ?>
                                            <div class="course">
                                            <a href="course_content.php?course_id=<?php echo $course_id;?>&course_code=<?php echo $course_code;?>"><?php echo $course_code; ?></a>                                           
                                            </div>
                                        <?php
                                    }
                                }else{
                                     //no course
                                     echo "no course";
                                }
                            }
                        }
                        else{
                                //
                        }
                        
                    }
                ?>
                
                <div class="clearfix"></div>
            </div>
        </div>
        <!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>