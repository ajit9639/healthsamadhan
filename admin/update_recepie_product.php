
<script>
function getsate(val) {
    $.ajax({
        type: "POST",
        url: "get-sub-cat.php",
        data: '$countryid=' + val,
        success: function(data) {
            $("#state").html(data);
        }

    });
}
</script>

  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>

      <?php
     
      $idd = $_GET['id'];
     

       $query = "SELECT * FROM `products` where sno='$idd'";

      $fetched_data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($fetched_data);

      //$all_rows = mysqli_fetch_assoc($fetched_data);

    if($rows = mysqli_fetch_assoc($fetched_data))
            {
               $sno1=$rows['sno'];
               $product_name1=$rows['product_name'];
               $product_cat1=$rows['product_cat'];
               $product_sub_cat1=$rows['product_sub_cat'];
               $product_img1=$rows['product_img'];
               $product_desc1=$rows['product_desc'];
             
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
                        <label for="product_name">Enter Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Category Name" value="<?php echo $product_name1; ?>">
                      </div>


                      <div class="form-group col-lg-6">
                        <label for="product_cat">Select Product Category</label>
                        <select type="text" name="product_cat" id="country" required="true"
                            onChange="getsate(this.value)" class="form-control">
                            <option value="<?php echo $product_cat1; ?>"><?php echo $product_cat1; ?></option>
                            <?php $query=mysqli_query($conn,"select * from main_category");
                                  while($row=mysqli_fetch_array($query))
                                    {
                                    ?>
                            <option value="<?php echo $row['sno'];?>">
                                <?php echo $row['category_nm'];?></option>
                            <?php } ?>
                        </select>
                      </div>


                      <div class="form-group col-lg-6">
                        <label for="product_sub_cat">Select Product Sub Category</label>
                        <select type="text" class="form-control" name="product_sub_cat" id="state"
                                                    onChange="getcity(this.value)">
                            <option value="<?php echo $product_sub_cat1; ?>"><?php echo $product_sub_cat1 ?></option>
                        </select>
                      </div>
                      
                      <div class="form-group col-lg-6">
                        <label for="product_img">Product Image</label>
                        <input type="file" class="form-control" id="product_img" name="product_img" multiple="multiple">
                        <img src="product_img/<?php echo $product_img1; ?>" style="width:100px;height:100px;">
                      </div>

                      <div class="form-group col-lg-12">
                        <label for="product_desc">Product Description</label>
                        <textarea cols="30" rows="10" class="ckeditor" name="product_desc"  id="ckeditor"><?php echo $product_desc1 ?></textarea>
                      </div>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2 p-2">Submit</button>
                    <button class="btn btn-light p-2">Cancel</button>
                  </form>
                  <?php
                    if(isset($_POST['submit']))
                    {

                        $product_name =         $_POST['product_name'];
                        $product_cat =         $_POST['product_cat'];
                        $product_sub_cat =         $_POST['product_sub_cat'];
                    
                        // getting categories image files
                        $filename = $_FILES["product_img"]["name"];
                        $tempname = $_FILES["product_img"]["tmp_name"];
                        $folder = "product_img/".$filename;
                        move_uploaded_file($tempname, $folder);
                        // end getting categories image files
                    
                        $product_desc =    $_POST['product_desc'];

                       $id=$_POST['txtID'];
                      if($product_name != "" && $product_cat != "" && $product_sub_cat != "" && $filename != "" && $product_desc != "")
                      {
                      $query = "UPDATE `products` SET `product_name`='$product_name', `product_cat`='$product_cat',`product_sub_cat`='$product_sub_cat', `product_img`='$filename', `product_desc`='$product_desc' WHERE sno='$idd'";

                      $data = mysqli_query($conn,$query);

                      if ($data) {
                        echo "<script>alert('Category Updated!.');

                        window.location.href='all_recepie_products.php';</script>";
                        //header("location:view-visitors-call-enquiry.php");

                      }
                      else
                        echo "not inserted";
                    }
                    elseif( empty($filename) ){
                        $query = "UPDATE `products` SET `product_name`='$product_name', `product_cat`='$product_cat',`product_sub_cat`='$product_sub_cat',  `product_desc`='$product_desc' WHERE sno='$idd'";
                        $data = mysqli_query($conn,$query);

                        if ($data) {
                          echo "<script>alert('Category Updated!.');
  
                          window.location.href='all_recepie_products.php';</script>";
                          //header("location:view-visitors-call-enquiry.php");
  
                        }
                        else
                          echo "not inserted";
                    }
                    else{
                      echo"<script>alert('Something went wrong!please try again');
                                    window.location.href='all_recepie_products.php';
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

