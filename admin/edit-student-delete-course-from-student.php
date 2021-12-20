<?php 

include('../config/constants.php');

// 1.Get de ID of the admin to be deleted
$student_id = $_GET['student_id'];
$student_name = $_GET['student_name'];
$course_id = $_GET['course_id'];

// 2.Create sql query to delete admin
$sql = "DELETE FROM course_student WHERE course_id = '$course_id' AND student_id = '$student_id'";

// 3.Execute the query
$res = mysqli_query($conn, $sql);

// 4.Check whether the query executed successfully or not
if($res == TRUE){
   
   //Create session variable to display message 
   $_SESSION['delete'] = "Course Deleted from the Student Successfully";

   header('location:'.SITEURL.'admin/edit-student-course.php?student_id='.$student_id.'&student_name='.$student_name);
}
else{

    $_SESSION['delete'] = "Failed to Delete";
    header('location:'.SITEURL.'admin/edit-student-course.php');
}


?>
