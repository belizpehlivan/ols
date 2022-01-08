<?php include('partials/menu.php'); 

    $course_id = $_GET['course_id'];
    $course_code = $_GET['course_code'];
    $course_name = $_GET['course_name'];
?>

<!--Main Content Sectiopn Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Course Content - <?php echo $course_code . " " . $course_name;?></h1>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Open</th>
            </tr>
        <?php
            
            $sql = "SELECT * FROM course_content WHERE course_code = '$course_code'";
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
                                <td><?php echo $title; ?></td>
                                <td><a href="../uploads/<?php echo $filename; ?>"><?php echo $filename; ?></a></td>
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

<?php include('partials/footer.php'); ?>