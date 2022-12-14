<?php

include('conn.php');


 if(isset($_POST['$packageid'])){
   
   $cid = $_POST['$packageid'];

  $query = mysqli_query($conn,"SELECT * FROM `package` where `id` = '$cid'"); ?>
  <?php
    while($rw = mysqli_fetch_array($query))
    {
     ?>      
 <input type="text" name="amount" value="<?php echo $rw['package_amount'];?>.00"  class="form-control" required readonly/>
                  
<?php }} 