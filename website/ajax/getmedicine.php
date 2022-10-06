<?php

include "../../conn.php";

$data = $_GET['data'];
$query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `medicines` where `product_name`='$data'"));
// $select = mysqli_fetch_assoc($query);
echo json_encode($query);
?>