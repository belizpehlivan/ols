<?php 

include('../config/constants.php');

if(isset($_GET['id'])){
    // 1.Get de ID of the admin to be deleted
    $id = $_GET['id'];

    // 2.Create sql query to delete admin
    $sql = "DELETE FROM teacher WHERE id=$id";

    // 3.Execute the query
    $res = mysqli_query($conn, $sql);

    // 4.Check whether the query executed successfully or not
    if($res == TRUE){

        $_SESSION['delete'] = "Teacher Deleted Successfully. Please change the instructor of the course where this teacher was the instructor.";
        header('location:'.SITEURL.'admin/manage-teacher.php');

        $sql2 =  "UPDATE course SET instructor_id = NULL WHERE  instructor_id = $id";
        $res2 = mysqli_query($conn, $sql2);
    }
    else{
        //echo "error";
        //Create session variable to display message 
        $_SESSION['delete'] = "Failed to Delete Teacher";

        //Redirect to manage-admin page
        header('location:'.SITEURL.'admin/manage-teacher.php');
    }
}else{
    header('location:'.SITEURL.'admin/manage-teacher.php');
}


?>
