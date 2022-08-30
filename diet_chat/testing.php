<?php 
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "health_smadhan_db");
  // if(isset($_SESSION['unique_id'])){
  //   header("location: users.php");
  // }
  echo $ran_id = rand(100, 100000000);
?>

<?php include "header.php"; ?>

</html>
