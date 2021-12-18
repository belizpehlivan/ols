<?php include('partials/menu.php'); ?>
        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Profile</h1>
                <div class="col-4 text-left">
                    <h4>User Details</h4>
                    <br>
                    
                    <?php
                        //Query to get all admin
                        $act_user = $_SESSION['user'];
                        $sql = "SELECT * FROM teacher WHERE username = '$act_user'";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE){
                            $count = mysqli_num_rows($res);
                            if($count == 1){
                                $rows = mysqli_fetch_assoc($res);
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];
                                $mail = $rows['mail'];
                                $id = $rows['id'];
                        
                                ?>
                                
                                Name: <span class="font-small"><?php echo $full_name; ?></span><br><br>            
                                Username: <span class="font-small"><?php echo $username; ?></span><br><br>
                                Mail: <span class="font-small"><?php echo $mail; ?></span><br><br>
                                <?php
                            }
                            else{
                                    echo  "<br>No Course";
                            }
                            
                        }
                    ?>
                    </div>
                    <div class="col-4 text-left">
                        <h4>Courses</h4>
                        <br>
                        <ul class="text-left">
                            <?php
                                $sql2 = "SELECT * FROM course WHERE instructor_id = '$id'";
                                $res2 = mysqli_query($conn, $sql2);
                                if($res2==TRUE){
                                    $count2 = mysqli_num_rows($res2);
                                    if($count2 > 0){
                                        while($rowscourse = mysqli_fetch_assoc($res2)){
                                            $course_code = $rowscourse['code'];
                                            ?>
                                              <li class="margin-2"><?php echo $course_code; ?></li>
                                            <?php
                                        }
                                    }else{
                                         //no course
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--Main Content Section Ends-->

<?php include('partials/footer.php'); ?>

