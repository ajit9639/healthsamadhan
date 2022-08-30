<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    // $sql = "SELECT * FROM user_healthexpert WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $emailid = $_SESSION['email'];

    $get_dr = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` WHERE `email`='$emailid'"));
    $x = $get_dr['assigned_healthexpert'];
    
    $sql = "SELECT * FROM user_healthexpert WHERE `user_id`='$x'";

    
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No user_healthexpert are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>