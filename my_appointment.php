<?php 

include "aside_structure.php";
?>

<style>
.appointment{
    padding-top: 100px;
}
</style>

<section class="appointment">
<div class="container-fluid">

<a href="book_appointment.php" class="btn btn-info">Book Appointment</a>

<hr>
<p>All My Apointment</p>

<?php
$x = $_SESSION['email'];
// echo "SELECT * FROM `appointment` where `email`='$x'";
$get = mysqli_query($conn , "SELECT * FROM `appointment` where `ref_id`='$x'");

while($get1 = mysqli_fetch_assoc($get)){
$t = $get1['time'];
$t1 = date("g:i a", strtotime("$t"));

$d = $get1['date'];
$d1 = date("d-m-Y", strtotime($d));
?>
<div class="my_appointment">
    <div class="appoint_frame">
        <div class="date">
            <span><?=  $d1 ?></span>
            <small><?= $t1 ?></small>
        </div>

        <div class="title">
            <p><?= $get1['problem'] ?></p>
            
        </div>
    </div>
</div>
<?php } ?>



</div>
</section>

<?php include 'footer.php' ?>
</body>

</html>