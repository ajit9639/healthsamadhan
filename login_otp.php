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
body{
     background: url('../../assets/img/category/dr.png');
    background-size: cover;
}
</style>

<body>
    <?php 

include 'conn.php'; 

if(isset($_SESSION['email'])){
    echo "<script>
    location.href = 'index.php';
    </script>";
}

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $number = $_POST['phone'];

  $check = mysqli_num_rows(mysqli_query($conn , "SELECT * FROM `signup` WHERE `email`='$email' AND `phone_number`='$number'"));
    if($check == '1'){

    $getnm = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` WHERE `email`='$email'"));
    $getnm_my = $getnm['first_name'];

  $_SESSION['value'] = '1';
  $_SESSION['email'] = $email;
  $_SESSION['my_nm'] = $getnm_my;

echo "<script>window.location.replace('index.php')</script>";
}else{
echo "<script>alert('Invalid Login')</script>";
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

        <!-- sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
        function JSalert() {
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
        }
        </script>
    </head>

    <body>

        <section class="main-section">
            <div class="container">
                <form method="POST">
                    <div class="row">
                        <div class="logo_section">
                            <img src="./assets/img/logo.png" alt="">
                        </div>
                      
                        <div class="col-md-12">
                            <label for="pwd">Phone Number:</label>
                            <input type="number" class="form-control" placeholder="Enter Number" name="phone">
                        </div>

                          <div class="col-md-12">
                            <label for="email">OTP:</label>
                            <input type="number" class="form-control" placeholder="Enter otp" name="email">
                        </div>

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
    </body>

    </html>