<?php include('partials/menu.php'); ?>

    <!--Main Content Sectiopn Starts-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Mail</h1>

            <br><br>

            <?php
                // 1.Get the ID of selected admin
                $id = $_GET['id'];
            ?>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>New Mail:</td>
                        <td>
                            <input type="text" name="new_mail" placeholder="New mail">
                        </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="password" placeholder="Please enter password">
                        </td>
                    </tr>
                    <tr>
                        <td class="colspan=2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!--idyi yukardaki phpde aldık-->
                            <input type="submit" name="submit" value="Change Mail" class="btn btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php

    // Check  whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        
        // 1. Get data from FORM
        $id = $_POST['id'];
        $password = md5($_POST['password']);
        $new_mail = $_POST['new_mail'];

        // 2. SQL query to check whether the user with current ID and current Password exists
        $sql = "SELECT *  FROM teacher WHERE id=$id AND password = '$password'";

        // Execute Query
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==TRUE){
            
            //Check whether data is available or not
            $count = mysqli_num_rows($res);
            if($count==1){
                //User exists 
                $sql2 = "SELECT * FROM teacher WHERE mail='$new_mail'";
                $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
                $count2 = mysqli_num_rows($res2);
                
                if($count2 != 0){
                    $_SESSION['update-mail'] = "Mail is already exists.";
                    header('location:'.SITEURL.'teacher/profile.php');
                }
                else{
                    $sql3 = "UPDATE teacher SET
                    mail = '$new_mail'
                    WHERE id = '$id'
                    ";
                     $res3 = mysqli_query($conn, $sql3) or die(mysqli_error());
                     if($res3==TRUE){
                         $_SESSION['update-mail'] = "Mail is changed successfully.";
                         header("location:".SITEURL."teacher/profile.php");
                     }else{
                         $_SESSION['update-mail'] = "Failed to Update teacher";
                         header("location:".SITEURL."teacher/profile.php");
                     }
                }
            }
            else{
               
                $_SESSION['update-mail'] = "Wrong Password";
                header('location:'.SITEURL.'teacher/profile.php');
               

            }

         
        }

        // 3. 
        //Then go manage admin page and display the message
        // 4. Change Password if all above is true


    }
    else{

    }
?>
<?php include('partials/footer.php'); ?>

