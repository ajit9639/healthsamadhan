
<?php 
include 'conn.php'; 
if(isset($_SESSION['email'])){
    echo "<script>
    location.href = 'index.php';
    </script>";
}

if(isset($_POST['submit'])){
  $number = $_POST['phone'];
  $otp = $_POST['input_otp'];
  $otp_check = $_SESSION['otp'];
  if($otp == $otp_check){
    echo "inserted";
    
  $check = mysqli_num_rows(mysqli_query($conn , "SELECT * FROM `user_doctor` WHERE  `phone_number`='$number' "));

    if($check == '1'){
    $getnm = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_doctor` WHERE `phone_number`='$number'"));
    $getnm_my = $getnm['first_name'];
    $getnm_my_email = $getnm['email'];

  $_SESSION['value'] = '1';
  $_SESSION['email'] = $getnm_my_email;
  $_SESSION['my_nm'] = $getnm_my;

  echo "<pre>";
  print_r($_SESSION);
  print_r($_POST);
  exit;

echo "<script>window.location.replace('index.php')</script>";
}else{
echo "<script>alert('Invalid Login')</script>";
}
}else{ 
    echo '
    <script>alert("invalid")</script>
    ';
}
}else{
    
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <style>
body{
            background:url('https://thumbs.dreamstime.com/b/medical-stethoscope-blue-background-health-care-concept-healthy-155038085.jpg');
            background-repeat:no-repeat;;
            background-size: cover;
        }

.main-section {
    width: 50%;
    margin: 0 auto;
    margin-top: 13%;
    background: #d5d5d5;
    
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

body{
            background:url('https://thumbs.dreamstime.com/b/medical-stethoscope-blue-background-health-care-concept-healthy-155038085.jpg');
            background-repeat:no-repeat;;
            background-size: cover;
        }
</style>

    </head>

    <body>
      
        <section class="main-section">
            <div class="container">
                <form method="POST" id="form">
                    <div class="row">
                        <div class="logo_section">
                            <img src="./assets/img/logo.png" alt="">
                        </div>

                        <div class="col-md-12">
                            <label style="width: 100%;">phone_number</label>
                            <input type="number" class="form-control" placeholder="Enter Number" name="phone" id="phone" 
                             pattern="[789][0-9]{9}"  required style="width:80%;float:left;margin-right:10px;">

                             <input type="button" class="button1 btn btn-success" name="send_otp" value="Send OTP" onclick="create()" />                             
                        </div>            

                        <!-- send otp -->
                        <div class="col-md-12">
                            <label>Enter OTP</label>
                            <input type="number" class="form-control" placeholder="Enter OTP" id="input_otp" name="input_otp"
                                 required>                                                          
                        </div>
                        <!-- // send otp -->

                        <div class="col-md-12 mt-3">
                            Already have an account ? <a href="register.php" class="">Register Here</a>
                        </div>

                        <div class="col-md-2 mt-3">
                            <button type="submit" class="btn btn-info" name="submit">Login</button>
                        </div>                    

                    </div>
                </form>

            </div>

            <p class="site-footer__bottom-text" 
            style="
    text-align: center;
    background: #302e2e52;
    color: #fff;
    margin-top: 10px;
    ">Powered by <a href="https://insightinfosystem.com" class="text-light">Insight Infosystem</a></p>
        </section>


        <script>
        function create () {
        $.ajax({
            url:"sendsms.php", 
            method: "POST",                
            data: $('#form').serialize(),
            success:function(result){
                alert('OTP Send Successfully');
            }
        });
    }        
        </script>
    </body>

    </html>