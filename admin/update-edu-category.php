<?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>

      <?php
     
      $idd = $_GET['id'];
     

       $query = "SELECT * FROM `category_edu` where sno='$idd'";

      $fetched_data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($fetched_data);

      //$all_rows = mysqli_fetch_assoc($fetched_data);

    if($rows = mysqli_fetch_assoc($fetched_data))
            {
              $sno1=$rows['sno'];
              $cat_name1=$rows['cat_name'];
              $cat_img1=$rows['cat_img'];
            }

     ?> 
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Visitors Enquiry</h4>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <input type="text" name="txtID" value="<?php echo $idd; ?>">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="cat_name">category name</label>
                          <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Name" value="<?php echo $cat_name1;?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="cat_img">category_img</label>
                          <input type="file" class="form-control" name="cat_img" id="cat_img" placeholder="Phone" value="<?php echo $cat_img1;?>">
                          <img src='edu_cat_image/<?php echo $cat_img1; ?> ' style='width: 100px;
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

                      $cat_name = $_POST['cat_name'];
                      // getting categories image files
                        $filename = $_FILES["cat_img"]["name"];
                        $tempname = $_FILES["cat_img"]["tmp_name"];
                        $folder = "edu_cat_image/".$filename;
                        move_uploaded_file($tempname, $folder);
                      // end getting categories image files
                       $id=$_POST['txtID'];
                      if($cat_name != "" && $filename != "")
                      {
                      $query = "UPDATE `category_edu` SET `cat_name`='$cat_name',`cat_img`='$filename' WHERE sno='$id'";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>alert('Category Updated!.');

                        window.location.href='all_edu_category.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");

                      }
                      else
                        echo "not inserted";
                    }
                    elseif( empty($filename) ){
                        $query = "UPDATE `category_edu` SET `cat_name`='$cat_name' WHERE sno='$id'";
                        $data = mysqli_query($conn,$query);

                        if ($data) {
                          echo "<script>alert('Category Updated!.');
  
                          window.location.href='all_edu_category.php';</script>";
                          //header("location:view-visitors-call-enquiry.php");
  
                        }
                        else
                          echo "not inserted";
                    }
                    else{
                      echo"<script>alert('Something went wrong!please try again');
                                    window.location.href='all_edu_category.php';
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

