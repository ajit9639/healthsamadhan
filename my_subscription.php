<?php 

include "aside_structure.php";

$x = $_SESSION['email'];
// echo "SELECT * FROM `appointment` where `email`='$x'";
$get = mysqli_query($conn , "SELECT * FROM `signup` where `email`='$x'");
$get1 = mysqli_fetch_assoc($get);
$gt =  $get1['package_name'];

$pack = mysqli_query($conn, "SELECT * FROM `package` where `id`='$gt'");
$pack1 = mysqli_fetch_assoc($pack);
$p = $pack1['package_name'];
?>

<style>
.appointment{
    padding-top: 100px;
}
</style>

<section class="appointment">
<div class="container-fluid">
<div class="text-center">
    <a href="#" class="btn btn-info">Your Subscription package is : <?= $p ?></a>
</div>

</div>
</section>

<?php include 'footer.php' ?>
</body>

</html>