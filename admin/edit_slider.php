<?php include "header.php";
   $get = $_GET['id'];
    $type = $_GET['type'];
  
    if($type == "delete"){
    $del = mysqli_query($conn , "DELETE FROM `banner_slider` WHERE `sno`='$get'");
    echo "<script>alert('Slider Deleted Successfully')</script>";
    echo "<script>window.location.href='view-slider.php';</script>";
    }else{
 
    $mysqrives = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `banner_slider`  WHERE `sno`='$get'"));

    if(isset($_POST['submit'])){
    $slider_name = $_POST['slider_name'];
    $slider_img = $_POST['slider_img'];
    
    $check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `banner_slider`  WHERE `slider_name`='$slider_name'"));

    if($check > 0){
      echo "<script>alert('already registered')</script>";
    }else{
    $ins = mysqli_query($conn , "UPDATE `banner_slider` SET `slider_name`='$slider_name' where `sno`='$get'");
    if($ins){
        echo"<script>
        alert('Updation Successfully');
     window.location.href='view-slider.php';
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
                            <h4 class="card-title">Edit Slider</h4>

                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>slider_name</label>
                                        <input type="text" class="form-control" placeholder="Enter Service"
                                            name="slider_name" value="<?php echo $mysqrives['slider_name'] ?>" required>
                                    </div>


                                    <div class="col-md-12">

                                        <img class="slider_img"
                                            src="sliders/<?php echo $mysqrives['slider_img'] ?>" alt="" style="
    width: 200px;
">
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