
  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Mul Derbas entry</h4>
                  
                  <form class="forms-sample" method="POST">
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="mul">Enter mul</label>
                        <input type="text" class="form-control" id="mul" name="mul" placeholder="Enter Mul">
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="der">Enter Der bas</label>
                        <input type="text" class="form-control" id="der" name="der" placeholder="Enter Dera Bas">
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
// alert show hide not working
    $mul =         $_POST['mul'];
    $der =    $_POST['der'];

   
    
        if($mul != "" && $der != "")
        {
        $query = " INSERT INTO admin_entry ( mul, der) VALUES ('$mul', '$der')";

        $data = mysqli_query($conn,$query);

        if ($data) {
          echo "<script>alert('Entry Submitted!.');</script>";
                        header("location:admin_entry.php");

        }
        else{
          echo "<script>alert('Unable to Submit. Please try again');</script>";
                         header("location:admin_entry.php");
        }
      }
      else{
        echo"<script> alert('Unable to Submit. Please try again!');
                      window.location.href='admin_entry.php';
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

