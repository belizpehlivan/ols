<?php include('partials/menu.php'); ?>

        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Teacher</h1>
                <br>
                <?php   
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); 
                    }
                ?>

                <br><br>

                <!-- Button to Add Admin-->
                <a href="<?php echo SITEURL; ?>admin/add-teacher.php" class="btn btn-primary">Add Teacher</a>
                <br><br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Beliz Pehlivan</td>
                        <td>belizpehlivan</td>
                        <td>
                            <a href="#" class="btn btn-secondary">Update</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Beliz Pehlivan</td>
                        <td>belizpehlivan</td>
                        <td>
                            <a href="#" class="btn btn-secondary">Update</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Beliz Pehlivan</td>
                        <td>belizpehlivan</td>
                        <td>
                            <a href="#" class="btn btn-secondary">Update</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                       
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>