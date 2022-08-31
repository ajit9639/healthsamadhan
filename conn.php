<?php
session_start();
// Checking connection

if($_SERVER['SERVER_NAME']=="localhost"){
    $conn = mysqli_connect("localhost", "root", "", "health_smadhan_db");
}else{
    $conn = mysqli_connect("localhost", "posigraph_health_smadhan", "xC3Eug~T$+ps", "posigraph_health_smadhanDB");
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>