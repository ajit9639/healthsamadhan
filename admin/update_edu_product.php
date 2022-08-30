
  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>

      <?php
     
      $idd = $_GET['id'];
     

       $query = "SELECT * FROM `edu_product` where sno='$idd'";

      $fetched_data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($fetched_data);

      //$all_rows = mysqli_fetch_assoc($fetched_data);

    if($rows = mysqli_fetch_assoc($fetched_data))
            {
              $sno1=$rows['sno'];
              $product_name1=$rows['product_name'];
              $product_cat1=$rows['product_cat'];
              echo $product_img1=$rows['product_img'];
              $product_desc1=$rows['product_desc'];
              $product_video1=$rows['product_video'];
              $product_audio1=$rows['product_audio'];


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
                          <label for="product_name">Product name</label>
                          <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Name" value="<?php echo $product_name1;?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="product_cat">category Name</label>
                          <input type="text" class="form-control" name="product_cat" id="product_cat" placeholder="Phone" value="<?php echo $product_cat1;?>">
                          
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="product_img">Product Image</label>
                          <input type="file" class="form-control" name="product_img" id="product_img" placeholder="Phone" value="<?php echo $product_img1;?>">
                          <img  src='edu_product_img/<?php echo $product_img1?>' style='width: 100px; height: auto;'>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="product_desc">Product Description</label>
                          <textarea class="form-control ckeditor" id="ckeditor"  name="product_desc" ><?php echo $product_desc1;?></textarea>
                          
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="product_video">Product Video</label>
                          <input type="file" class="form-control" name="product_video" id="product_video" placeholder="Phone" value="<?php echo $product_video1;?>">
                          <video width='220' height='140' controls>
                                    <source src='edu_product_img/<?php echo $product_video1 ?>' type='video/mp4'>
                          </video>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="product_audio">Product Audio</label>
                          <input type="file" class="form-control" name="product_audio" id="product_audio" placeholder="Phone" value="<?php echo $product_audio1;?>">
                          <audio controls>
                                <source src='edu_product_img/<?php echo $product_audio1 ?>' type='audio/ogg'>
                          </audio>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  <?php 
                  if(isset($_POST['submit']))
  {

    $product_name =         $_POST['product_name'];
    $product_cat =         $_POST['product_cat'];

    // getting categories image files
    $filename = $_FILES["product_img"]["name"];
    $tempname = $_FILES["product_img"]["tmp_name"];
    $folder = "edu_product_img/".$filename;
    move_uploaded_file($tempname, $folder);
    // end getting categories image files

    $product_desc =    $_POST['product_desc'];

  
    // getting categories image files
    $filename1 = $_FILES["product_video"]["name"];
    $tempname = $_FILES["product_video"]["tmp_name"];
    $folder = "edu_product_img/".$filename1;
    move_uploaded_file($tempname, $folder);
    // end getting categories image files
   
    // getting categories image files
    $filename2 = $_FILES["product_audio"]["name"];
    $tempname = $_FILES["product_audio"]["tmp_name"];
    $folder = "edu_product_img/".$filename2;
    move_uploaded_file($tempname, $folder);
    // end getting categories image files



    

        if($product_name != "" || $product_cat != ""  || $filename != "" || $product_desc != "")
        {
         $query = "INSERT INTO edu_product ( product_name , product_cat, product_img, product_desc, product_video, product_audio) VALUES ('$product_name', '$product_cat', '$filename', '$product_desc', '$filename1', '$filename2')";

        $data1 = mysqli_query($conn,$query);

        if ($data1) {
          echo "<script>alert('Entry Submitted!.');</script>";
                        header("location:create_edu_product.php");
        }
        else{
          echo "<script>alert('Unable to Submit. Please try again');</script>";
                         header("location:create_edu_product.php");
        }
      }
      else{
        echo"<script> alert('Unable to Submit. Please try again!');
                      window.location.href='create_edu_product.php';
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

