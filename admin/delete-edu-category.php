<?php
include "conn.php";
 
      $idd = $_GET['id'];


$query = "DELETE from `category_edu`  WHERE sno='$idd' ";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>
                        alert('Record Deleted!.');
                        window.location.href='all_edu_category.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");
                      }
                      else{
                        echo "<script>
                        alert('Unable to Delete Record! Please try again.');
                        window.location.href='all_edu_category.php';</script>";
                      }
                 
     
?>
 