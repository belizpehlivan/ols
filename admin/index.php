<?php include('partials/menu.php'); ?>

        <!--Main Content Sectiopn Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>
                <br><br>
                <?php   
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login']; // Display session message
                        unset($_SESSION['login']); // Remove session message
                    }
                ?>
                <br>
                <div class="col-3 text-center">
                    <h1>20</h1>
                    <br>
                    Teacher
                </div>
                <div class="col-3  text-center">
                    <h1>20</h1>
                    <br>
                    Student
                </div>
                <div class="col-3  text-center">
                    <h1>20</h1>
                    <br>
                    Courses
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>