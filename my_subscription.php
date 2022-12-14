<?php 

include "aside_structure.php";

$x = $_SESSION['email'];
// echo "SELECT * FROM `appointment` where `email`='$x'";
$get = mysqli_query($conn , "SELECT * FROM `signup` where `email`='$x'");
$get1 = mysqli_fetch_assoc($get);
$gt =  $get1['package_name'];
$gdd = $get1['tranx_date'];

$pack = mysqli_query($conn, "SELECT * FROM `package` where `id`='$gt'");
$pack1 = mysqli_fetch_assoc($pack);
$p = $pack1['package_name'];
?>



<section class="appointment mt-4">
<div class="container-fluid">
<div class="text-center">
    <span class="btn btn-info">Your Subscription Package : <?= $p ?></span>
    <span class="btn btn-info">Your Subscription Date : <?= $gdd ?></span>
    <br><br>
    <!--<span class="btn btn-info">You have total <?= $_SESSION['my_total_days']?> days , You left with <?= $_SESSION['my_left_days'] ?> days only</span>-->
</div>

</div>
</section>

<?php include 'footer.php' ?>
</body>

</html>