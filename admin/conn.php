<?php
// session_start();
// Checking connection

    $conn = mysqli_connect("localhost", "root", "", "health_smadhan_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>