<?php include('partials/menu.php'); ?>

        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Courses</h1>
                <br>
                <?php   
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); 
                    }
                    if(isset($_SESSION['instructor-not-found'])){
                        echo $_SESSION['instructor-not-found'];
                        unset($_SESSION['instructor-not-found']); 
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
                <a href="<?php echo SITEURL; ?>admin/add-course.php" class="btn btn-primary">Add Course</a>
                <br><br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Course Code</th>
                        <th>Instructor Name</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        //Query to get all
                        $sql = "SELECT * FROM course";

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
                                    $code = $rows['code'];
                                    $instructor_id = $rows['instructor_id'];

                                    //Display the values in the table
                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $code; ?></td>
                                        <td><?php echo $instructor_id; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update-course.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-course.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>                                        </td>
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