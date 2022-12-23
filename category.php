<?php include 'conn.php'; ?>
<!doctype html>
<html>
<?php include 'head.php' ?>
<body>
    <?php include 'header.php' ?>
    <?php include 'mobile-header.php' ?>
    <main>

        <?php    $idd = $_GET['id']; ?>

        <section class="pt-6 pt-md-7 pb-5">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-12 order-md-2">

                        <div class="row">
                            <?php
                            
                            $data = mysqli_query($conn,"SELECT * FROM `sub_category` where category_name = $idd");
                            while($all_rows = mysqli_fetch_assoc($data))
                             {
                           
                            ?>
                            <div class="col-md-4 col-sm-6 col-6">
                                <div class="product">
                                    <a href="product-single.php?id=<?php echo $all_rows['sno'] ?>" class="product-img">
                                        <img src="admin/sub_categories_img/<?php echo $all_rows['sub_category_img']; ?>"
                                            class="" alt="">
                                    </a>
                                    <div class="product-info">
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <!--<div class="review-count">4.5 (2,213)</div>-->
                                        </div>
                                        <h3>
                                            <a href="product-single.php?id=<?php echo $all_rows['sno'] ?>">
                                                <?php echo $all_rows['sub_category_name']; ?></a>
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
                            <?php }?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>


    <?php include 'footer.php' ?>
</body>


</html>