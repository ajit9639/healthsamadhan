<?php 

include "aside_structure.php";
?>

<style>

.my_appointment .appoint_frame .date{
    width: 100%;
}
</style>

<section class="appointment">
<div class="container-fluid">

<p>Payment History</p>

<?php



$x = $_SESSION['email'];
$get = mysqli_query($conn , "SELECT * FROM `signup` where `email`='$x'");

$get1 = mysqli_fetch_assoc($get);

$txndt = $get1['tranx_date'];
$txnid = $get1['tranx_id'];
$package = $get1['package_name'];
$trans = $get1['tranx_id'];

$pack = mysqli_query($conn , "SELECT * FROM `package` where `id`='$package'");
$pack1 = mysqli_fetch_assoc($pack);
$pack_nm = $pack1['package_name'];
$pack_amt = $pack1['package_amount'];
$pack_dur = $pack1['package_duration'];

?>

<div class="my_appointment">
    <div class="appoint_frame">
        <div class="date">
            <p>Payment Date : <?= $txndt ?></p>
            <p>Package name : <?= $pack_nm ?></p>
            <p>Payment Amount : Rs <?= $pack_amt ?></p>
            <p>Transaction Number : <?= $trans  ?></p>
            
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