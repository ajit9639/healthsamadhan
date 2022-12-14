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
$get_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `signup` where `email`='$my_email'"));
$getmyid = $_SESSION['myunique_id'];
$getmyname = $get_user['first_name'];

$gt_user_id = $get_user['assigned_doctor'];
$gt_diet = $get_user['assigned_dietition'];
$gt_health = $get_user['assigned_healthexpert'];

$get_my_doctor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user_doctor` where `user_id`='$gt_user_id'"));
$get_my_diet = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user_diet` where `user_id`='$gt_diet'"));
$get_my_health = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user_healthexpert` where `user_id`='$gt_health'"));

// doctor
$get_me = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user_doctor` where `email`='$my_email'"));
$pac = $get_me['unique_id'];
$doc = $get_my_doctor['unique_id'];

// dietition
$get_me_diet = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user_diet` where `email`='$my_email'"));
$pac_diet = $get_me_diet['unique_id'];
$doc_diet = $get_my_diet['unique_id'];

// healthexpert
$get_me_health = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user_healthexpert` where `email`='$my_email'"));
$pac_health = $get_me_health['unique_id'];
$doc_health = $get_my_health['unique_id'];

// exit;
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $fasting = $_POST['fasting'];
    $meal = $_POST['meal'];
    $user_id = $_POST['user_id'];

    $datetime = new DateTime($date);
    $dt = $datetime->format('Y-m-d');
    $tm = $datetime->format('H:i:s');
    $time = date("g:i a", strtotime($tm));

    $dte = str_replace('-', '/', $dt);
    $date = date('d-m-Y', strtotime($dte));

    $var1 = "Date : " . $date;
    $var2 = "<br>Time : " . $time;
    $var3 = "<br>Today i am : " . $fasting;
    $var4 = "<br>i taken Meal : " . $meal . " " . "times";
    $arr = array($var1, $var2, $var3, $var4);
    $tt = implode(",", $arr);

    $ins = mysqli_query($conn, "INSERT INTO `add_vital_meal_pattern`(`date`, `fasting`, `meal`,`user_id`) VALUES ('$date','$fasting','$meal','$user_id')");

    $ins1 = mysqli_query($conn, "INSERT INTO `messages_doctor`(`incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('$doc','$pac','$tt')");
    $ins2 = mysqli_query($conn, "INSERT INTO `messages_dietition`(`incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('$doc_diet','$pac_diet','$tt')");
    $ins3 = mysqli_query($conn, "INSERT INTO `messages_healthexpert`(`incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('$doc_health','$pac_health','$tt')");


    // notification
    $send_totification_doctor = mysqli_query($conn , "INSERT INTO `notification`(`from_id`, `to_id`, `message`) VALUES('$getmyid','$gt_user_id','$getmyname')");
    $send_totification_diet = mysqli_query($conn , "INSERT INTO `notification`(`from_id`, `to_id`, `message`) VALUES('$getmyid','$gt_diet','$getmyname')");
    $send_totification_health = mysqli_query($conn , "INSERT INTO `notification`(`from_id`, `to_id`, `message`) VALUES('$getmyid','$gt_health','$getmyname')");


    if ($ins1) {
        echo "<script>alert('success')</script>";
    }
}
?>

<div class="pt-5">
    <div class="container theme-container">
        <div class="row mb-2">
            <!-- scrollable tabs -->
            <div class="vitalscrollmenu">
                <a class="active" href="add_vitals_meal_pattern.php">Meal Pattern</a>
                <a href="add_vitals_sugar_level.php">Sugar Level</a>
                <a href="add_vitals_weight_in_kg.php">Weight(in Kg)</a>
                <a href="add_vitals_bp.php">BP</a>
            </div>
            <!-- // scrollable tabs -->

            <form action="#" method="POST">
                <div class="row">

                    <div class="col-md-7">
                        <label> </label>
                        <input type="datetime-local" class="form-control" name="date" value="<?= date('Y-m-d') ?>"
                            required>
                    </div>
                    <div class="col-md-8">
                        <label> </label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="fasting" value="juice_fasting">I am
                                juice fasting today
                            </label>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <label> </label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="fasting" value="water_fasting">I am
                                Water fasting today
                            </label>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <label> </label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="fasting" value="sns_fasting">I am SNS
                                fasting today
                            </label>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <label> </label>
                        <div class="form-check">
                            <label class="form-check-label">Meals <br> (includes - Breakfast,lunch & dinner
                                )
                                <input type="text" class="form-check-input form-control" name="meal">
                                <input type="hidden" class="form-check-input form-control" name="user_id"
                                    value="<?= $_SESSION['email'] ?>">
                            </label>
                        </div>
                    </div>

                    <div class="col-md-8 mt-2">
                        <button type="submit" class="btn btn-info" name="submit">Save Meal</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>




<?php include 'footer.php' ?>
</body>