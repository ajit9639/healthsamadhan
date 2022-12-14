<style>
@media(max-width:985px) {
    div.vitalscrollmenu {
        margin-top: 60px;
    }
}


div.vitalscrollmenu {
    /* background-color: #333; */
    overflow: auto;
    white-space: nowrap;
}

div.vitalscrollmenu .active {
    background: #4E97FD;
}

div.vitalscrollmenu a {
    display: inline-block;
    color: white;
    text-align: center;
    text-decoration: none;
    background-color: #777;
    border-radius: 30px;
    padding: 10px 30px;
    margin-right: 25px;
}
</style>

<?php 
include "aside_structure.php";
$my_email = $_SESSION['email'];
$get_user = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` where `email`='$my_email'"));
$getmyid = $_SESSION['myunique_id'];
$getmyname = $get_user['first_name'];

$gt_user_id = $get_user['assigned_doctor'];

$gt_diet = $get_user['assigned_dietition'];
$gt_health = $get_user['assigned_healthexpert'];

$get_my_doctor = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_doctor` where `user_id`='$gt_user_id'"));
$get_my_diet = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_diet` where `user_id`='$gt_diet'"));
$get_my_health = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_healthexpert` where `user_id`='$gt_health'"));

// doctor
$get_me = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_doctor` where `email`='$my_email'"));
$pac = $get_me['unique_id'];
$doc = $get_my_doctor['unique_id'];

// dietition
$get_me_diet = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_diet` where `email`='$my_email'"));
$pac_diet = $get_me_diet['unique_id'];
$doc_diet = $get_my_diet['unique_id'];

// healthexpert
$get_me_health = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_healthexpert` where `email`='$my_email'"));
$pac_health = $get_me_health['unique_id'];
$doc_health = $get_my_health['unique_id'];



if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $Systolic = $_POST['Systolic'];
    $Diastolic = $_POST['Diastolic'];
    $Pulse = $_POST['Pulse'];
    $user_id = $_POST['user_id'];



    $datetime = new DateTime($date);
    $dt = $datetime->format('Y-m-d');
    $tm = $datetime->format('H:i:s');
    $time = date("g:i a", strtotime($tm));

    $dte = str_replace('-', '/', $dt);
    $date = date('d-m-Y', strtotime($dte));


    $var1 = "Date : ".$date;
    $var2 = "<br>Time : ".$time;
    $var3 = "<br>Today systolic : ".$Systolic;
    $var4 = "<br>Today diastolic : ".$Diastolic;
    $var5 = "<br>Today pulse : ".$Pulse;
    $arr = array($var1, $var2, $var3, $var4, $var5);
    $tt = implode(",",$arr);


    $ins = mysqli_query($conn , "INSERT INTO `add_vital_bp`(`date`, `systolic`, `diastolic`, `pulse`,`user_id`) VALUES ('$date','$Systolic','$Diastolic','$Pulse','$user_id')");
    
    $ins1 = mysqli_query($conn , "INSERT INTO `messages_doctor`(`incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('$doc','$pac','$tt')");
    $ins2 = mysqli_query($conn , "INSERT INTO `messages_dietition`(`incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('$doc_diet','$pac_diet','$tt')");
    $ins3 = mysqli_query($conn , "INSERT INTO `messages_healthexpert`(`incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('$doc_health','$pac_health','$tt')");
    
      // notification
      $send_totification_doctor = mysqli_query($conn , "INSERT INTO `notification`(`from_id`, `to_id`, `message`) VALUES('$getmyid','$gt_user_id','$getmyname')");
      $send_totification_diet = mysqli_query($conn , "INSERT INTO `notification`(`from_id`, `to_id`, `message`) VALUES('$getmyid','$gt_diet','$getmyname')");
      $send_totification_health = mysqli_query($conn , "INSERT INTO `notification`(`from_id`, `to_id`, `message`) VALUES('$getmyid','$gt_health','$getmyname')");      


    if($ins){
        echo "<script>alert('success')</script>";
    }
}
// }else{
//     if(isset($_POST['submit'])){
//         $date = $_POST['date'];
//     $Systolic = $_POST['Systolic'];
//     $Diastolic = $_POST['Diastolic'];
//     $Pulse = $_POST['Pulse'];
// $update = mysqli_query($conn , "UPDATE `add_vital_bp` SET `systolic`='$Systolic',`diastolic`='$Diastolic',`pulse`='$Pulse' WHERE `date` = '$date'");
// if($update){
//     echo "<script>window.location.replace('add_vitals_bp.php')</script>";
// }
// }



if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `add_vital_bp` where `date`='$dt'"));
}



?>

<div class="pt-5">
    <div class="container theme-container">
        <div class="row mb-2">

            <!-- scrollable tabs -->
            <div class="vitalscrollmenu">
                <a class="active" href="add_vitals_bp.php">BP</a>
                <a href="add_vitals_meal_pattern.php">Meal Pattern</a>
                <a href="add_vitals_sugar_level.php">Sugar Level</a>
                <a href="add_vitals_weight_in_kg.php">Weight(in Kg)</a>
            </div>
            <!-- // scrollable tabs -->
            <form method="POST">
            <input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $data['id']; } ?>">
                <div class="row">

                    <div class="col-md-12">
                        <label> </label>
                        <input type="datetime-local" class="form-control" name="date"  value="<?= date('Y-m-d') ?>"
                            required>
                    </div><br>

                    <div class="col-md-1 col-xs-1 ">
                        <label> </label><br>
                        <label>Systolic:</label>
                    </div>

                    <div class="col-md-2 col-xs-2">
                        <label> </label>
                        <input type="text" class="form-control" placeholder="Systolic" name="Systolic" >
                    </div>

                    <div class="col-md-1">
                        <label> </label><br>
                        <label>Diastolic:</label>
                    </div>

                    <div class="col-md-2">
                        <label> </label>
                        <input type="text" class="form-control" placeholder="Diastolic" name="Diastolic" >
                    </div><br>

                    <div class="col-md-1">
                        <label> </label><br>
                        <label>Pulse:</label>
                    </div>

                    <div class="col-md-2">
                        <label> </label>
                        <input type="text" class="form-control" placeholder="Pulse" name="Pulse" >
                        <input type="hidden" class="form-check-input form-control" name="user_id" value="<?= $_SESSION['email']?>">
                    </div><br>

                    <div class="col-md-8 mt-2">
                        <button type="submit" class="btn btn-info" name="submit">Save BP</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>




<?php include 'footer.php' ?>
</body>