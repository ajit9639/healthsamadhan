
  <?php include "header.php";
   $get = $_GET['id'];
    $type = $_GET['type'];
  
    if($type == "delete"){
    $del = mysqli_query($conn , "DELETE FROM `package` WHERE `id`='$get'");
    echo "<script>alert('Package Deleted Successfully')</script>";
    echo "<script>window.location.href='view-package.php';</script>";
    }else{
    
  $get_all = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `package` where `id`='$get'"));

  if(isset($_POST['submit'])){
    $pack_name = $_POST['pack_name'];
    $pack_amount = $_POST['pack_amount'];
    $pack_duration = $_POST['pack_duration'];
    $pack_description = $_POST['pack_description'];
    
    $ins = mysqli_query($conn , "UPDATE `package` SET `package_name`='$pack_name',`package_amount`='$pack_amount',`package_duration`='$pack_duration',`package_description`='$pack_description' WHERE `id`='$get'" );
      if($ins){
        echo "<script>alert('Package Updated Successfully')</script>";
        echo "<script>window.location.href='view-package.php';</script>";
        
      }else{
        echo "<script>alert('Package Not Inserted')</script>";
      }
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
                  <h4 class="card-title">Create Package</h4>
                  
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-lg-4">
                        <label for="category_name">Enter Package Name</label>
                        <input value="<?php echo $get_all['package_name'] ?>" type="text" class="form-control"  name="pack_name" placeholder="Enter Package Name" required>
                      </div>
                                                        
                      <div class="form-group col-lg-4">
                        <label for="category_name">Enter Package Amount</label>
                        <input value="<?php echo $get_all['package_amount']?>" type="number" class="form-control"  name="pack_amount" placeholder="Enter Package Amount" required>
                      </div>

                      <div class="form-group col-lg-4">
                        <label for="category_name">Enter Package Duration (Year)</label>
                        <input value="<?php echo $get_all['package_duration'] ?>" type="number" class="form-control"  name="pack_duration" placeholder="Enter Package Duration" required>
                      </div>


                      <div class="form-group col-lg-12">
                        <label for="category_img">Package Description</label>
                        <!-- <input type="file" class="form-control" id="category_img" name="category_img"> -->
                        <textarea  name="pack_description" id="ckeditor"  class="ckeditor" required><?php echo $get_all['package_description']?></textarea>
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
        <?php include "footer.php";?>


        