<?php
include "conn.php";
 
     $id = $_GET['id'];


$query = "DELETE from `user`  WHERE sno='$id' ";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>
                        alert('Record Deleted!.');
                        window.location.href='reg-users.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");
                      }
                      else{
                        echo "unable to delete";
                      }
                 
     
?>
 