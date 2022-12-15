
  <?php include "header.php";
  $id = $_GET['id'];
  if(isset($_POST['submit'])){
    $app_status = $_POST['app_status'];
    $app_date = $_POST['app_date'];
    $app_time = $_POST['app_time'];    
    
    // echo "UPDATE `app_status`='$app_status',`app_date`='$app_date',`app_time`='$app_time' WHERE `id` = '$id'";exit;
    $ins = mysqli_query($conn , "UPDATE `appointment` SET `app_status`='$app_status',`app_date`='$app_date',`app_time`='$app_time' WHERE `id` = '$id'");
    if($ins){
        echo"<script>
        alert('Updation Successfully');
         window.location.href='view_appointment.php';
        </script>";  
    }else{
        echo"<script>alert('Invalid credential');
        </script>";  
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
                  <h4 class="card-title">Update Appointment </h4>
                  
                  <form action="#" method="POST" >
                    <div class="row">
                        <div class="col-md-4">
                            <label>Appointment Status</label>
                                <select class="form-control" name="app_status">
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                </select>
                        </div>

                        <div class="col-md-4">
                            <label>Appointment Date</label>
                            <input type="date" class="form-control" placeholder="Enter Date" name="app_date"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label>Appointment Time</label>
                            <input type="time" class="form-control" placeholder="Enter Time" name="app_time"
                                required>
                        </div>
                       
                    
                        <div class="col-md-2 mt-2">
                            <button type="submit" class="btn btn-info btn btn-primary mr-2 p-2" name="submit">Update</button>                            
                        </div>
                        
                    </div>
                </form>

                </div>
              </div>
            </div>

         

        </div>
        <?php include "footer.php";?>


        