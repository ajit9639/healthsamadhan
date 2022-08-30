
    <?php include "header.php";?>

    <div class="container-fluid page-body-wrapper">

        <?php include "sidebar.php";?>

        <div class="main-panel">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Sub Category</h4>

                                <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="sub_category_name">Enter Sub Category Name</label>
                                            <input type="text" class="form-control" id="sub_category_name"
                                                name="sub_category_name" placeholder="Enter Sub Category Name">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="category_name">Select Category Name</label>
                                            <select class="form-control form-control-sm" id="category_name"
                                                name="category_name">
                                                <option value="">--Select--</option>
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
                                        <div class="form-group col-lg-6">
                                            <label for="sub_category_img">Category Image</label>
                                            <input type="file" class="form-control" id="sub_category_img"
                                                name="sub_category_img">
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

    $sub_category_name =         $_POST['sub_category_name'];
    $category_name =         $_POST['category_name'];

    // getting categories image files
    $filename = $_FILES["sub_category_img"]["name"];
    $tempname = $_FILES["sub_category_img"]["tmp_name"];
    $folder = "sub_categories_img/".$filename;
    move_uploaded_file($tempname, $folder);
    // end getting categories image files
    

        if($sub_category_name != "" && $category_name != "" && $filename != "")
        {
         $query = " INSERT INTO sub_category ( sub_category_name, category_name , sub_category_img) VALUES ('$sub_category_name', '$category_name', '$filename')";

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