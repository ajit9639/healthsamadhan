<?php include "header.php";
   $get = $_GET['id'];
    $type = $_GET['type'];
  
    if($type == "delete"){
    $del = mysqli_query($conn , "DELETE FROM `brand` WHERE `sno`='$get'");
    echo "<script>alert('Brand Deleted Successfully')</script>";
    echo "<script>window.location.href='view_brand.php';</script>";
    }else{
 
    $mysqrives = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `brand`  WHERE `sno`='$get'"));

    if(isset($_POST['submit'])){
    $brand_name = $_POST['brand_name'];
    
    $check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `brand`  WHERE `brand_name`='$brand_name'"));

    if($check > 0){
      echo "<script>alert('already registered')</script>";
    }else{
    $ins = mysqli_query($conn , "UPDATE `brand` SET `brand_name`='$brand_name' where `sno`='$get'");
    if($ins){
        echo"<script>
        alert('Updation Successfully');
     window.location.href='view_brand.php';
        </script>";  
    }else{
        echo"<script>alert('Invalid credential');
        </script>";  
    }
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
                            <h4 class="card-title">Edit Brand</h4>

                            <form method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Brand Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Brand"
                                            name="brand_name" value="<?php echo $mysqrives['brand_name'] ?>" required>
                                    </div>

                                    <div class="col-md-2 mt-2">
                                        <button type="submit" class="btn btn-info btn btn-primary mr-2 p-2"
                                            name="submit">Update</button>

                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <?php include "footer.php";?>