<?php include"conn.php"; 

if(isset($_POST['submit']))
  {

    $vid_cat =         $_POST['vid_cat'];

    $vid_name =         $_POST['vid_name'];

    // getting categories image files
    $filename = $_FILES["edu_vid"]["name"];
    $tempname = $_FILES["edu_vid"]["tmp_name"];
    $folder = "edu_products/".$filename;
    move_uploaded_file($tempname, $folder);
    // end getting categories image files

    
    

        if($vid_cat != "" && $filename != "" && $vid_name !="")
        {
         $query = " INSERT INTO edu_vid_product ( vid_cat,vid_name, edu_vid ) VALUES ('$vid_cat', '$vid_name', '$filename')";

        $data = mysqli_query($conn,$query);

        if ($data) {
          echo "<script>alert('Entry Submitted!.');</script>";
                        header("location:create_edu_vid_cat.php");

        }
        else{
          echo "<script>alert('Unable to Submit. Please try again');</script>";
                         header("location:create_edu_vid_cat.php");
        }
      }
      else{
        echo"<script> alert('Unable to Submit. Please try again!');
                      window.location.href='create_edu_vid_cat.php';
              </script>";

      }
    }
 


?>


  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Education Video Category</h4>
                  
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="vid_cat">Select Category</label>
                            <select type="text" name="vid_cat" id="country"
                                class="form-control">
                                <option value="">Select Product Category</option>
                                <?php $query=mysqli_query($conn,"select * from edu_vid_cat");
                                    while($row=mysqli_fetch_array($query))
                                        {
                                        ?>
                                <option value="<?php echo $row['sno'];?>">
                                    <?php echo $row['cat_name'];?></option>
                                <?php } ?>
                            </select>
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="vid_name">Video Name</label>
                        <input type="text" class="form-control" id="vid_name" name="vid_name">
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="edu_vid">Upload Educational Video</label>
                        <input type="file" class="form-control" id="edu_vid" name="edu_vid">
                      </div>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2 p-2">Submit</button>
                    <button class="btn btn-light p-2">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
       
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include 'page-footer.php' ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php include "footer.php";?>
</body>

</html>

