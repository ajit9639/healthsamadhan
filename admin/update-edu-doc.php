
  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>

      <?php
     
      $idd = $_GET['id'];
     

       $query = "SELECT * FROM `edu_doc_product` where sno='$idd'";

      $fetched_data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($fetched_data);

      //$all_rows = mysqli_fetch_assoc($fetched_data);

    if($rows = mysqli_fetch_assoc($fetched_data))
            {
               $sno1=$rows['sno'];
               $edu_cat1=$rows['edu_cat'];
               $doc_name1=$rows['doc_name'];
               $edu_doc1=$rows['edu_doc'];
             
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
                        <label for="doc_name">Document Name</label>
                        <input type="text" class="form-control" id="doc_name" name="doc_name" value="<?php echo $doc_name1; ?>">
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="edu_doc">Upload Educational Document</label>
                        <input type="file" class="form-control" id="edu_doc" name="edu_doc">
                        <iframe
                                    src='edu_products/<?php echo $edu_doc1 ?>'
                                    frameBorder='0'
                                    scrolling='auto'
                                    height='100px'
                                    width='100%'
                                ></iframe>
                      </div>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2 p-2">Submit</button>
                    <button class="btn btn-light p-2">Cancel</button>
                  </form>
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

                       $id=$_POST['txtID'];
                      if($edu_cat != "" && $doc_name !="" && $filename != "")
                      {
                      $query = "UPDATE `edu_doc_product` SET `edu_cat`='$edu_cat', `doc_name`='$doc_name',`edu_doc`='$filename' WHERE sno='$idd'";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>alert('Category Updated!.');

                        window.location.href='all_edu_doc.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");

                      }
                      else
                        echo "not inserted";
                    }
                    elseif( empty($filename) ){
                        $query = "UPDATE `edu_doc_product` SET `edu_cat`='$edu_cat', `doc_name`='$doc_name' WHERE sno='$idd'";
                        $data = mysqli_query($conn,$query);

                        if ($data) {
                          echo "<script>alert('Category Updated!.');
  
                          window.location.href='all_edu_doc.php';</script>";
                          //header("location:view-visitors-call-enquiry.php");
  
                        }
                        else
                          echo "not inserted";
                    }
                    else{
                      echo"<script>alert('Something went wrong!please try again');
                                    window.location.href='all_edu_doc.php';
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

