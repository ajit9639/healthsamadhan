<?php
session_start();
include "conn.php";



 if(isset($_POST['$countryid'])){
 $cid=$_POST['$countryid'];

  $query=mysqli_query($conn,"select * from sub_category where category_name='$cid'"); ?>
<option>Select Product Sub</option>
  <?php
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['sno'];?>"><?php echo $rw['sub_category_name'];?></option>
                  

<?php }} 
