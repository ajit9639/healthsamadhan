<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO `messages_dietition` (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        $send_totification_dietition = mysqli_query($conn , "INSERT INTO `notification`(`from_id`, `to_id`, `message`) VALUES({$outgoing_id},{$incoming_id},'{$message}')");
        }
    }else{
        header("location: ../login.php");
    }


    
?>