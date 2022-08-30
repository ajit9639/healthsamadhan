<?php include 'conn.php' ?>

<!doctype php?id=$all_rows[sno]>
<php?id=$all_rows[sno] lang="zxx">

<?php include 'head.php' ?>

<body>

   <?php include 'header.php' ?>

   <?php include 'mobile-header.php' ?>

   <?php  $idd = $_GET['id']; ?>

   <style>
    .my-video-dimensions {
    width: 100% !important;
}
   </style>

   <div class="pt-5">
        <div class="container-fluid theme-container">
                <div class="row mb-2">
                <?php
                      $data = mysqli_query($conn,"SELECT * FROM `edu_vid_cat` where `sno`='$idd' ");
                        while( $all_rows = mysqli_fetch_assoc($data)){
                                
                            ?>
                    <div class="col">
                        <h5 class="product-heading"><?php echo $all_rows['cat_name'] ?></h5>
                    </div>
                    <?php } ?>
                </div>
            <div class="row">
            <?php
                      $data = mysqli_query($conn,"SELECT * FROM `edu_vid_product` where `vid_cat`='$idd' ;");
                        while( $all_rows = mysqli_fetch_assoc($data)){
                               
                            ?>
                <div class="col-lg-12 col-xs-12 col-12 mt-5 mb-5">
                <video
                    id="my-video"
                    class="video-js"
                    controls
                    preload="auto"
                    width="640"
                    height="264"
                    
                    data-setup="{}"
                >
                    <source src="admin/edu_products/<?php echo $all_rows['edu_vid'] ?>" type="video/mp4" />
                    
                </video>
                <h4 class="mt-3"><?php echo $all_rows['vid_name']; ?></h4>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>


   

    <?php include 'footer.php' ?>
</body>

</php?id=$all_rows[sno]>
