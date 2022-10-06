
  <?php include "header.php";

$type = $_GET['type'];
$get_id = $_GET['id'];


if($type == 'delete'){
$del = mysqli_query($conn , "DELETE FROM `medicines` WHERE `id`='$get_id'");
if($del){
    echo "<script> 
    location.replace('medicines_view.php');
    </script>";
}else{
    echo "<script>alert('Data Not Deleted');</script>";
}
}else{

  if(isset($_POST['submit'])){
    $product_name = $_POST['medicine_name'];
    $skunit = $_POST['skunit'];
    $mrp = $_POST['mrp'];
    $sale = $_POST['sale'];
    $qty = $_POST['qty'];
    $brand = $_POST['brand'];                                                 

    $ins = mysqli_query($conn , "UPDATE `medicines` SET `product_name`='$product_name',`skunit`='$skunit',`mrp`='$mrp',`sale`='$sale',`qty`='$qty',`brand`='$brand' WHERE `id`='$get_id'");        

    if($ins){
        echo"<script>
        alert('Registration Successfully');
        window.location.href='medicines_view.php';
        </script>";  
    }else{
        echo"<script>alert('Invalid credential');
        </script>";  
    }
    }
    }     

    $check1 = mysqli_query($conn , "SELECT * FROM `medicines`  WHERE `id`='$get_id'");
    $check = mysqli_fetch_assoc($check1); 
    ?>

<div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Medicine
                  
                  </h4>

                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="email">Medicine Name</label>
                            <input type="text" class="form-control" placeholder="Enter Medicine Name" name="medicine_name" value="<?= $check['product_name'] ?>"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label>Skunit</label>
                            <input type="text" class="form-control" placeholder="Enter Skunit" name="skunit" value="<?= $check['skunit'] ?>"
                                required>
                        </div>
                                               
                        <div class="col-md-4">
                            <label>MRP</label>
                            <input type="number" class="form-control" placeholder="Enter MRP" name="mrp"   value="<?= $check['mrp'] ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label>Sale Price</label>
                            <input type="number" class="form-control" placeholder="Enter Sale Price" name="sale"   value="<?= $check['sale'] ?>" required>
                        </div>

                        
                        <!-- <div class="col-md-4">
                            <label>QTY</label>
                            <input type="number" class="form-control" placeholder="Enter QTY" name="qty"   value="<?= $check['qty'] ?>" required>
                        </div> -->
                       
                        <div class="col-md-4">
                            <label>Brand</label>
                            <input type="text" class="form-control" placeholder="Enter Brand" name="brand"  value="<?= $check['brand'] ?>"
                                required>                            
                        </div>   
                                                                                    
                        <div class="col-md-2 mt-2">
                            <button type="submit" class="btn btn-info" name="submit">Register</button>
                        </div>
                       
                    </div>
                </form>

            </div>
              </div>
            </div>

         

        </div>
        <?php include "footer.php";?>