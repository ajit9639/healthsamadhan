<?php include 'conn.php' ?>

<!doctype html>
<html>
<?php include 'head.php' ?>

<body>

   <?php include 'header.php' ?>

   <?php include 'mobile-header.php' ?>

    <div class="slider" data-autoplay="true" data-autoplay-speed="2000">
    <?php
    $data = mysqli_query($conn,"SELECT * FROM `banner_slider`");
    while($all_rows = mysqli_fetch_assoc($data))
                        {
    ?>
        <a href="category.php">
           
            <img src="admin/sliders/<?php echo $all_rows['slider_img']; ?>"  alt="<?php echo $all_rows['slider_name']; ?>">
        </a>
        <?php } ?>
    </div>
    

    

    <div class="pt-6">
        <div class="container-fluid theme-container">
                <div class="row mb-2">
                    <div class="col">
                        <h5 class="product-heading">All Recepies</h5>
                    </div>
                </div>
            <div class="row">
            <?php
    $data = mysqli_query($conn,"SELECT * FROM `main_category`");
    while($all_rows = mysqli_fetch_assoc($data))
                        {
    ?>
                <div class="col-lg-3 col-xs-4 col-4">
                    <div class="product-brand">
                        <a href="category.php?id=<?php echo $all_rows['sno']; ?>" class="product-img">
                            <img src="admin/categories_img/<?php echo $all_rows['category_img']; ?>" class="" alt="">
                        </a>
                        <a href="category.php?id=<?php echo $all_rows['sno']; ?>" class="product-info">
                            <?php echo $all_rows['category_nm']; ?>
                        </a>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>

    <?php
    $data = mysqli_query($conn,"SELECT * FROM `main_category`");
    while($all_rows = mysqli_fetch_assoc($data))
                        {
                            $cat_name = $all_rows['sno'];
                            $cate_name = $all_rows['category_nm'];

    ?>
    <!-- //product Grid -->
    <div class="pt-5">
    
        <div class="container theme-container">
            <div class="row mb-4">
                <div class="col">
                    <h5 class="product-heading" style="text-transform: uppercase;" ><?php echo $cate_name; ?></h5>
                </div>
                <div class="col-auto text-md-right">
                    <a href="category.php?id=<?php echo $all_rows['sno']; ?>" class="btn btn-primary btn-sm product-heading-btn">See All</a>
                </div>
            </div>
            <div class="row">
            <?php
                                    $data1 = mysqli_query($conn,"SELECT * FROM `sub_category` where `category_name`='$cat_name' limit 2;");
                                    while($all_rows1 = mysqli_fetch_assoc($data1))
                                                        {
                                    ?>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="product">
                        <a href="product-single.php?id=<?php echo $all_rows1['sno'] ?>" class="product-img">
                            <img src="admin/sub_categories_img/<?php echo $all_rows1['sub_category_img']; ?>" class="" alt="">
                            
                        </a>
                        <div class="product-info">
                            <h3>
                                <a class="text-center" href="product-single.php?id=<?php echo $all_rows1['sno'] ?>"><?php echo $all_rows1['sub_category_name']; ?></a>
                            </h3>
                            <div class="product-value">
                                <!--<div class="d-flex">-->
                                <!--    <small class="regular-price">MRP <del>₹250.99</del></small>-->
                                <!--    <div class="off-price">53% off</div>-->
                                <!--</div>-->
                                <!--<div class="current-price">₹237.99</div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        
    </div>
    <?php }
    
    include 'footer.php'
    ?>

   

    

  
    
</body>

</html>
