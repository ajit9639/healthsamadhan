<style>
body {
    background: url('./assets/img/bg.png') !important;
}

.main-section {
    width: 75%;
    margin: 0 auto;
    margin-top: 1%;
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
    }
}
</style>


<?php 
include 'conn.php';
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

</head>

<body>
    <?php 
    
  
    $rand_val = rand(99999,999999);
    // echo ($rand_val);

    if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $mother_tongue = $_POST['mother_tongue'];
    $marital_status = $_POST['marital_status'];
    $address = $_POST['address'];
    $monthly_income = $_POST['monthly_income'];
    $education = $_POST['education'];
    $package_name = $_POST['package_name'];
    $package_amount = $_POST['package_amount'];

    $assigned_doctor = 'not assigned';
    $assigned_dietition = 'not assigned';
    $assigned_healthexpert = 'not assigned';
    $user_status = 'unactive';
   
    $image_data = "";

    $check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` WHERE `email`='$email'"));

    if($check > 0){
      echo "<script>alert('You have already registered')</script>";
    }else{
        // echo "INSERT INTO `doctor_registration`(`first_name`, `last_name`, `email`, `phone`, `date`, `reg_no`, `gender`, `year_of_exp`, `city`, `address`, `password`, `image`) VALUES('$first_name','$last_name','$email','$phone','$date','$reg_no',' $gender','$year_of_exp','$city','$address','$password','$image_data')";exit;
        $cont_dr = mysqli_fetch_assoc(mysqli_query($conn , "SELECT COUNT('id') as `cid` FROM `user_doctor`"));
        $x = $cont_dr['cid'];
        $y = $x + 2;
        $z = $y;
        // exit();
        // echo "INSERT INTO `user_doctor`(`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `doctor_id`) VALUES('$z','$first_name','$last_name','$email','$password','$image_data','Offline now','')";exit;

        $ins1 = mysqli_query($conn , "INSERT INTO `user_doctor`(`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`,`i_am`) VALUES('$z','$first_name','$last_name','$email','$password','$image_data','Offline now','user')");
        $ins2 = mysqli_query($conn , "INSERT INTO `user_diet`(`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`,`i_am`) VALUES('$z','$first_name','$last_name','$email','$password','$image_data','Offline now','user')");
        $ins3 = mysqli_query($conn , "INSERT INTO `user_healthexpert`(`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`,`i_am`) VALUES('$z','$first_name','$last_name','$email','$password','$image_data','Offline now','user')");

    $ins = mysqli_query($conn , "INSERT INTO `signup`(`first_name`, `last_name`, `gender`, `phone_number`, `password` ,`email`, `address`, `dob`, `height`, `weight`, `age`, `mother_tongue`, `marital_status`, `monthly_income`, `education`,`package_name`,`package_amount`, `assigned_doctor`, `assigned_dietition`, `assigned_healthexpert`, `user_status`) VALUES ('$first_name','$last_name','$gender','$phone','$password','$email','$address','$date','$height','$weight','$age','$mother_tongue','$marital_status','$monthly_income','$education','$package_name','$package_amount','$assigned_doctor','$assigned_dietition','$assigned_healthexpert','$user_status')");
    if($ins){
        echo"<script>
        alert('Registration Successfully');
        window.location.href='login.php';
        </script>";  
    }else{
        echo"<script>alert('Invalid credential');
        </script>";  
    }
    }
    }
    ?>

    <section class="main-section">
        <div class="container mt-4 mb-4">
            <div class="row">

                <div class="logo_section">
                    <img src="./assets/img/logo.png" alt="">
                </div>
                <!-- <form method="POST" id="register_form" action="gateway/index.php"> -->
                <form method="POST" id="register_form">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="email">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="first_name"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label>gender</label><br>

                            <select class="form-control" name="gender">
                                <option value="" disabled>Select Gender</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="other">other</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>phone_number (Whatsapp)</label>
                            <input type="number" class="form-control" placeholder="Enter Number" name="phone" id="phone"
                                pattern="[789][0-9]{9}" onchange="javascript:sendOTP();" required>
                        </div>


                        <script>
                        function sendOTP() {
                            var input_otp = document.getElementById('phone').value;

                            var num_inp = input_otp.toString().length;
                            if (num_inp == 10) {
                                document.getElementById('phone').readOnly = true;


                                var phoneNumber = document.querySelector('[name="phone"]');
                                var otp = document.querySelector('[name="otp"]');

                                if (phoneNumber.value != '' && otp.value != '') {
                                    var http = new XMLHttpRequest();
                                    var url = 'send-otp.php';
                                    var params = 'phoneNumber=' + phoneNumber.value + '&otp=' + otp.value;
                                    http.open('POST', url, true);

                                    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                                    http.onreadystatechange = function() {
                                        if (http.readyState == 4 && http.status == 200) {
                                            console.log(http.responseText);
                                        }
                                    }
                                    http.send(params);
                                }
                            }
                        }
                        </script>

                        <!-- send otp -->
                        <div class="col-md-4">
                            <label>Enter OTP</label>
                            <input type="number" class="form-control" placeholder="Enter OTP" id="input_otp"
                                onchange="javascript:compair();" required>

                            <input type="hidden" class="form-control" placeholder="Enter OTP" id="input_otp_compair"
                                name="otp" value="<?php echo $rand_val?>" required>
                        </div>
                        <!-- // send otp -->

                        <div class="col-md-4">
                            <label>password </label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                pattern="[^ @]*@[^ @]*" required>
                        </div>

                        <div class="col-md-4">
                            <label>DOB</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>

                        <div class="col-md-4">
                            <label>Height</label>
                            <input type="number" class="form-control" placeholder="Enter Height" name="height" min="2"
                                max="10" required>
                        </div>

                        <div class="col-md-4">
                            <label>Weight</label>
                            <input type="number" class="form-control" placeholder="Enter Weight" name="weight" min="10"
                                max="100" required>
                        </div>

                        <div class="col-md-4">
                            <label>Age</label>
                            <input type="number" class="form-control" placeholder="Enter Age" name="age" min="1"
                                max="100" required>
                        </div>

                        <div class="col-md-4">
                            <label>Mother_tongue</label>
                            <input type="text" class="form-control" placeholder="Enter Mother Tongue"
                                name="mother_tongue" required>
                        </div>

                        <div class="col-md-4">
                            <label>Marital_status</label>
                            <input type="text" class="form-control" placeholder="Enter Marital Status"
                                name="marital_status" required>
                        </div>

                        <div class="col-md-4">
                            <label>Monthly_income</label>
                            <input type="number" class="form-control" placeholder="Enter Monthly Income"
                                name="monthly_income" required>
                        </div>
                        <div class="col-md-4">
                            <label>Education</label>
                            <input type="text" class="form-control" placeholder="Enter Education" name="education"
                                required>
                            <!-- <textarea name="education" id="" rows="3" class="form-control"></textarea> -->
                        </div>
                        <div class="col-md-4">
                            <label>Address</label>
                            <textarea name="address" id="" rows="1" class="form-control"
                                placeholder="Enter Address"></textarea>
                            <!-- <input type="text" class="form-control" placeholder="Enter Address" name="address" required> -->
                        </div>

                        <div class="col-md-4">
                            <label>Select Package </label><br>

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

                        <div class="col-md-4">
                            <label>Package Amount</label><br>
                            <div id="package_amount"></div>
                        </div>

                        <div class="col-md-2 mt-2">
                            <button type="submit" class="btn btn-info" name="submit">Register</button>
                        </div>

                        <div class="col-md-12 mt-3">
                            Already have an account ? <a href="login.php" class="">Login Here ?</a>
                            <a href="login_otp.php" class="">Login with OTP ?</a>
                        </div>

                        <!-- <div class="col-md-2 mt-2">
                            <a href="login.php" class="btn btn-success">Login</a>
                        </div> -->

                    </div>
                </form>

            </div>

            <p class="site-footer__bottom-text" style="text-align: center;
    background: #3c3c3c;
    color: #fff;">Powered by <a href="https://insightinfosystem.com">Insight Infosystem</a></p>
        </div>
    </section>


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