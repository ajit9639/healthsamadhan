<?php
include "conn.php";
$uid = $_SESSION['myunique_id'];

// echo "update notification_doctor set status=1 where to_id=$uid";exit;

mysqli_query($conn,"update notification_doctor set status=1 where to_id=$uid");
?>