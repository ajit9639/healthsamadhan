
  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Education Category</h4>
                  
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="cat_name">Enter Education Category Name</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Enter Category Name">
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="cat_img">Education Category Image</label>
                        <input type="file" class="form-control" id="cat_img" name="cat_img">
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

    $cat_name =         $_POST['cat_name'];

    // getting categories image files
    $filename = $_FILES["cat_img"]["name"];
    $tempname = $_FILES["cat_img"]["tmp_name"];
    $folder = "edu_cat_image/".$filename;
    move_uploaded_file($tempname, $folder);
    // end getting categories image files
    

        if($cat_name != "" && $filename != "")
        {
         $query = " INSERT INTO category_edu ( cat_name , cat_img) VALUES ('$cat_name', '$filename')";

        $data = mysqli_query($conn,$query);

        if ($data) {
          echo "<script>alert('Entry Submitted!.');</script>";
                        header("location:create-category.php");

        }
        else{
          echo "<script>alert('Unable to Submit. Please try again');</script>";
                         header("location:create-category.php");
        }
      }
      else{
        echo"<script> alert('Unable to Submit. Please try again!');
                      window.location.href='create-category.php';
              </script>";

      }
    }
 
?>
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

