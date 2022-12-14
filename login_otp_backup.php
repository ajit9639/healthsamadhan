<style>
    
body {
    background: url('./assets/img/bg.png') !important;
}

.main-section {
    width: 50%;
    margin: 0 auto;
    margin-top: 13%;
    background: #d5d5d5;
    padding: 20px;
}

.logo_section {
    text-align: center;
    width: 100%;
}

@media(max-width:576px) {
    .main-section {
        width: 100%;
        margin-top: 0px;
        height: 100vh;
    }
}

body {
    background: url('../../assets/img/category/dr.png');
    background-size: cover;
}
</style>
z
<body>
    <?php 

include 'conn.php'; 

if(isset($_SESSION['email'])){
    echo "<script>
    location.href = 'index.php';
    </script>";
}

if(isset($_POST['submit'])){
//   $email = $_POST['email'];
  $number = $_POST['phone'];
  $input_otp = $_POST['input_otp'];
  $otp = $_POST['otp'];

  if($input_otp == $otp){
    // echo "SELECT * FROM `signup` WHERE  `phone_number`='$number'";
  $check = mysqli_num_rows(mysqli_query($conn , "SELECT * FROM `signup` WHERE  `phone_number`='$number'"));

    if($check == '1'){
    $getnm = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` WHERE `phone_number`='$number'"));
    $getnm_my = $getnm['first_name'];
    $getnm_my_email = $getnm['email'];

  $_SESSION['value'] = '1';
  $_SESSION['email'] = $getnm_my_email;
  $_SESSION['my_nm'] = $getnm_my;

echo "<script>window.location.replace('index.php')</script>";
}else{
echo "<script>alert('Invalid Login')</script>";
}
}else{?>
    <script>alert("invalid")</script>
<?php 
}
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Healthsamadhan Login Page</title>
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
       
    </head>

    <body>
        <?php
         $rand_val = rand(99999,999999);
        ?>
        <section class="main-section">
            <div class="container">
                <form method="POST">
                    <div class="row">
                        <div class="logo_section">
                            <img src="./assets/img/logo.png" alt="">
                        </div>

                        <div class="col-md-12">
                            <label>phone_number (Whatsapp)</label>
                            <input type="number" class="form-control" placeholder="Enter Number" name="phone" id="phone"
                             pattern="[789][0-9]{9}" onchange="javascript:sendOTP();" required>
                        </div>

                        <!-- <input type="button" value="Send OTP" onclick="sendOTP()"> -->
<?php 

function sendOTP(){         
// $ch = @mysqli_connect("localhost","insighti_labes","Labes123.","insighti_labes") or die("connection failure");

if($_SERVER['SERVER_NAME'] == "localhost"){
    $ch = mysqli_connect("localhost", "root", "", "health_smadhan_db");
}else{
    $ch = mysqli_connect("localhost", "posigraph_health_smadhan", "xC3Eug~T$+ps", "posigraph_health_smadhanDB");
}


// $Mob = 8603310087;
$otp = rand('100000', '999999');       
// $link = mysqli_connect("localhost","insighti_labes","Labes123.","insighti_labes");
//Your authentication key
$authKey = "14107AXVZG4hH18q5f815112P15";
//Multiple mobiles numbers separated by comma
$mobileNumber = $_POST['phone'];
//Sender ID,While usi
$senderId = "LBSJSR";
$country = "91";
$DLT_TE_ID = "1207163497526511297";
//Your message to send, Add URL encoding here.
$message = 'Your LABES login OTP code is'  .$otp;
//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
	'country' => $country,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
	'DLT_TE_ID' => $DLT_TE_ID,
    'route' => $route
);
//API URL
$url="http://bulksms.insightinfosystem.com/api/sendhttp.php";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}
curl_close($ch);
}
?>

                        <script>

                        // send otp in whatsapp


                        // function sendOTP() {                                            
                        //     var input_otp = document.getElementById('phone').value;
                        //     var num_inp = input_otp.toString().length;
                        //     if (num_inp == 10) {
                        //         document.getElementById('phone').readOnly = true;
                        //         var phoneNumber = document.querySelector('[name="phone"]');
                        //         var otp = document.querySelector('[name="otp"]');
                        //         if (phoneNumber.value != '' && otp.value != '') {
                        //             var http = new XMLHttpRequest();
                        //             var url = 'send-otp.php';
                        //             var params = 'phoneNumber=' + phoneNumber.value + '&otp=' + otp.value;
                        //             http.open('POST', url, true);
                        //             http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        //             http.onreadystatechange = function() {
                        //                 if (http.readyState == 4 && http.status == 200) {
                        //                     console.log(http.responseText);
                        //                 }
                        //             }
                        //             http.send(params);
                        //         }
                        //     }
                        // }

                        </script>

                        <!-- send otp -->
                        <div class="col-md-12">
                            <label>Enter OTP</label>
                            <input type="number" class="form-control" placeholder="Enter OTP" id="input_otp" name="input_otp"
                                onchange="javascript:compair();" required>

                            <input type="hidden" class="form-control" placeholder="Enter OTP" id="input_otp_compair" 
                                name="otp" value="<?php echo $rand_val?>" required>
                        </div>
                        <!-- // send otp -->





                        <div class="col-md-12 mt-3">
                            Already have an account ? <a href="register.php" class="">Register Here</a>
                        </div>

                        <div class="col-md-2 mt-3">
                            <button type="submit" class="btn btn-info" name="submit">Login</button>
                        </div>


                        <!-- <div class="col-md-3 mt-3">
                            <a href="all_doctors_login.php" class="btn btn-danger">Doctor's Login</a>
                        </div> -->

                    </div>
                </form>

            </div>

            <p class="site-footer__bottom-text" style="text-align: center;
    background: #3c3c3c;
    color: #fff;">Powered by <a href="https://insightinfosystem.com">Insight Infosystem</a></p>
        </section>


        <script>
        function calcu() {
            var input_otp_compair = document.getElementById('input_otp_compair').value;
            var input_otp = document.getElementById('phone').value;

            var num_inp = input_otp.toString().length;
            if (num_inp == 10) {
                alert('OTP Send to your whatsapp');
                document.getElementById('phone').readOnly = true;
            } else {
                //alert('Invalid Whatsapp No');
            }
        }

        function compair() {
            if (document.getElementById("input_otp_compair").value == document.getElementById("input_otp").value) {
                // alert('same');
                document.getElementById('input_otp').readOnly = true;
            } else {
                //alert('different');
                return true;
            }
        }
        </script>
    </body>

    </html>