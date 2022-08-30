<?php include 'conn.php' ?>
<!doctype html>
<html lang="zxx">

<?php include 'head.php' ?>

<body>


<?php include 'header.php' ?>

<?php include 'mobile-header.php' ?>

<?php   $idd = $_GET['id']; ?>

                <?php
                error_reporting(0);
                $query = "SELECT * FROM `products` WHERE `product_sub_cat`='$idd' ";

                $fetched_data = mysqli_query($conn,$query);

                $total = mysqli_num_rows($fetched_data);

                $all_rows = mysqli_fetch_assoc($fetched_data);

              //  echo $all_rows;

                if($total != 0)
                {
                  

                  ?>
    <section class="section-padding ">
        <div class="container-fluid">
            <div class="row justify-content-between">
            <?php
                      $data = mysqli_query($conn,"SELECT * FROM `products` WHERE `product_sub_cat`='$idd'");
                     $all_rows = mysqli_fetch_assoc($data)
                        
                            ?>
                <div class="col-lg-4 pt-6">
                    <!--=======  product details slider area  =======-->
                    <div class="product-details-slider-area">
                        <div class="big-image-wrapper">
                            <div class="product-details-big-image-slider-wrapper slider-for" data-autoplay="false"
                                data-nav="false">
                                <div class="single-image">
                                <img src='admin/product_img/<?php echo $all_rows['product_img'] ?>' >
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
                        <div class="col-lg-7 pb-6">
                            <div class="single-product-content-description">
                                <h4 class="product-title"><?php echo $all_rows['product_name']; ?></h4>
                                <div class="product-full-description">
                                    
                                        <h3 class="entry-product-section-heading">Description</h3>
                                        <p><?php echo $all_rows['product_desc']; ?> </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=======  product description review   =======-->
        
        </div>
        <?php     
    
}

else
  echo('no records found');

?>
        
    </section>

    <?php include 'footer.php' ?>
</body>



</html>
