 <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>

      <?php
     
      $idd = $_GET['id'];
     

       $query = "SELECT * FROM `brands` where sno='$idd'";

      $fetched_data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($fetched_data);

      //$all_rows = mysqli_fetch_assoc($fetched_data);

    if($rows = mysqli_fetch_assoc($fetched_data))
            {
              $sno1=$rows['sno'];
              $brand_name1=$rows['brand_name'];
              $brand_img1=$rows['brand_img'];
            }

     ?> 
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update brand</h4>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <input type="text" name="txtID" value="<?php echo $idd; ?>" readonly>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="brand_name">Brand name</label>
                          <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Name" value="<?php echo $brand_name1;?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="brand_img">Brand_img</label>
                          <input type="file" class="form-control" name="brand_img" id="brand_img" placeholder="Phone" value="<?php echo $brand_img1;?>">
                          <img src='brand_img/<?php echo $brand_img1; ?> ' style='width: 100px;
                                height: auto;'>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  <?php
                    if(isset($_POST['submit']))
                    {

                      $brand_name = $_POST['brand_name'];
                      // getting categories image files
                        $filename = $_FILES["brand_img"]["name"];
                        $tempname = $_FILES["brand_img"]["tmp_name"];
                        $folder = "brand_img/".$filename;
                        move_uploaded_file($tempname, $folder);
                      // end getting categories image files
                       $id=$_POST['txtID'];
                      if($brand_name != "" && $filename != "")
                      {
                      $query = "UPDATE `brands` SET `brand_name`='$brand_name',`brand_img`='$filename' WHERE sno='$id'";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>alert('Category Updated!.');

                        window.location.href='all_brands.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");

                      }
                      else
                        echo "not inserted";
                    }
                    elseif( empty($filename) ){
                        $query = "UPDATE `brands` SET `brand_name`='$brand_name' WHERE sno='$id'";
                        $data = mysqli_query($conn,$query);

                        if ($data) {
                          echo "<script>alert('Category Updated!.');
  
                          window.location.href='all_brands.php';</script>";
                          //header("location:view-visitors-call-enquiry.php");
  
                        }
                        else
                          echo "not inserted";
                    }
                    else{
                      echo"<script>alert('Something went wrong!please try again');
                                    window.location.href='all_brands.php';
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

