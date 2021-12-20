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
                <?php 
                    $sql = "SELECT * FROM teacher";
                    $res = mysqli_query($conn, $sql);
                    $count_teacher = mysqli_num_rows($res);

                    $sql2 = "SELECT * FROM student";
                    $res2 = mysqli_query($conn, $sql2);
                    $count_student = mysqli_num_rows($res2);

                    $sql3 = "SELECT * FROM course";
                    $res3 = mysqli_query($conn, $sql3);
                    $count_course = mysqli_num_rows($res3);
                ?>
                <div class="col-3 text-center">
                    <h1><?php echo $count_teacher?></h1>
                    <br>
                    Teacher
                </div>
                <div class="col-3  text-center">
                    <h1><?php echo $count_student?></h1>
                    <br>
                    Student
                </div>
                <div class="col-3  text-center">
                    <h1><?php echo $count_course?></h1>
                    <br>
                    Courses
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--Main Content Section Ends-->
<?php include('partials/footer.php'); ?>