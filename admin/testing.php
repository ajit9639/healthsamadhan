<?php include "conn.php"; 

$data = mysqli_query($conn,"SELECT * FROM `users_payment`");
while($all_rows = mysqli_fetch_assoc($data))                     
{
    echo $all_rows['sno'].'<br>';
}




?>