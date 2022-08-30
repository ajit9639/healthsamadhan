<?php
session_start();
include "conn.php";



 if(isset($_POST['$countryid'])){
 $cid=$_POST['$countryid'];

  $query=mysqli_query($conn,"select * from sub_category where category_name='$cid'"); ?>
<option value="">Select State</option>
  <?php
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['ID'];?>"><?php echo $rw['sub_category_name'];?></option>
                  

<?php }} 
