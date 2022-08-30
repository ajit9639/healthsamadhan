<?php
include "conn.php";
 
      $idd = $_GET['id'];


$query = "DELETE from `sub_category`  WHERE sno='$idd' ";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>
                        alert('Record Deleted!.');
                        window.location.href='all_categories.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");
                      }
                      else{
                        echo "<script>
                        alert('Unable to Delete Record! Please try again.');
                        window.location.href='all_categories.php';</script>";
                      }
                 
     
?>
 