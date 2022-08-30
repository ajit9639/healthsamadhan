 <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>

      <?php
     
      $idd = $_GET['id'];
     

       $query = "SELECT * FROM `sub_category` where sno='$idd'";

      $fetched_data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($fetched_data);

      //$all_rows = mysqli_fetch_assoc($fetched_data);

    if($rows = mysqli_fetch_assoc($fetched_data))
            {
              $sno1=$rows['sno'];
              $sub_category_name1=$rows['sub_category_name'];
              $category_name1=$rows['category_name'];
              $sub_category_img1=$rows['sub_category_img'];
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
                          <label for="sub_category_name"> Sub category name</label>
                          <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" placeholder="Name" value="<?php echo $sub_category_name1;?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="category_name">Select category name</label>
                          <select class="form-control form-control-sm" id="category_name" name="category_name">
                        <option value="<?php echo $category_name1; ?>"><?php echo $category_name1; ?></option>
								          <?php
					                error_reporting(0);
					                $query1 = "SELECT * FROM main_category";

					                $fetched_data = mysqli_query($conn,$query1);

					                $total = mysqli_num_rows($fetched_data);

					                $all_rows = mysqli_fetch_assoc($fetched_data);
					                	if($total != 0){
                                            $data = mysqli_query($conn,"SELECT * FROM `main_category`");
					                		while($all_rows = mysqli_fetch_assoc($data))
					                		{
					                			echo "<option value='".$all_rows['sno']."'>".$all_rows['category_nm']."</option>";
					                		}
					                	}
                                        ?>
					                	
                        </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="sub_category_img">Sub category img</label>
                          <input type="file" class="form-control" name="sub_category_img" id="sub_category_img" placeholder="Phone" value="<?php echo $sub_category_img1;?>">
                          <img src='sub_categories_img/<?php echo $sub_category_img1; ?> ' style='width: 100px;
                                height: auto;'>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  <?php
                    if(isset($_POST['submit']))
                    {

                      $category_name = $_POST['category_name'];
                      $sub_category_name = $_POST['sub_category_name'];
                      // getting categories image files
                        $filename = $_FILES["sub_category_img"]["name"];
                        $tempname = $_FILES["sub_category_img"]["tmp_name"];
                        $folder = "sub_categories_img/".$filename;
                        move_uploaded_file($tempname, $folder);
                      // end getting categories image files
                       $id=$_POST['txtID'];
                      if($sub_category_name != "" && $category_name != "" && $filename != "")
                      {
                      $query = "UPDATE `sub_category` SET `sub_category_name`='$sub_category_name',`category_name`='$category_name',`sub_category_img`='$filename' WHERE sno='$id'";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>alert(' Sub Category Updated!.');

                        window.location.href='all_sub_categories.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");

                      }
                      else
                        echo "not inserted";
                    }
                    elseif(empty($filename) ){
                        $query = "UPDATE `sub_category` SET `sub_category_name`='$sub_category_name',`category_name`='$category_name' WHERE sno='$id'";
                        $data = mysqli_query($conn,$query);

                        if ($data) {
                          echo "<script>alert('Category Updated!.');
  
                          window.location.href='all_sub_categories.php';</script>";
                          //header("location:view-visitors-call-enquiry.php");
  
                        }
                        else
                          echo "not inserted";
                    }
                    else{
                      echo"<script>alert('Something went wrong!please try again');
                                    window.location.href='all_sub_categories.php';
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

