<?php
include "conn.php";
$uid = $_SESSION['myunique_id'];
mysqli_query($conn,"update notification_dietition set status=1 where to_id=$uid");
?>