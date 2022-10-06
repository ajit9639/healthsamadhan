
  <?php include "header.php";

  if(isset($_POST['submit'])){
    $product_name = $_POST['medicine_name'];
    $skunit = $_POST['skunit'];
    $mrp = $_POST['mrp'];
    $sale = $_POST['sale'];
    $qty = $_POST['qty'];
    $brand = $_POST['brand'];
             
    // $dt = date("M,d,Y h:i:s A");
    // $medicine_image = $_FILES['medicine_image']['name'];
    // $uploaddir = 'uploaded_img/';
    // $uploadfile = $uploaddir .basename($_FILES['medicine_image']['name']);
    // move_uploaded_file($_FILES['medicine_image']['tmp_name'], $uploadfile);

    $check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `medicines`  WHERE `product_name`='$product_name'"));    
    $ins = mysqli_query($conn , "INSERT INTO `medicines`(`product_name`, `skunit`, `mrp`, `sale`, `qty`, `brand`) VALUES ('$product_name','$skunit','$mrp','$sale','$qty','$brand')");        

    // if($ins){        
    //     $message[] = 'product add succesfully';
    //  }else{
    //     $message[] = 'could not add the product';
    //  }


    if($ins){
        $message[] = 'product add succesfully';;  
    }else{
        $message[] = 'could not add the product';  
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
                  <h4 class="card-title">Add Medicine</h4>
                  <?php 
                  if(isset($message)){
                 foreach($message as $message){
               echo '<div class="message"><h6 style="background: #e5e5df;padding: 10px;position: relative;">'.$message.' <span style="position: absolute;right: 50px;cursor: pointer;" onclick="this.parentElement.style.display = `none`;">x</span> </h6></div>';
   };
};
?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="email">Medicine Name</label>
                            <input type="text" class="form-control" placeholder="Enter Medicine Name" name="medicine_name"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label>Skunit</label>
                            <input type="text" class="form-control" placeholder="Enter Skunit" name="skunit"
                                required>
                        </div>
                                               
                        <div class="col-md-4">
                            <label>MRP</label>
                            <input type="number" class="form-control" placeholder="Enter MRP" name="mrp"  required>
                        </div>

                        <div class="col-md-4">
                            <label>Sale Price</label>
                            <input type="number" class="form-control" placeholder="Enter Sale Price" name="sale"  required>
                        </div>

                        
                        <!-- <div class="col-md-4">
                            <label>QTY</label>
                            <input type="number" class="form-control" placeholder="Enter QTY" name="qty"  required>
                        </div> -->
                       
                        <div class="col-md-4">
                            <label>Brand</label>
                            <input type="text" class="form-control" placeholder="Enter Brand" name="brand"
                                required>                            
                        </div>   

                        <!-- <div class="col-md-4">
                            <label>Medicine Image</label>
                            <input type="file" class="form-control"  name="medicine_image"
                                required>                            
                        </div>    -->
                                                
                                    
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