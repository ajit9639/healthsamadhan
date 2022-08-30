<?php
include "conn.php";
 
     $idd = $_GET['id'];


$query = "DELETE from `tbl_login`  WHERE id='$idd' ";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>
                        alert('Record Deleted!.');
                        window.location.href='user-profiles.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");
                      }
                      else{
                        echo "unable to delete";
                      }
                 
     
?>
 