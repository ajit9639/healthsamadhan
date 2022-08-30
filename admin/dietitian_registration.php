<?php include "header.php";
  
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
    $pass = $_POST['password'];
    $password = md5($pass);
    $image_data = "photo";

    $check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `dietitian_registration`  WHERE `email`='$email'"));

    if($check > 0){
      echo "<script>alert('You have already registered')</script>";
    }else{
        
        // echo "INSERT INTO `dietitian_registration`(`first_name`, `last_name`, `email`, `phone`, `date`, `reg_no`, `gender`, `year_of_exp`, `city`, `address`, `password`, `image`) VALUES('$first_name','$last_name','$email','$phone','$date','$reg_no',' $gender','$year_of_exp','$city','$address','$password','$image_data')";exit;
        $cont_dr = mysqli_fetch_assoc(mysqli_query($conn , "SELECT COUNT('id') as `cid` FROM `user_diet`"));
        $x = $cont_dr['cid'];
        $y = $x + 2;
        $z = $y;
        // exit();
        // echo "INSERT INTO `user_diet`(`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `doctor_id`) VALUES('$z','$first_name','$last_name','$email','$password','$image_data','Offline now','')";exit;

        $ins1 = mysqli_query($conn , "INSERT INTO `user_diet`(`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`,`i_am`) VALUES('$z','$first_name','$last_name','$email','$password','$image_data','Offline now','dietition')");
          $ins = mysqli_query($conn , "INSERT INTO `dietitian_registration`(`first_name`, `last_name`, `email`, `phone`, `date`, `reg_no`, `gender`, `year_of_exp`, `city`, `address`, `password`, `image`) VALUES('$first_name','$last_name','$email','$phone','$date','$reg_no',' $gender','$year_of_exp','$city','$address','$pass','$image_data')");

    if($ins){
        echo"<script>
        alert('Registration Successfully');
        window.location.href='dietitian_view.php';
        </script>";  
    }else{
        echo"<script>alert('Invalid credential');
        </script>";  
    }
    }
    }     
    ?>

<div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Package</h4>

                <form action="#" method="POST" enctype="multipart/form-data">
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
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                pattern="[^ @]*@[^ @]*" required>
                        </div>

                        <div class="col-md-4">
                            <label>phone_number (Whatsapp)</label>
                            <input type="number" class="form-control" placeholder="Enter Number" name="phone"
                                pattern="[789][0-9]{9}" required>
                        </div>

                        <div class="col-md-4">
                            <label>DOB</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>

                        <div class="col-md-4">
                            <label>Registration no</label>
                            <input type="number" class="form-control" placeholder="Enter Registration no" name="reg_no"  required>
                        </div>

                        <div class="col-md-4">
                            <label>Services</label><br>

                            <select class="form-control" name="gender">
                                <option value="" disabled>Select Services</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="other">other</option>
                            </select>

                        </div>

                            <div class="col-md-4">
                            <label>Year of Experience</label>
                            <input type="number" class="form-control" placeholder="Enter Experience" name="year_of_exp"  required>
                        </div>
                       
                        <div class="col-md-4">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="Enter City" name="city"
                                required>                            
                        </div>   
                        
                        <!-- <div class="col-md-4">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*"
                                >                            
                        </div>  -->

                        <div class="col-md-4">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                required  autocomplete="off">                            
                        </div> 
                      
                        <div class="col-md-12">
                            <label>Address</label>
                            <textarea name="address"  rows="2" class="form-control" placeholder="Enter Address" required></textarea>                            
                        </div>
                    
                        <div class="col-md-2 mt-2">
                            <button type="submit" class="btn btn-info" name="submit">Register</button>
                        </div>
                       
                    </div>
                </form>

            </div>
              </div>
            </div>

         

        </div>
        <?php include "footer.php";?>