<?php include "header.php";
   $get = $_GET['id'];
    $type = $_GET['type'];
  
    if($type == "delete"){
    $del = mysqli_query($conn , "DELETE FROM `doctor_registration` WHERE `id`='$get'");
    echo "<script>alert('Doctor Deleted Successfully')</script>";
    echo "<script>window.location.href='doctor_view.php';</script>";
    }else{
 
    $mysqrives = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `doctor_registration`  WHERE `id`=' $get'"));

  if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
        
    $reg_no = $_POST['reg_no'];
    $gender = $_POST['gender'];
    $year_of_exp = $_POST['year_of_exp'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    
    // $check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `doctor_registration`  WHERE `email`='$email'"));

    // if($check > 0){
    //   echo "<script>alert('already registered')</script>";
    // }else{
    $ins = mysqli_query($conn , "UPDATE `doctor_registration` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone`='$phone',`date`='$date',`reg_no`='$reg_no',`gender`='$gender',`year_of_exp`='$year_of_exp',`city`='$city',`address`='$address' where `id`='$get'");
    if($ins){
        echo"<script>
        alert('Updation Successfully');
     window.location.href='doctor_view.php';
        </script>";  
    }else{
        echo"<script>alert('Invalid credential');
        </script>";  
    }
    }
    }   
// }
  ?>

<div class="container-fluid page-body-wrapper">

    <?php include "sidebar.php";?>

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Doctor</h4>

                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="email">First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter First Name"
                                            name="first_name" value="<?php echo $mysqrives['first_name'] ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Last Name"
                                            name="last_name" value="<?php echo $mysqrives['last_name'] ?>" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                            pattern="[^ @]*@[^ @]*" value="<?php echo $mysqrives['email'] ?>" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>phone_number (Whatsapp)</label>
                                        <input type="number" class="form-control" placeholder="Enter Number"
                                            name="phone" pattern="[789][0-9]{9}" value="<?php echo $mysqrives['phone'] ?>" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>DOB</label>
                                        <input type="date" class="form-control" name="date" value="<?php echo $mysqrives['date'] ?>" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Registration no</label>
                                        <input type="number" class="form-control" placeholder="Enter Registration no"
                                            name="reg_no" value="<?php echo $mysqrives['reg_no'] ?>" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Services</label><br>

                                        <select class="form-control" name="gender">
                                        <option value="<?php echo $mysqrives['gender'] ?>"><?php echo $mysqrives['gender'] ?></option>
                                            <option value="" disabled>Select Services</option>
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                            <option value="other">other</option>
                                        </select>

                                    </div>

                                    <div class="col-md-4">
                                        <label>Year of Experience</label>
                                        <input type="number" class="form-control" placeholder="Enter Experience"
                                            name="year_of_exp" value="<?php echo $mysqrives['year_of_exp'] ?>" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="Enter City" name="city"
                                           value="<?php echo $mysqrives['city'] ?>" required>
                                        <!-- <textarea name="education" id="" rows="3" class="form-control"></textarea> -->
                                    </div>

                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <textarea name="address" rows="2" class="form-control"
                                            placeholder="Enter Address" required> <?php echo  $mysqrives['address'] ?></textarea>
                                        <!-- <input type="text" class="form-control" placeholder="Enter Address" name="address" required> -->
                                    </div>

                                    <div class="col-md-2 mt-2">
                                        <button type="submit" class="btn btn-info" name="submit">Register</button>
                                    </div>
                                    <!-- <div class="col-md-2 mt-2">
                            <a href="login.php" class="btn btn-success">Login</a>
                        </div> -->
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <?php include "footer.php";?>