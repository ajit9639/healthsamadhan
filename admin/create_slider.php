<?php include"conn.php"; 

if(isset($_POST['submit']))
  {

    $slider_name =  $_POST['slider_name'];

    // getting categories image files
    $filename = $_FILES["slider_img"]["name"];
    $tempname = $_FILES["slider_img"]["tmp_name"];
    $folder = "sliders/".$filename;
    move_uploaded_file($tempname, $folder);
    // end getting categories image files
    

        if($slider_name != "" && $filename != "")
        {
         $query = " INSERT INTO banner_slider ( slider_name , slider_img) VALUES ('$slider_name', '$filename')";

        $data = mysqli_query($conn,$query);

        if ($data) {
          echo "<script>alert('Entry Submitted!.');</script>";
                        header("location:create-slider.php");

        }
        else{
          echo "<script>alert('Unable to Submit. Please try again');</script>";
                         header("location:create-slider.php");
        }
      }
      else{
        echo"<script> alert('Unable to Submit. Please try again!');
                      window.location.href='create-slider.php';
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
                  <h4 class="card-title">Create Category</h4>
                  
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="slider_name">Enter Slider Name</label>
                        <input type="text" class="form-control" id="slider_name" name="slider_name" placeholder="Enter Category Name">
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="slider_img">Slider Image</label>
                        <input type="file" class="form-control" id="slider_img" name="slider_img">
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

