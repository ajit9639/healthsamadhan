<?php
session_start();
// Checking connection

if($_SERVER['SERVER_NAME']=="localhost"){
    $conn = mysqli_connect("localhost", "root", "", "health_smadhan_db");
}else{
    $conn = mysqli_connect("localhost","posigraph_yard","yard@posigraph.com","posigraph_yard");
    $ch = @mysqli_connect("localhost","posigraph_yard","yard@posigraph.com","posigraph_yard");
}

// sending sms



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>




 