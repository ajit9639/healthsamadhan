 <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>

      <?php
     
      $idd = $_GET['id'];
     

       $query = "SELECT * FROM `edu_aud_product` where sno='$idd'";

      $fetched_data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($fetched_data);

      //$all_rows = mysqli_fetch_assoc($fetched_data);

    if($rows = mysqli_fetch_assoc($fetched_data))
            {
              echo $sno1=$rows['sno'];
              echo $edu_cat1=$rows['edu_cat'];
              echo $aud_name1=$rows['aud_name'];
              echo $edu_aud1=$rows['edu_aud'];
             
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
                            <label for="edu_cat">Select Category</label>
                            <select type="text" name="edu_cat" id="country"
                                class="form-control">
                                <option value="<?php echo $edu_cat1 ?>"><?php echo $edu_cat1 ?></option>
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
                        <label for="aud_name">Audio Name</label>
                        <input type="text" class="form-control" id="aud_name" name="aud_name" value="<?php echo $aud_name1 ?>">
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="edu_aud">Upload Educational Audio</label>
                        <input type="file" class="form-control" id="edu_aud" name="edu_aud">
                        <audio controls>
                                    <source src='edu_products/<?php echo $edu_aud1 ?>' type='audio/mp3'>
                                </audio>
                      </div>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2 p-2">Submit</button>
                    <button class="btn btn-light p-2">Cancel</button>
                  </form>
                  <?php
                    if(isset($_POST['submit']))
                    {

                        $edu_cat =         $_POST['edu_cat'];

                        $aud_name =         $_POST['aud_name'];
                    
                        // getting categories image files
                        $filename = $_FILES["edu_aud"]["name"];
                        $tempname = $_FILES["edu_aud"]["tmp_name"];
                        $folder = "edu_products/".$filename;
                        move_uploaded_file($tempname, $folder);
                        // end getting categories image files
                    
                        

                       $id=$_POST['txtID'];
                      if($edu_cat != "" && $aud_name !="" && $filename != "")
                      {
                      $query = "UPDATE `edu_aud_product` SET `edu_cat`='$edu_cat', `aud_name`='$aud_name',`edu_aud`='$filename' WHERE sno='$idd'";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>alert('Category Updated!.');

                        window.location.href='all_edu_aud.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");

                      }
                      else
                        echo "not inserted";
                    }
                    elseif( empty($filename) ){
                        $query = "UPDATE `edu_aud_product` SET `edu_cat`='$edu_cat', `aud_name`='$aud_name' WHERE sno='$idd'";
                        $data = mysqli_query($conn,$query);

                        if ($data) {
                          echo "<script>alert('Category Updated!.');
  
                          window.location.href='all_edu_aud.php';</script>";
                          //header("location:view-visitors-call-enquiry.php");
  
                        }
                        else
                          echo "not inserted";
                    }
                    else{
                      echo"<script>alert('Something went wrong!please try again');
                                    window.location.href='all_edu_aud.php';
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

