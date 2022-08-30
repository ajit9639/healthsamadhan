 <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>

      <?php
     
      $idd = $_GET['id'];
     

       $query = "SELECT * FROM `edu_vid_product` where sno='$idd'";

      $fetched_data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($fetched_data);

      //$all_rows = mysqli_fetch_assoc($fetched_data);

    if($rows = mysqli_fetch_assoc($fetched_data))
            {
              echo $sno1=$rows['sno'];
              echo $vid_cat1=$rows['vid_cat'];
              echo $vid_name1=$rows['vid_name'];
              echo $edu_vid1=$rows['edu_vid'];
             
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
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="vid_cat">Select Video Category</label>
                            <select type="text" name="vid_cat" id="country"
                                class="form-control">
                                <option value="<?php echo $vid_cat1 ?>"><?php echo $vid_cat1 ?></option>
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
                        <input type="text" class="form-control" id="vid_name" name="vid_name" value="<?php echo $vid_name1; ?>">
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="edu_vid">Upload Educational Video</label>
                        <input type="file" class="form-control" id="edu_vid" name="edu_vid">

                        <video width='220' height='140' controls>
                                    <source src='edu_products/<?php echo $edu_vid1 ?>' type='video/mp4'>
                                </video>
                      </div>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2 p-2">Submit</button>
                    <button class="btn btn-light p-2">Cancel</button>
                  </form>
                  <?php
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

                       $id=$_POST['txtID'];
                      if($vid_cat != "" && $filename != "" && $vid_name !="")
                      {
                      $query = "UPDATE `edu_vid_product` SET `vid_cat`='$vid_cat', `vid_name`='$vid_name',`edu_vid`='$filename' WHERE sno='$idd'";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>alert('Category Updated!.');

                        window.location.href='all_edu_vid.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");

                      }
                      else
                        echo "not inserted";
                    }
                    elseif( empty($filename) ){
                        $query = "UPDATE `edu_vid_product` SET `vid_cat`='$vid_cat', `vid_name`='$vid_name' WHERE sno='$idd'";
                        $data = mysqli_query($conn,$query);

                        if ($data) {
                          echo "<script>alert('Category Updated!.');
  
                          window.location.href='all_edu_vid.php';</script>";
                          //header("location:view-visitors-call-enquiry.php");
  
                        }
                        else
                          echo "not inserted";
                    }
                    else{
                      echo"<script>alert('Something went wrong!please try again');
                                    window.location.href='all_edu_vid.php';
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
        <?php include 'page-footer.php' ?>
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

