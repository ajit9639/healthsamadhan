<?php
//session_start();
include('../conn.php');
if(isset($_POST['submit'])){
  $random = rand(999,9999);
  $_SESSION['random'] = $random;
      for($i=0;$i<count($_POST['slno']);$i++){

        $student_name = $_POST['student_name'][$i];
        $phone_no = $_POST['phone_no'][$i];
        $age = $_POST['age'][$i];
        $date_of_birth = $_POST['date_of_birth'][$i];
        $total_price = $age * $phone_no;
        if($student_name!=='' && $phone_no!=='' && $age!=='' && $date_of_birth!==''){
         $sql="INSERT INTO student(student_name,phone_no,age,date_of_birth,total_price,random)VALUES('$student_name','$phone_no','$age','$date_of_birth','$total_price','$random')";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            //echo '<div class="alert alert-success" role="alert">Submitted Successfully</div>';
        }
        else{             
            //echo '<div class="alert alert-danger" role="alert">Error Submitting in Data</div>';
        }
    }
    // echo "<script type='text/javascript'>";
    // echo "alert('Submitted successfully')";
    // echo "</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Health Samadhan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>



<div class="container">
<h5 class="text-center">Checkout</h5>
  <form method="POST" action="./pay/index.php">

    <div class="form-group">
      <label for="email">First Name:</label>
      <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
    </div>

    <div class="form-group">
      <label for="email">Last Name:</label>
      <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
    </div>

    <div class="form-group">
      <label for="email">Zip Code:</label>
      <input type="text" class="form-control" placeholder="Enter Zip Code" name="zip">
    </div>

    <div class="form-group">
      <label for="email">Email ID:</label>
      <input type="text" class="form-control" placeholder="Enter Email ID" name="email">
    </div>

    <div class="form-group">
      <label for="email">Phone Number:</label>
      <input type="text" class="form-control" placeholder="Enter Phone Number" name="number">
    </div>

    <div class="form-group">
      <label for="email">Address:</label>
      <!-- <input type="text" class="form-control" placeholder="Enter Address" name="address"> -->
      <textarea name="address" rows="3" class="form-control" placeholder="Enter Address"></textarea>
    </div>

    <div class="form-group">
      <label for="email">Amount:</label>
      <input type="text" class="form-control" placeholder="Enter Amount" name="amount" value="<?= $_POST['mytotalvalue'] ?>.00" readonly>
    </div>

    <!-- <div class="form-group">
      <label for="email">State:</label>
      <input type="text" class="form-control" placeholder="Enter State" name="state">
    </div> -->
    
    
    <button type="submit" class="btn btn-primary" name="pay">Pay Now</button>
  </form>
</div>

</body>
</html>
