<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      

<?php

// doctor notification
    include "conn.php";    

    error_reporting(0);

    $myuid = $_SESSION['myunique_id'];
    // echo "select user_doctor.fname,notification_doctor.message from user_doctor,notification_doctor where notification_doctor.status=0 and notification_doctor.to_id='$myuid' and user_doctor.unique_id=notification_doctor.from_id";exit;
    $res_message_doctor = mysqli_query($conn,"select user_doctor.fname,notification_doctor.message from user_doctor,notification_doctor where notification_doctor.status=0 and notification_doctor.to_id='$myuid' and user_doctor.unique_id=notification_doctor.from_id");
    $unread_count_doctor = mysqli_num_rows($res_message_doctor);

    // dietition notification
    $res_message_diet = mysqli_query($conn,"select user_doctor.fname,notification_dietition.message from user_doctor,notification_dietition where notification_dietition.status=0 and notification_dietition.to_id='$myuid' and user_doctor.unique_id=notification_dietition.from_id");
    $unread_count_diet = mysqli_num_rows($res_message_diet);

    // health expert notification    
    $res_message_health = mysqli_query($conn,"select user_doctor.fname,notification_healthexpert.message from user_doctor,notification_healthexpert where notification_healthexpert.status=0 and notification_healthexpert.to_id='$myuid' and user_doctor.unique_id=notification_healthexpert.from_id");
    $unread_count_health = mysqli_num_rows($res_message_health);

?>


<style>
.dashboard-page {
    /* background: url('assets/img/category/dr.png'); */
    background: #ccc;
    background-size: cover;
    padding: 35px 0px;
}
</style>

<?php
// if(!isset($_SESSION['email'])){
//     echo "<script>
//     location.href = 'login.php';
//     </script>";
// }


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

    <!-- web view nav -->



   


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

                        <a href="doctor_chat/chat.php?user_id=<?= $x1?>" class="product-img" id="notifications_button_doctor">
                            <img src="assets/img/category/chat_dr.png" class="" alt="">
                        </a>
                        <a href="doctor_chat/chat.php?user_id=<?= $x1?>" class="product-info"  id="notifications_button_doctor">
                            Chat with doctor  <span class="badge badge-success p-2" >  <?= $unread_count_doctor ?> </span>
                        </a>                        
                    </div>
                </div>


                <div class="col-lg-3 col-6 mt-4">
                    <div class="product-brand" >
                        <a href="diet_chat/chat.php?user_id=<?= $x2?>" class="product-img" id="notifications_button_diet">
                            <img src="assets/img/category/chat_diet.png" class="" alt="">
                        </a>
                        <a href="diet_chat/chat.php?user_id=<?= $x2?>" class="product-info"  id="notifications_button_diet">
                            Chat with diet expert <span class="badge badge-success p-2">  <?= $unread_count_diet ?> </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-4">
                    <div class="product-brand">
                        <a href="healthexpert_chat/chat.php?user_id=<?= $x3?>" class="product-img" id="notifications_button_health">
                            <img src="assets/img/category/chat_exer.png" class="" alt="">
                        </a>
                        <a href="healthexpert_chat/chat.php?user_id=<?= $x3?>" class="product-info" id="notifications_button_health">
                            Chat with excise expert  <span class="badge badge-success p-2">   <?= $unread_count_health ?> </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>




    
    <!-- change status of doctor status -->
    <script>
      $(document).ready(function () {
          $('#notifications_button_doctor').hover(function () {
              jQuery.ajax({
				url:'update_message_status_doctor.php',
				success:function(){
					// $('#notifications_doctor').fadeToggle('fast', 'linear');
				}
			  })
              return false;
          });
          $(document).click(function () {
          });
      });
   </script>

   <!-- change status of dietition status -->
   <script>
      $(document).ready(function () {
          $('#notifications_button_diet').hover(function () {
              jQuery.ajax({
				url:'update_message_status_diet.php',
				success:function(){
					// $('#notifications_diet').fadeToggle('fast', 'linear');
				}
			  })
              return false;
          });
          $(document).click(function () {
          });
      });
   </script>

   <!-- change status of health status -->
   <script>
      $(document).ready(function () {
          $('#notifications_button_health').hover(function () {
              jQuery.ajax({
				url:'update_message_status_health.php',
				success:function(){
					// $('#notifications_health').fadeToggle('fast', 'linear');
				}
			  })
              return false;
          });
          $(document).click(function () {
          });
      });
   </script>


    <?php include 'footer.php' ?>

