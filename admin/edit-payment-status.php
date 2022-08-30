
  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>

      <?php
     $idd = $_GET['sno'];

      $query = "SELECT * FROM `users_payment` where sno='$idd'";

      $fetched_data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($fetched_data);

      //$all_rows = mysqli_fetch_assoc($fetched_data);

    if($rows = mysqli_fetch_assoc($fetched_data))
            {
              $userid1=$rows['userid'];
              $remarks1=$rows['remarks'];
              $approval1=$rows['approval'];
            }

     ?> 
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Visitors Enquiry</h4>
                  <form class="forms-sample" method="POST">

                    <input type="text" id="txtID" name="txtID" value="<?php echo $idd;?>">

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="userid">user id</label>
                          <input type="text" class="form-control" id="userid" name="userid" placeholder="Name" value="<?php echo $userid1;?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="remarks">remarks</label>
                          <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Phone" value="<?php echo $remarks1;?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="approval">approval status</label>
                          <select class="form-control form-control-sm" id="approval" name="approval">
                            <option value="<?php echo $approval1;?>"><?php echo $approval1;?></option>
                            <option value="Not Approved">Not Approved</option>
                            <option value="Approved">Approved</option>
                          </select>
                          <!-- <input type="text" class="form-control" name="approval" id="approval" placeholder="Name" value="<?php echo $approval1;?>"> -->
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  <?php
                    if(isset($_POST['submit']))
                    {

                      $userid = $_POST['userid'];
                      $remarks = $_POST['remarks'];
                      $approval = $_POST['approval'];
                      $id=$_POST['txtID'];
                      if($userid != "" && $remarks != "" && $approval != "")
                      {
                      $query = "UPDATE `users_payment` SET `userid`='$userid',`remarks`='$remarks',`approval`='$approval' WHERE sno='$id'";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>alert('Status Updated!.');

                        window.location.href='user-payment.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");

                      }
                      else
                        echo "not inserted";
                    }
                    else{
                      echo"<script>alert('Enquiry not submitted!please fill all fields');
                                    window.location.href='visitors-enquiry.php';
                            </script>";

                    }
                    }
                
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include'page-footer.php' ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php include 'footer.php' ?>
</body>

</html>

