<?php 

include('../config/constants.php');

// 1.Get de ID of the admin to be deleted
$id = $_GET['id'];

// 2.Create sql query to delete admin
$sql = "DELETE FROM admin WHERE id=$id";

// 3.Execute the query
$res = mysqli_query($conn, $sql);

// 4.Check whether the query executed successfully or not
if($res == TRUE){
   // echo "successful";
   //Create session variable to display message 
   $_SESSION['delete'] = "Admin Deleted Successfully";

   //Redirect to manage-admin page
   header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    //echo "error";
    //Create session variable to display message 
    $_SESSION['delete'] = "Failed to Delete Admin";

    //Redirect to manage-admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}


?>
