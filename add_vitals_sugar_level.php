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

/* div.vitalscrollmenu a:hover {
    background-color: #777;
} */
</style>

<?php 
include "aside_structure.php";
$my_email = $_SESSION['email'];
$get_user = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` where `email`='$my_email'"));
$gt_user_id = $get_user['assigned_doctor'];

$gt = $get_user['assigned_doctor'];
$get_my_doctor = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_doctor` where `user_id`='$gt'"));

$get_me = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_doctor` where `email`='$my_email'"));
$pac = $get_me['unique_id'];
$doc = $get_my_doctor['unique_id'];



if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $fasting = $_POST['fasting'];
    $pp1 = $_POST['pp1'];
    $pp2 = $_POST['pp2'];
    $pp3 = $_POST['pp3'];
    $user_id = $_POST['user_id'];

    $datetime = new DateTime($date);
    $dt = $datetime->format('Y-m-d');
    $tm = $datetime->format('H:i:s');
    $time = date("g:i a", strtotime($tm));

    $dte = str_replace('-', '/', $dt);
    $date = date('d-m-Y', strtotime($dte));

    $var1 = "Date : ".$date;
    $var2 = "<br>Time : ".$time;
    $var3 = "<br>i am : ".$fasting;
    $var4 = "<br>i have PP1 : ".$pp1;
    $var5 = "<br>i have PP2 : ".$pp2;
    $var6 = "<br>i have PP3 : ".$pp3;
    $arr = array($var1, $var2, $var3, $var4, $var5, $var6);
    $tt = implode(",",$arr);

    $ins = mysqli_query($conn , "INSERT INTO `add_vital_sugar_level`(`date`, `fasting`, `pp1`, `pp2`, `pp3`,`user_id`) VALUES ('$date','$fasting','$pp1','$pp2','$pp3','$user_id')");
    $ins1 = mysqli_query($conn , "INSERT INTO `messages_doctor`(`incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('$doc','$pac','$tt')");
  
    if($ins){
        echo "<script>alert('success')</script>";
    }
}

// }else{
//     if(isset($_POST['submit'])){

//         $date = $_POST['date'];
//         $fasting = $_POST['fasting'];
//         $pp1 = $_POST['pp1'];
//         $pp2 = $_POST['pp2'];
//         $pp3 = $_POST['pp3'];

// $update = mysqli_query($conn , "UPDATE `add_vital_sugar_level` SET `date`='$date',`fasting`='$fasting',`pp1`='$pp1',`pp2`='$pp2',`pp3`='$pp3' WHERE `date` = '$date'");

// }

?>

<div class="pt-5">
    <div class="container theme-container">
        <div class="row mb-2">

            <!-- scrollable tabs -->
            <div class="vitalscrollmenu">
                <a href="add_vitals_meal_pattern.php">Meal Pattern</a>
                <a class="active" href="add_vitals_sugar_level.php">Sugar Level</a>
                <a href="add_vitals_weight_in_kg.php">Weight(in Kg)</a>
                <a href="add_vitals_bp.php">BP</a>
            </div>
            <!-- // scrollable tabs -->
            <form action="#" method="POST" id="register_form">
                <div class="row">
                    <div class="col-md-12">
                        <label> </label>
                        <input type="datetime-local" class="form-control" name="date" value="<?= date('Y-m-d') ?>"
                            required>
                    </div><br>
                    <div class="col-md-1 col-xs-1 ">
                        <label> </label><br>
                        <label>Fasting:</label>
                    </div>
                    <div class="col-md-2 col-xs-2">
                        <label> </label>
                        <input type="text" class="form-control" placeholder="Fasting" name="fasting" >
                    </div>
                    <div class="col-md-1">
                        <label> </label><br>
                        <label>PP1:</label>
                    </div>
                    <div class="col-md-2">
                        <label> </label>
                        <input type="text" class="form-control" placeholder="pp1" name="pp1" >
                    </div><br>

                    <div class="col-md-1">
                        <label> </label><br>
                        <label>PP2:</label>
                    </div>

                    <div class="col-md-2">
                        <label> </label>
                        <input type="text" class="form-control" placeholder="pp2" name="pp2" >
                    </div><br>

                    <div class="col-md-1">
                        <label> </label><br>
                        <label>PP3:</label>
                    </div>

                    <div class="col-md-2">
                        <label> </label>
                        <input type="text" class="form-control" placeholder="pp3" name="pp3" >
                        <input type="hidden" class="form-check-input form-control" name="user_id" value="<?= $_SESSION['email']?>">
                    </div><br>
                    <div class="col-md-8 mt-2">
                        <button type="submit" class="btn btn-info" name="submit">Save BSL</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>




<?php include 'footer.php' ?>
</body>