<?php include 'conn.php' ?>

<!doctype php?id=$all_rows[sno]>
<php?id=$all_rows[sno] lang="zxx">

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
        <a href="#">
           
            <img src="admin/sliders/<?php echo $all_rows['slider_img']; ?>"  alt="<?php echo $all_rows['slider_name']; ?>">
        </a>
        <?php } ?>
    </div>
    

    

    <div class="pt-5">
        <div class="container-fluid theme-container">
                <div class="row mb-2">
                    <div class="col">
                        <h5 class="product-heading">View All Educational Products</h5>
                    </div>
                    <div class="col-auto text-md-right">
                        <a href="#" class="btn btn-primary btn-sm product-heading-btn">See All</a>
                    </div>
                </div>
            <div class="row">
            <?php
    $data = mysqli_query($conn,"SELECT * FROM `category_edu`");
    while($all_rows = mysqli_fetch_assoc($data))
                        {
    ?>
                <div class="col-lg-3 col-xs-4 col-4">
                    <div class="product-brand">
                        <a href="category.php?id=<?php echo $all_rows['sno']; ?>" class="product-img">
                            <img src="admin/edu_cat_image/<?php echo $all_rows['cat_img']; ?>" class="" alt="">
                        </a>
                        <a href="category.php?id=<?php echo $all_rows['sno']; ?>" class="product-info">
                            <?php echo $all_rows['cat_name']; ?>
                        </a>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>

    <?php
    $data = mysqli_query($conn,"SELECT * FROM `category_edu`");
    while($all_rows = mysqli_fetch_assoc($data))
                        {
                            $cat_name = $all_rows['sno'];
                            $cate_name = $all_rows['cat_name'];

    ?>
    <!-- //product Grid -->
    <div class="pt-5">
    
        <div class="container theme-container">
            <div class="row mb-4">
                <div class="col">
                    <h5 class="product-heading" style="text-transform: uppercase;" ><?php echo $cate_name; ?></h5>
                </div>
                <div class="col-auto text-md-right">
                    <a href="education.php?<?php echo $all_rows['cat_name']; ?>" class="btn btn-primary btn-sm product-heading-btn">See All</a>
                </div>
            </div>
            <div class="row">
            <?php
                                    $data1 = mysqli_query($conn,"SELECT * FROM `edu_product` where `product_cat`='$cat_name'");
                                    while($all_rows1 = mysqli_fetch_assoc($data1))
                                                        {
                                                            
                                    ?>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="product">
                        <a href="edu_product_single.php?id=<?php echo $all_rows1['sno'] ?>" class="product-img">
                            <img src="admin/edu_product_img/<?php echo $all_rows1['product_img']; ?>" class="" alt="">
                        </a>
                        <div class="product-info">
                            <h3>
                                <a href="edu_product_single.php?id=<?php echo $all_rows1['sno'] ?>"><?php echo $all_rows1['product_name']; ?></a>
                            </h3>
                            
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        
    </div>
    <?php } ?>

    <!-- //brand -->
    <!-- <div class="pt-5">
        <div class="py-5 bg-light">
            <div class="container-fluid theme-container">
                <div class="row mb-2">
                    <div class="col">
                        <h5 class="product-heading">Popular brands</h5>
                    </div>
                    <div class="col-auto text-md-right">
                        <a href="category.php" class="btn btn-primary btn-sm product-heading-btn">See All</a>
                    </div>
                </div>
               
                <div class=" brand-slider arrow-light slider-gap" data-slides-to-show="8" data-autoplay="true" data-nav="true"
                    data-dots="false">
                    <?php
                    $data = mysqli_query($conn,"SELECT * FROM `brands`");
                    while($all_rows = mysqli_fetch_assoc($data))
                                        {
                    ?>
                    <div class="product-brand">
                        <a href="category.php" class="product-img">
                        <img src="admin/brand_img/<?php echo $all_rows['brand_img'] ?>">
                        </a>
                        <a href="category.php" class="product-info">
                        <?php echo $all_rows['brand_name']; ?>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div> -->

    

    <?php include 'footer.php' ?>
</body>

</php?id=$all_rows[sno]>
