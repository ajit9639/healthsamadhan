<?php include "header.php"; 



if(isset($_POST['submit']))
  {

    $brand_name = $_POST['brand_name'];


        if($brand_name != "" )
        {
         $query = " INSERT INTO brand ( brand_name) VALUES ('$brand_name')";

        $data = mysqli_query($conn,$query);

        if ($data) {
          echo "<script>alert('Entry Submitted!.');</script>";
                        header("location:view_brand.php");

        }
        else{
          echo "<script>alert('Unable to Submit. Please try again');</script>";
                         header("location:view_brand.php");
        }
      }
      else{
        echo"<script> alert('Unable to Submit. Please try again!');
                      window.location.href='view_brand.php';
              </script>";

      }
    }
    
    ?>


    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Brand</h4>
                  
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="brand_name">Enter Brand Name</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Category Name">
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

