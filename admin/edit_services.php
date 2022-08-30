<?php include "header.php";
   $get = $_GET['id'];
    $type = $_GET['type'];
  
    if($type == "delete"){
    $del = mysqli_query($conn , "DELETE FROM `services` WHERE `id`='$get'");
    echo "<script>alert('Services Deleted Successfully')</script>";
    echo "<script>window.location.href='view_services.php';</script>";
    }else{
 
    $mysqrives = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `services`  WHERE `id`=' $get'"));

  if(isset($_POST['submit'])){
    $services = $_POST['services'];
    
    $check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `services`  WHERE `services`='$services'"));

    if($check > 0){
      echo "<script>alert('already registered')</script>";
    }else{
    $ins = mysqli_query($conn , "UPDATE `services` SET `services`='$services' where `id`='$get'");
    if($ins){
        echo"<script>
        alert('Updation Successfully');
     window.location.href='view_services.php';
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
                            <h4 class="card-title">Edit Services</h4>

                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>services Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Service"
                                            name="services" value="<?php echo $mysqrives['services'] ?>" required>
                                    </div>


                                    <div class="col-md-2 mt-2">
                                        <button type="submit" class="btn btn-info btn btn-primary mr-2 p-2"
                                            name="submit">Update</button>

                                    </div>
                                    <!-- <div class="col-md-2 mt-2">
                            <a href="login.php" class="btn btn-success">Login</a>
                        </div> -->
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <?php include "footer.php";?>