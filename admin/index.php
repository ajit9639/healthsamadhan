<?php
include 'conn.php'; 
            if (isset($_POST['entered'])) {
              $username = $_POST['username'];
              $password = $_POST['password'];
                          
              if ($username != "" && $password != "") {
                $query = "SELECT * from admin where `username` = '$username' AND `password` = '$password'";
                $data = mysqli_query($conn,$query);
                $num = mysqli_num_rows($data);
                  
                if($row = mysqli_fetch_assoc($data)){
                  if ($num == 1) {                                                          
                      $_SESSION['usrnm'] = $row['username'];   
                      echo"<script>window.location.href='dashboard.php';
                            </script>";                                                             

                  } else {
                    echo "<script>alert('Logged In Failed! please fill the correct details!.');</script>";
                      ?>
                      <div class="response-message">Logged In Failed! please fill the correct details</div>
                      <?php
                    }
                }                
              }
            }
             
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../assets/img/logo.png" alt="logo">
              </div>
              
              <h6 class="font-weight-light text-center">Admin Login</h6>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control form-control-lg"  placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" name="entered" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">SIGN IN</button>
                </div>
             
              </form>
              
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
