<?php include "header.php";
   $get = $_GET['id'];
    $type = $_GET['type'];
  
    if($type == "delete"){
    $del = mysqli_query($conn , "DELETE FROM `main_category` WHERE `sno`='$get'");
    echo "<script>alert('Catergory Deleted Successfully')</script>";
    echo "<script>window.location.href='view-category.php';</script>";
    }else{
 
    $mysqrives = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `main_category`  WHERE `sno`='$get'"));

    if(isset($_POST['submit'])){
    $category_nm = $_POST['category_nm'];
    $category_img = $_POST['category_img'];
    
    $check = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `main_category`  WHERE `category_nm`='$category_nm'"));

    if($check > 0){
      echo "<script>alert('already registered')</script>";
    }else{
    $ins = mysqli_query($conn , "UPDATE `main_category` SET `category_nm`='$category_nm' where `sno`='$get'");
    if($ins){
        echo"<script>
        alert('Updation Successfully');
     window.location.href='view-category.php';
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
                            <h4 class="card-title">Edit Category</h4>

                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>category_nm</label>
                                        <input type="text" class="form-control" placeholder="Enter Service"
                                            name="category_nm" value="<?php echo $mysqrives['category_nm'] ?>" required>
                                    </div>


                                    <div class="col-md-12">

                                        <img class="category_img"
                                            src="categories_img/<?php echo $mysqrives['category_img'] ?>" alt="" style="
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