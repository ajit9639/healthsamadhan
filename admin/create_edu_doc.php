
  

  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Education Audio</h4>
                  
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="edu_cat">Select Category</label>
                            <select type="text" name="edu_cat" id="country"
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
                        <label for="doc_name">Document Name</label>
                        <input type="text" class="form-control" id="doc_name" name="doc_name">
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="edu_doc">Upload Educational Document</label>
                        <input type="file" class="form-control" id="edu_doc" name="edu_doc">
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

    $edu_cat =         $_POST['edu_cat'];

    $doc_name =         $_POST['doc_name'];

    // getting categories image files
    $filename = $_FILES["edu_doc"]["name"];
    $tempname = $_FILES["edu_doc"]["tmp_name"];
    $folder = "edu_products/".$filename;
    move_uploaded_file($tempname, $folder);
    // end getting categories image files

    
    

        if($edu_cat != "" && $doc_name !="" && $filename != "")
        {
         $query = " INSERT INTO edu_doc_product ( edu_cat,doc_name	, edu_doc ) VALUES ('$edu_cat', '$doc_name', '$filename')";

        $data = mysqli_query($conn,$query);

        if ($data) {
          echo "<script>alert('Entry Submitted!.');</script>";
                        header("location:create_edu_doc.php");

        }
        else{
          echo "<script>alert('Unable to Submit. Please try again');</script>";
                         header("location:create_edu_doc.php");
        }
      }
      else{
        echo"<script> alert('Unable to Submit. Please try again!');
                      window.location.href='create_edu_doc.php';
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

