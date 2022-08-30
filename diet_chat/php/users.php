<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];

    // echo $sql = "SELECT * FROM user_diet WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";exit;

    $emailid = $_SESSION['email'];

    // echo "SELECT * FROM `signup` WHERE `email`='$emailid'";exit;

    $get_dr = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` WHERE `email`='$emailid'"));
    // print_r($get_dr);
        $x = $get_dr['assigned_dietition'];

    // echo "SELECT * FROM user_diet WHERE `user_id`='$x'";exit;

    $sql = "SELECT * FROM user_diet WHERE `user_id`='$x'";

    
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No user_diet are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>