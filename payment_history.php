<?php 

include "aside_structure.php";
?>

<style>
.appointment{
    padding-top: 100px;
}
.my_appointment .appoint_frame .date{
    width: 100%;
}
</style>

<section class="appointment">
<div class="container-fluid">

<p>Payment History</p>

<?php
// $x = $_SESSION['email'];
// $get = mysqli_query($conn , "SELECT * FROM `appointment` where `ref_id`='$x'");

// while($get1 = mysqli_fetch_assoc($get)){
// $t = $get1['time'];
// $t1 = date("g:i a", strtotime("$t"));

// $d = $get1['date'];
// $d1 = date("d-m-Y", strtotime($d));
?>

<div class="my_appointment">
    <div class="appoint_frame">
        <div class="date">
            <p>Payment Date : 20-04-202</p>
            <p>Payment Time : 12:30 PM</p>
            <p>Package name : Blood pressure</p>
        </div>

        <!-- <div class="title">
           
            
        </div> -->
    </div>
</div>
<?php //} ?>



</div>
</section>

<?php include 'footer.php' ?>
</body>

</html>