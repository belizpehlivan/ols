<?php include('partials/menu.php'); ?>
        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Profile</h1>
                <br>
                <?php   
                    if(isset($_SESSION['update-mail'])){
                        echo $_SESSION['update-mail'];
                        unset($_SESSION['update-mail']); 
                    }
                    if(isset($_SESSION['change-pwd'])){
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']); 
                    }
                    if(isset($_SESSION['user-not-found'])){
                        echo $_SESSION['user-not-found'];
                        unset( $_SESSION['user-not-found']); 
                    }
                    if(isset($_SESSION['pwd-not-match'])){
                        echo $_SESSION['user-not-found'];
                        unset( $_SESSION['user-not-found']); 
                    }
                ?>
                <br>
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
                                Mail: <span class="font-small"><?php echo $mail; ?></span>  <a href="<?php echo SITEURL;?>teacher/update-mail.php?id=<?php echo $id; ?>" class="btn btn-grey">Change Mail</a> <br><br>
                                <a href="<?php echo SITEURL;?>teacher/update-password.php?id=<?php echo $id; ?>" class="btn btn-grey">Change Password</a>

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

