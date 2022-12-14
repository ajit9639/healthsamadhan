<?php
include "conn.php";
// print_r($_GET);
// exit;

$getid = $_GET['id'];
$getstatus = $_GET['status'];


$sql = "UPDATE `signup` SET `user_status`='$getstatus' where `id`='$getid'";
$query = mysqli_query($conn , $sql);
if($query){
    echo "<script>
    
    alert('Data updated success');
    location.replace('view_user.php');
    </script>";
}
?>