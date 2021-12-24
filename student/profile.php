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
                        $sql = "SELECT * FROM student WHERE username = '$act_user'";
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
                                <a href="<?php echo SITEURL;?>student/update-password.php?id=<?php echo $id; ?>" class="btn btn-grey">Change Password</a>
                                <?php
                            }
                            else{
                                    echo  "<br>No Course";
                            }
                            
                        }
                    ?>
                    </div>
                    
                <div class="clearfix"></div>
            </div>
        </div>
        <!--Main Content Section Ends-->

<?php include('partials/footer.php'); ?>

