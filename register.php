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
    

    <section class="main-section">
        <div class="container mt-4 mb-4">
            <div class="row">

                <div class="logo_section">
                    <img src="./assets/img/logo.png" alt="">
                </div>
                
                <form method="POST" id="form" action="package_pay/index.php">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="email">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="firstname"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname"
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
                            <label>phone_number</label>
                            
                            <div class="d-flex">
                            <div>
                            <input type="number" class="form-control" placeholder="Enter Number" name="phone" id="phone"
                                pattern="[789][0-9]{9}"  required>
                                </div>
                                <div>
                                <button class="btn btn-success" name="check_otp"  onclick="create()" type="button">Send OTP                                                               
                                  <span style="display:none" id="spin" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                  <span class="sr-only">Loading...</span>                               
                                </button>
                                </div>
                        </div></div>


                        <!-- send otp -->
                        <div class="col-md-4">
                            <label>Enter OTP</label>
                            <input type="number" class="form-control" placeholder="Enter OTP" id="input_otp" required>

                        </div>
                        <!-- // send otp -->

                        <div class="col-md-4">
                            <label>password </label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="udf1"
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
                            <input type="number" class="form-control" placeholder="Enter Height" name="height" required>
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

                            <select type="text" name="productinfo" id="package" required="true"
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
                            <input type="hidden" value="<?= $rand = rand(9999,99999) ?>" id="txnid" name="txnid" />  
                            <button type="submit" class="btn btn-info" name="registration_pay">Register</button>
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
    
    color: #fff;">Powered by <a href="https://insightinfosystem.com">Insight Infosystem</a></p>
        </div>
    </section>


    <script>
    
        function create() {
         $.ajax({
        url:"sendsms_register.php",
        method:"POST",
        data: $('#form').serialize(),
        success:function(result){
            alert('OTP Send Successfully');
        }
    })
}


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