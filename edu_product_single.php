<?php include 'conn.php' ?>
<!doctype html>
<html lang="zxx">

<?php include 'head.php' ?>

<body>

<?php include 'header.php' ?>

<?php include 'mobile-header.php' ?>

<?php  $idd = $_GET['id']; ?>

                <?php
              
                $query = "SELECT * FROM `edu_product` WHERE `sno`='$idd' ";

                $fetched_data = mysqli_query($conn,$query);

                $total = mysqli_num_rows($fetched_data);

                $all_rows = mysqli_fetch_assoc($fetched_data);

                if($total != 0)
                {
                  

                  ?>
    <section class="section-padding mt-4">
        <div class="container-fluid">
            <div class="row justify-content-between">
            <?php
                      $data = mysqli_query($conn,"SELECT * FROM `edu_product` WHERE `sno`='$idd'");
                    while( $all_rows = mysqli_fetch_assoc($data)){
                           
                            ?>
                <div class="col-lg-4">
                    <!--=======  product details slider area  =======-->
                    <div class="product-details-slider-area">
                        <div class="big-image-wrapper">
                            <div class="product-details-big-image-slider-wrapper slider-for" data-autoplay="false"
                                data-nav="false">
                                <div class="single-image" id="single-image">
                                <img src='admin/edu_product_img/<?php echo $all_rows['product_img'] ?>' class="img-fluid">
                                </div>
                            </div>
                            <!-- <div class="slider-nav product-details-small-image-slider-wrapper" data-slides-to-show="3"
                                data-autoplay="false" data-slick-center-mode="true" data-nav="false">
                                <div class="single-image">
                                <img src='admin/product_img/<?php echo $all_rows['product_img'] ?>' >
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!--======= End of product details slider area =======-->
                </div>
                <div class="col-lg-8 mt-4">
                    <div class="row pl-lg-3">
                        <div class="col-lg-7">
                            <div class="single-product-content-description">
                                <p class="single-info">Brands <a href="category.html">BrandName</a> </p>
                                <h4 class="product-title"><?php echo $all_rows['product_name']; ?></h4>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=======  product description review   =======-->
        <div class="product-full-description">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="entry-product-section-heading">Description</h3>
                        <p><?php echo $all_rows['product_desc']; ?> </p>
                    </div>
                    <div class="col-12">
                        <h3 class="entry-product-section-heading">VIdeo Tutorial</h3>
                        <video width='320' height='240' controls>
                                    <source src='admin/edu_product_img/<?php echo $all_rows['product_video'] ?>' type='video/mp4'>
                        </video>
                    </div>
                    <div class="col-12">
                        <h3 class="entry-product-section-heading">Audio Tutorial</h3>
                        <audio controls>
                                        <source src='admin/edu_product_img/<?php echo $all_rows['product_audio'] ?>' type='audio/ogg'>
                                    </audio>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php   }  
    
}

else
  echo('no records found');

?>
        <div class="single-row-slider-area pt-7">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center mb-4">
                        <h2>Related Products</h2>
                        <p>Mirum est notare quam littera gothica, quam nunc putamus parum
                            claram anteposuerit litterarum formas.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider  arrow-light slider-gap" data-slides-to-show="6" data-autoplay="true"
                            data-nav="true" data-dots="false">
                            <div class="product">
                                <a href="product-single.html" class="product-img">
                                    <img src="assets/img/product/product-1.png" class="" alt="">
                                </a>
                                <div class="product-info">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <div class="review-count">4.5 (2,213)</div>
                                    </div>
                                    <h3>
                                        <a href="product-single.html"> TruRadix Curcumin Oral Strip Orange Mango</a>
                                    </h3>
                                    <div class="product-value">
                                        <div class="d-flex">
                                            <small class="regular-price">MRP <del>₹250.99</del></small>
                                            <div class="off-price">53% off</div>
                                        </div>
                                        <div class="current-price">₹237.99</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <a href="product-single.html" class="product-img">
                                    <img src="assets/img/product/product-2.png" class="" alt="">
                                </a>
                                <div class="product-info">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <div class="review-count">4.5 (2,213)</div>
                                    </div>
                                    <h3>
                                        <a href="product-single.html"> TruRadix Curcumin Oral Strip Orange Mango</a>
                                    </h3>
                                    <div class="product-value">
                                        <div class="d-flex">
                                            <small class="regular-price">MRP <del>₹250.99</del></small>
                                            <div class="off-price">53% off</div>
                                        </div>
                                        <div class="current-price">₹237.99</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <a href="product-single.html" class="product-img">
                                    <img src="assets/img/product/product-3.png" class="" alt="">
                                </a>
                                <div class="product-info">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <div class="review-count">4.5 (2,213)</div>
                                    </div>
                                    <h3>
                                        <a href="product-single.html"> TruRadix Curcumin Oral Strip Orange Mango</a>
                                    </h3>
                                    <div class="product-value">
                                        <div class="d-flex">
                                            <small class="regular-price">MRP <del>₹250.99</del></small>
                                            <div class="off-price">53% off</div>
                                        </div>
                                        <div class="current-price">₹237.99</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <a href="product-single.html" class="product-img">
                                    <img src="assets/img/product/product-4.png" class="" alt="">
                                </a>
                                <div class="product-info">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <div class="review-count">4.5 (2,213)</div>
                                    </div>
                                    <h3>
                                        <a href="product-single.html"> TruRadix Curcumin Oral Strip Orange Mango</a>
                                    </h3>
                                    <div class="product-value">
                                        <div class="d-flex">
                                            <small class="regular-price">MRP <del>₹250.99</del></small>
                                            <div class="off-price">53% off</div>
                                        </div>
                                        <div class="current-price">₹237.99</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <a href="product-single.html" class="product-img">
                                    <img src="assets/img/product/product-5.png" class="" alt="">
                                </a>
                                <div class="product-info">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <div class="review-count">4.5 (2,213)</div>
                                    </div>
                                    <h3>
                                        <a href="product-single.html"> TruRadix Curcumin Oral Strip Orange Mango</a>
                                    </h3>
                                    <div class="product-value">
                                        <div class="d-flex">
                                            <small class="regular-price">MRP <del>₹250.99</del></small>
                                            <div class="off-price">53% off</div>
                                        </div>
                                        <div class="current-price">₹237.99</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <a href="product-single.html" class="product-img">
                                    <img src="assets/img/product/product-6.png" class="" alt="">
                                </a>
                                <div class="product-info">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <div class="review-count">4.5 (2,213)</div>
                                    </div>
                                    <h3>
                                        <a href="product-single.html"> TruRadix Curcumin Oral Strip Orange Mango</a>
                                    </h3>
                                    <div class="product-value">
                                        <div class="d-flex">
                                            <small class="regular-price">MRP <del>₹250.99</del></small>
                                            <div class="off-price">53% off</div>
                                        </div>
                                        <div class="current-price">₹237.99</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <a href="product-single.html" class="product-img">
                                    <img src="assets/img/product/product-7.png" class="" alt="">
                                </a>
                                <div class="product-info">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <div class="review-count">4.5 (2,213)</div>
                                    </div>
                                    <h3>
                                        <a href="product-single.html"> TruRadix Curcumin Oral Strip Orange Mango</a>
                                    </h3>
                                    <div class="product-value">
                                        <div class="d-flex">
                                            <small class="regular-price">MRP <del>₹250.99</del></small>
                                            <div class="off-price">53% off</div>
                                        </div>
                                        <div class="current-price">₹237.99</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php' ?>
</body>



</html>
