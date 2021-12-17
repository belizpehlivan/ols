<?php 

include('../config/constants.php');

// Get de ID of the admin to be deleted
echo $id = $_GET['id'];

// Create sql query to delete admin
$sql = "DELETE FROM admin WHERE id=$id";

// Execute the query
$res = mysqli_query($conn, $sql);

// Check whether the query executed successfully or not
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
// Redirect to manage admin page with messg success or failed

//

?>
