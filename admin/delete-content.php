<?php 

include('../config/constants.php');

echo $course_id = $_GET['course_id'];
echo $course_code = $_GET['course_code'];

$content_id = $_GET['id'];
$sql = "DELETE FROM course_content WHERE id = '$content_id'";
$res = mysqli_query($conn, $sql);

if($res == TRUE){
   $_SESSION['delete'] = "Content Deleted Successfully";
   header('location:'.SITEURL.'admin/course_content.php?course_id='  . $course_id  . '&course_code=' . $course_code);
}
else{
    $_SESSION['delete'] = "Failed to Delete";
    header('location:'.SITEURL.'admin/course_content.php?course_id='  . $course_id  . '&course_code=' . $course_code);
}


?>
