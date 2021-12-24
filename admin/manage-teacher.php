<?php include('partials/menu.php'); ?>

        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Teacher</h1>
                <br>
                <?php   
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); 
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']); 
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset( $_SESSION['update']); 
                    }
                ?>

                <br><br>

                <!-- Button to Add Admin-->
                <a href="<?php echo SITEURL; ?>admin/add-teacher.php" class="btn btn-primary">Add Teacher</a>
                <br><br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Mail</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        //Query to get all admin
                        $sql = "SELECT * FROM teacher";

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
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];
                                    $mail = $rows['mail'];

                                    //Display the values in the table
                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $mail; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update-teacher.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-teacher.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                                            <a href="<?php echo SITEURL;?>admin/list-teacher-courses.php?id=<?php echo $id; ?>&name=<?php echo $full_name; ?>" class="btn btn-grey">List Courses</a>
                                        </td>
                                    </tr>

                                    <?php
                                }

                            }else{
                                // We dont have data
                                ?>
                                    <tr>
                                        <td colspan="6">No Teacher Added</td>
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