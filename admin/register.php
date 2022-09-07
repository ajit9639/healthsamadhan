<?php include "header.php" ;

if(isset($_POST['submit']))
  {

    
// alert show hide not working
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $exists= false;
    if (($password == $cpassword) && $exists==false) {
        if($username != "" && $password != "" && $cpassword != "")
        {
        $query = "INSERT INTO admin ( username, password, dt) VALUES('$username','$password',current_timestamp())";

        $data = mysqli_query($conn,$query);
        if ($data) {
          echo "<script>alert('Enquiry submitted!.');</script>";
                        header("location:login.php");

        }
        else
          echo "not inserted";
      }
      else{
        echo"<script> alert('Password do not match');
                      window.location.href='register.php';
              </script>";

      }
    }    
  }
?>


<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/matrimonial-logo.png" alt="logo">
              </div>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="#" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="cpassword" name="cpassword" placeholder="Repeat Password">
                </div>
                <div class="mt-3">
                  <button type="submit" name="submit" class="btn btn-outline-primary">Signup</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
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
  <?php include 'footer.php' ?>
</body>

</html>
