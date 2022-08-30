<style>
    .dashboard-page{
    background: url('assets/img/category/dr.png');
    background-size: cover;
    /* height: 100vh; */
    }
</style>
<?php 
include 'conn.php';
include 'head.php' ;

                $emailid = $_SESSION['email'];
                $get_dr = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` WHERE `email`='$emailid'"));
                $x = $get_dr['assigned_doctor'];
                $y = $get_dr['assigned_dietition'];
                $z = $get_dr['assigned_healthexpert'];


               
                $get_dr1 = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_doctor` WHERE `user_id`='$x'"));
                $x1 = $get_dr1['unique_id'];

                $get_dr2 = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_diet` WHERE `user_id`='$y'"));
                $x2 = $get_dr2['unique_id'];

                $get_dr3 = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_healthexpert` WHERE `user_id`='$z'"));
                $x3 = $get_dr3['unique_id'];

                
                ?>


<body>

   <?php include 'header.php' ?>

   <?php include 'mobile-header.php' ?>

    <div class="dashboard-page">
        <div class="container-fluid">
               
            <div class="row">
                <div class="col-lg-3 col-6 mt-4">
                    <div class="product-brand">
                        <a href="recipes.php" class="product-img">
                            <img src="assets/img/category/recipie.png" class="" alt="">
                        </a>
                        <a href="recipes.php" class="product-info">
                            Recipes
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-4">
                    <div class="product-brand">
                        <a href="education-category.php" class="product-img">
                            <img src="assets/img/category/edu.png" class="" alt="">
                        </a>
                        <a href="education-category.php" class="product-info">
                            Education
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-4">
                    <div class="product-brand">
                        <a href="add_vitals_meal_pattern.php" class="product-img">
                            <img src="assets/img/category/vital1.png" class="" alt="">
                        </a>
                        <a href="add_vitals_meal_pattern.php" class="product-info">
                            Add Vitals
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6 mt-4">
                    <div class="product-brand">

                        <a href="doctor_chat/chat.php?user_id=<?= $x1?>" class="product-img">
                            <img src="assets/img/category/chat_dr.png" class="" alt="">
                        </a>
                        <a href="doctor_chat/chat.php?user_id=<?= $x1?>" class="product-info">
                            Chat with doctor 
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-4">
                    <div class="product-brand">
                        <a href="diet_chat/chat.php?user_id=<?= $x2?>" class="product-img">
                            <img src="assets/img/category/chat_diet.png" class="" alt="">
                        </a>
                        <a href="diet_chat/chat.php?user_id=<?= $x2?>" class="product-info">
                            Chat with diet expert
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-4">
                    <div class="product-brand">
                        <a href="healthexpert_chat/chat.php?user_id=<?= $x3?>" class="product-img">
                            <img src="assets/img/category/chat_exer.png" class="" alt="">
                        </a>
                        <a href="healthexpert_chat/chat.php?user_id=<?= $x3?>" class="product-info">
                            Chat with excise expert
                        </a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    

    <?php include 'footer.php' ?>

