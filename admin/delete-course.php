<?php 

include('../config/constants.php');

// 1.Get de ID of the admin to be deleted
$id = $_GET['id'];

// 2.Create sql query to delete admin
$sql = "DELETE FROM course WHERE id=$id";

// 3.Execute the query
$res = mysqli_query($conn, $sql);

// 4.Check whether the query executed successfully or not
if($res == TRUE){
    $sql2 = "DELETE FROM course_student WHERE course_id=$id";
    $res2 = mysqli_query($conn, $sql2);
    
    if($res2 == TRUE){
        $_SESSION['delete-course-of-student'] = "$id Course-Student Deleted Successfully";
        header('location:'.SITEURL.'admin/manage-courses.php');
    }
    else{
        $_SESSION['delete-course-of-student'] = "Failed to Delete Course";

        //Redirect to manage-admin page
        header('location:'.SITEURL.'admin/manage-courses.php');
    }
   // echo "successful";
   //Create session variable to display message 
   $_SESSION['delete'] = "Course Deleted Successfully";

   //Redirect to manage-admin page
   header('location:'.SITEURL.'admin/manage-courses.php');
}
else{
    //echo "error";
    //Create session variable to display message 
    $_SESSION['delete'] = "Failed to Delete Course";

    //Redirect to manage-admin page
    header('location:'.SITEURL.'admin/manage-courses.php');
}


?>
