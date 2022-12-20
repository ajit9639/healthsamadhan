<?php
// $myuniqueid = $_SESSION['myunique_id'];
// $get_num = mysqli_query($conn , "SELECT notification.to_id , user_doctor.unique_id  FROM notification , user_doctor where notification.status='0' AND notification.to_id = user_doctor.user_id");
// $get_count = mysqli_num_rows($get_num);
// if($get_count == 0){
// $msg_count = 0;
// }else{
//     $msg_count = $get_count;
// }
?>

<style>
    @media (min-width: 576px){
.modal-dialog1 {
    max-width: 1300px!important;
    margin: 0px;
}
    }
</style>


<?php
error_reporting(0);
if(!isset($_SESSION['email'])){
    echo "<script>
    location.href = 'login.php';
    </script>";
}

// echo "<pre>";
// print_r($_SESSION);

?>

<div class="header">
    <div class="container-fluid theme-container">
        <div class="top-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <a href="index.php">
                        <img src="assets/img/logo.png" alt="logo" class="header-logo">
                    </a>
                </div>
                <div class="col">
                    <div class="header-search">
                        <!-- <form action="#">
                            <input class="form-control custom-search"
                                placeholder="Search for Medicines and Health Products" type="text">
                        </form> -->
                    </div>
                </div>
                <div class="col-auto">
                    <ul class="header-right-options">


                        <li class="dropdown">
                            <button id="dropdownCartButton" class="btn dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="list-icon">
                                    <i class="ti-user"></i>

                                    <?php echo 'Hello,'.' '. $_SESSION['my_nm']; ?>
                                    <!-- <span><i class="fa fa-angle-down drop-icon"></i></span> -->
                                </div>
                            </button>

                            <!-- <div class="dropdown-menu dropdown-menu-right user-links"
                                aria-labelledby="dropdownMenuButton">
                                <ul>
                                    <li>
                                        <a href="account.php">
                                            Account
                                        </a>
                                    </li>
                                    
                                    <li id="user_logout">
                                        <a href="logout.php">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </li>


                        <!-- <li>
                            <a href="upload-prescription.html" class="btn btn-primary btn-sm">Upload</a>
                        </li> -->
                        
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>



<?php
include 'conn.php';

$package_query = "SELECT * FROM `package`";
$package_query_res = mysqli_query($conn,$package_query);


$val = $_SESSION['email']; 
$query = mysqli_query($conn ,  "SELECT * FROM `signup` WHERE `email` = '$val'");
$row = mysqli_fetch_assoc($query);

$user_name = $row['first_name'];
$user_email = $row['email'];
$user_phone = $row['phone_number'];
$user_address = $row['address'];

$pack_id = $row['package_name'];
$query2 = mysqli_query($conn ,  "SELECT * FROM `package` WHERE `id` = '$pack_id'");
$row2 = mysqli_fetch_assoc($query2);

// give 1 month before alert
// $purchase_date = $row2['tranx_date'];    
// $month  = 2;
// $before = $month-1;
// $days = 30 * $month ;
// $curr_date = date('Y-m-d', time());
// $before_date=date("Y-m-d",strtotime("+$before month",strtotime(date("Y-m-d",strtotime($purchase_date) ) )));
// if($before_date == $curr_date)
// { 
//     echo '<h1> you have left one month for expiration of your package.</h1>';
// }
// else
// {
//     echo"<h1>You have total $days days</h1>";
// }
// give 1 month before alert //


$purchase_date = $row['tranx_date']; 
$month  = $row2['package_duration'];
$month1 = '+'.$month.' month';
$dt = strtotime($purchase_date);
$renew_dt = date("Y-m-d", strtotime($month1, $dt));

// total no of days calculation
$datediff = strtotime($renew_dt) - strtotime($purchase_date);
$days = round($datediff / (60 * 60 * 24));

// left no days calculation
$cur_date = date('Y-m-d', time());
// $dt1 = (strtotime($renew_dt) - strtotime($cur_date)); 
//echo $lt =date('Y-m-d',strtotime($purchase_date));
$left = (strtotime($cur_date) - strtotime($purchase_date));
$left_day = round($left / (60 * 60 * 24));
if($left_day >= 0)
$left_days = $days - $left_day;
else
$left_days = $days + $left_day;

$_SESSION['my_left_days'] = $left_days;
$_SESSION['my_total_days'] = $days;

if($cur_date > $renew_dt)
{  ?>
    <div class="modal show" id="myModal" style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog1 modal-xl">
      <div class="modal-content bg-danger">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-light">Package Expired</h4>
          
        </div>
  
        <!-- Modal body -->
        <div class="modal-body text-light">
          Your Package has been Expired Please Renue Your Package 
        </div>      



        <div class="p-4">
        <div class="container">
        <form action="renue_package_pay/index.php" method="POST">

<div class="form-group">
  <label for="usr" class="text-light">Select Your Package:</label>      
  <select type="text" name="package_name" id="package" required="true"
                            onChange="getsate(this.value)" class="form-control">
                            <option value="">Select Package</option>
                            <?php $query=mysqli_query($conn,"select * from `package`");
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>
                            <option value="<?php echo $row['id'];?>">
                                <?php echo $row['package_name'];?></option>
                            <?php } ?>
                        </select>
  </div>

  <div class="form-group">
    <label for="">Amount</label>
    <div id="package_amount"></div>
  </div>

  <input type="hidden" name="user_name" value="<?= $user_name ?>">
  <input type="hidden" name="user_email" value="<?= $user_email ?>">
  <input type="hidden" name="user_phone" value="<?= $user_phone ?>">
  <input type="hidden" name="user_address" value="<?= $user_address ?>">
  <input type="hidden" name="user_rand" value="<?= rand(999,9999) ?>">

  <button type="submit" class="btn btn-primary" name="renue">Renue</button>
</div>

    </form>
        </div>
      </div>
    </div>
  </div>
<?php }else{ 
    if($purchase_date > $cur_date) {?>
    <!-- <h1>You have total <?= $days ?> days , but you left with <?= $left_days ?> days</h1>     -->
    <?php } else { ?>
    <!-- <h1>You have total <?= $days ?> days , but you left with <?= $left_days ?> days</h1>    -->
<?php } }
?>




<script>
    
    function getsate(val) {
        $.ajax({
            type: "POST",
            url: "get_package_amount.php",
            data: '$packageid=' + val,
            success: function(data) {
                $("#package_amount").html(data);
            }

        });
    }
</script>