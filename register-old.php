<?php 
include "conn.php";

if(isset($_POST['submit'])){
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
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

$check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `signup` WHERE `email`='$email'"));
if($check){
  echo "<script>alert('You have already registered')</script>";
}else{
$ins = mysqli_query($conn , "INSERT INTO `signup`(`first_name`, `last_name`, `gender`, `phone_number`, `email`, `address`, `dob`, `height`, `weight`, `age`, `mother_tongue`, `marital_status`, `monthly_income`, `education`) VALUES ('$first_name','$last_name','$gender','$phone','$email','$address','$date','$height','$weight','$age','$mother_tongue','$marital_status','$monthly_income','$education')");
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


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container">
    
  <form method="POST">
  <div class="row">
    <div class="col-md-4">
      <label for="email">First Name</label>
      <input type="text" class="form-control"  placeholder="Enter First Name" name="first_name" required>
    </div>
    <div class="col-md-4">
      <label>Last Name</label>
      <input type="text" class="form-control"  placeholder="Enter Last Name" name="last_name" required>
    </div>

    
    <div class="col-md-4">
      <label>gender</label><br>

      <div class="form-check-inline">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input"  name="gender" value="male" >Male
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input"  name="gender" value="female">Female
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
      <input type="radio" class="form-check-input"  name="gender" value="other">Other
      </label>
    </div>
    </div>


    <div class="col-md-4">
      <label>phone_number (Whatsapp)</label>
      <input type="number" class="form-control"  placeholder="Enter Number" name="phone" pattern="[789][0-9]{9}" required>
    </div>

    <div class="col-md-4">
      <label>Email</label>
      <input type="email" class="form-control"  placeholder="Enter Email" name="email"  pattern="[^ @]*@[^ @]*"  required>
    </div>

    

    <div class="col-md-4">
      <label>DOB</label>
      <input type="date" class="form-control"   name="date" required>
    </div>

    <div class="col-md-4">
      <label>Height</label>
      <input type="number" class="form-control"  placeholder="Enter Height" name="height" min="2" max="10" required>
    </div>

    <div class="col-md-4">
      <label>Weight</label>
      <input type="number" class="form-control"  placeholder="Enter Weight" name="weight" min="10" max="100" required>
    </div>

    <div class="col-md-4">
      <label>Age</label>
      <input type="number" class="form-control"  placeholder="Enter Age" name="age" min="1" max="100" required>
    </div>

    <div class="col-md-4">
      <label>Mother_tongue</label>
      <input type="text" class="form-control"  placeholder="Enter Mother Tongue" name="mother_tongue" required>
    </div>


    <div class="col-md-4">
      <label>Marital_status</label>
      <input type="text" class="form-control"  placeholder="Enter Marital Status" name="marital_status" required>
    </div>

    <div class="col-md-4">
      <label>Monthly_income</label>
      <input type="number" class="form-control"  placeholder="Enter Monthly Income" name="monthly_income" required>
    </div>

  

    <div class="col-md-6">
      <label>Address</label>    
      <!-- <textarea name="address" id="" rows="3" class="form-control"></textarea> -->
      <input type="text" class="form-control"  placeholder="Enter Address" name="address" required>
    </div>

    <div class="col-md-6">
      <label>Education</label>
      <input type="text" class="form-control"  placeholder="Enter Education"name="education" required>
      <!-- <textarea name="education" id="" rows="3" class="form-control"></textarea> -->
    </div> 

    <div class="col-md-2 mt-2">
    <button type="submit" class="btn btn-primary" name="submit">Register</button>
    </div>
    <div class="col-md-2 mt-2">
    <a href="login.php" class="btn btn-success">Login</a>
    </div>
</div>
  </form>
</div>
</body>
</html>
