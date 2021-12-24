<?php include('partials/menu.php'); 
    echo $teacher_id = $_GET['teacher_id'];
    echo $course_id = $_GET['course_id'];
    echo $course_code = $_GET['course_code'];
?>

<!--Main Content Sectiopn Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Course Content - <?php echo $course_code;?></h1>
        <?php   
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload']; // Display session message
                unset($_SESSION['upload']); // Remove session message
            }
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; // Display session message
                unset($_SESSION['add']); // Remove session message
            }
        ?>
        <br><br>
        <form action="" method="post" enctype="multipart/form-data">
            Upload File:
            <input type="file" name="file">
            <input type="text" name="title" placeholder="File Title">
            <input type="submit" name="save" value="Upload">
        </form>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Content ID</th>
                <th>Title</th>
                <th>Open</th>
                <th>Actions</th>
            </tr>
        <?php
            
            $sql = "SELECT * FROM course_content WHERE course_id = '$course_id'";
            $res = mysqli_query($conn, $sql);
            if($res==TRUE){
                $count = mysqli_num_rows($res);
                $sn=1;
                if($count > 0){
                    while($rows = mysqli_fetch_assoc($res)){
                        
                        $title = $rows['title'];
                        $filename = $rows['file_name'];
                        $content_id = $rows['id'];
                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $content_id; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><a href="../uploads/<?php echo $filename; ?>"><?php echo $title; ?></a></td>
                                <td><a href="<?php echo SITEURL;?>teacher/delete-content.php?id=<?php echo $content_id; ?>&teacher_id=<?php echo $teacher_id;?>&course_id=<?php echo $course_id;?>&course_code=<?php echo $course_code;?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php
                    }
                }
                else{
                    ?>
                    <tr>
                        <td>No file added.</td>
                    </tr>
                    <?php
                }
                
            }
        ?>
        </table>
    </div>
</div>
<!--Main Content Section Ends-->

<?php 
    if(isset($_POST['save'])){

        $title = $_POST['title'];
        if(isset($_FILES['file']['name']))
        {
            //To upload file we need image name, source path and destination path
            $file_namee = $_FILES['file']['name'];
            $source_path = $_FILES['file']['tmp_name'];
            $destination_path = "../uploads/".$file_namee;

            $upload = move_uploaded_file($source_path, $destination_path);

                //Check whether the image is uploaded or not
                //And if the image is not uploaded then we will stop the process and redirect with error message
            if($upload==false)
            {
                    //SEt message
                $_SESSION['upload'] = "<div class='error'>Failed to Upload File. </div>";
                    //Redirect to Add CAtegory Page
                header('location:'.SITEURL.'teacher/course_content.php?teacher_id='. $teacher_id . '&course_id=' . $course_id . '&course_code=' . $course_code);
                    //STop the Process
                die();
            }
        }
        else
        {
            //Don't Upload Image and set the file_namee value as blank
            $file_namee="";
        }

        $sql = "INSERT INTO course_content SET 
                    course_id='$course_id',
                    file_name='$file_namee',
                    instructor_id ='$teacher_id',
                    title = '$title'
                ";

                //3. Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql);

                //4. Check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query Executed and Category Added
                    $_SESSION['add'] = "<div class='success'>File Added Successfully.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'teacher/course_content.php?teacher_id='. $teacher_id . '&course_id=' . $course_id . '&course_code=' . $course_code);                
                }
                else
                {
                    //Failed to Add CAtegory
                    $_SESSION['add'] = "<div class='error'>Failed to Add File.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'teacher/course_content.php?teacher_id='. $teacher_id . '&course_id=' . $course_id . '&course_code=' . $course_code);                
                }
    }
?>
<?php include('partials/footer.php'); ?>