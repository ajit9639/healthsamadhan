
  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Enter product details</h4>
                  
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="product_name">Enter Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Category Name">
                      </div>


                      <div class="form-group col-lg-6">
                        <label for="product_cat">Select Product Category</label>
                        <select type="text" name="product_cat" id="country"
                             class="form-control">
                            <option value="">Select Product Category</option>
                            <?php $query=mysqli_query($conn,"select * from category_edu");
                                  while($row=mysqli_fetch_array($query))
                                    {
                                    ?>
                            <option value="<?php echo $row['sno'];?>">
                                <?php echo $row['cat_name'];?></option>
                            <?php } ?>
                        </select>
                      </div>
                      
                      <div class="form-group col-lg-6">
                        <label for="product_img">Product Image</label>
                        <input type="file" class="form-control" id="product_img" name="product_img" multiple="multiple">
                      </div>

                      <div class="form-group col-lg-12">
                        <label for="product_desc">Product Description</label>
                        <textarea cols="30" rows="10" class="ckeditor" name="product_desc"  id="ckeditor"></textarea>
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="product_video">Product Video</label>
                        <input type="file" class="form-control" id="product_video" name="product_video" multiple="multiple">
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="product_audio">Product Audio</label>
                        <input type="file" class="form-control" id="product_audio" name="product_audio" multiple="multiple">
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



    

        if($product_name != "" || $product_cat != ""  || $filename != "" || $product_desc != "" || $filename1 != "" || $filename2 != "")
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

  <?php include "footer.php";?>
</body>

</html>

