<?php include('partials/menu.php'); ?>

<?php   
    $id = $_GET['id'];
    $name = $_GET['name'];
?>
        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>List Courses - Teacher: <?php echo $id;?> - <?php echo $name;?></h1>
                <br>
                <p>If you want to edit the courses assigned to the teacher, please go to the Courses tab.</p>
               
                <br><br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Course ID</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                    </tr>
                    <?php 
                        //Query to get all
                        $sql = "SELECT * FROM course WHERE instructor_id='$id'";

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
                                    $id = $rows['id'];
                                    $code = $rows['code'];

                                    $sql2 = "SELECT * FROM course WHERE id='$id'";
                                    $res2 = mysqli_query($conn, $sql2);
                                    $rows2 = mysqli_fetch_assoc($res2);
                                    $course_name = $rows2['course_name']; 

                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $code; ?></td>
                                        <td><?php echo $course_name; ?></td>
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