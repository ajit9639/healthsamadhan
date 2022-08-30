<?php 
include "conn.php";
$id = $_GET['id'];
$type = $_GET['type'];
$doctorid = $_GET['doctorid'];

// echo "<pre>";
// print_r($_GET);
// exit;


if($type == 'doctor'){
$update = mysqli_query($conn , "UPDATE `signup` SET `assigned_doctor`='$doctorid' WHERE `id`='$id'");
echo "<script>window.location.replace('view_user.php')</script>";
} elseif($type == 'health') {
    // echo "UPDATE `signup` SET `assigned_healthexpert`='$doctorid' WHERE `id`='$id'";exit;
$update = mysqli_query($conn , "UPDATE `signup` SET `assigned_healthexpert`='$doctorid' WHERE `id`='$id'");
echo "<script>window.location.replace('view_user.php')</script>";
}else{
$update = mysqli_query($conn , "UPDATE `signup` SET `assigned_dietition`='$doctorid' WHERE `id`='$id'");
echo "<script>window.location.replace('view_user.php')</script>";
}

?>