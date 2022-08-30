<?php 
include 'conn.php';
include 'head.php' ?>

<body>

<?php 
include 'header.php';
include 'mobile-header.php';

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $number = $_POST['phone'];

  $check = mysqli_num_rows(mysqli_query($conn , "SELECT * FROM `signup` WHERE `email`='$email' AND `phone_number`='$number'"));
if($check == '1'){

  $_SESSION['value'] = '1';
  $_SESSION['email'] = $email;

  echo "<script>window.location.replace('index.php')</script>";
}else{
echo "<script>alert('Invalid Login')</script>";
}
}
?>

                <div class="container mt-4 mb-4">
                <div class="row">

                <h2 class="text-center w-100">Login Now!</h2>               
                <form action="#" id="login_modal_form" method="POST">
                    <div class="row">

                        <div class="col-md-12">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email">
                        </div>
                        <div class="col-md-12">
                            <label for="pwd">Phone Number:</label>
                            <input type="number" class="form-control" placeholder="Enter Number" name="phone">
                        </div>

                        <div class="col-md-2 mt-3">
                            <button type="submit" class="btn btn-info" name="submit">Login</button>
                        </div>
                        <div class="col-md-2 mt-3">
                            <a href="register.php" class="btn btn-success">Register</a>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    <!-- </div> -->
    <!-- </div> -->

    <?php include 'footer.php' ?>