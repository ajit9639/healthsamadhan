<?php include 'conn.php' ?>

<!doctype php?id=$all_rows[sno]>

<php?id=$all_rows[sno] lang="zxx">

<?php include 'head.php' ?>

<body>

   <?php include 'header.php' ?>

   <?php include 'mobile-header.php' ?>

   <div class="pt-5">
        <div class="container-fluid theme-container">
                <div class="row mb-2">
                    <div class="col">
                        <h5 class="product-heading mb-3">Select Session</h5>
                    </div>
                </div>
            <div class="row">
            <?php
                      $data = mysqli_query($conn,"SELECT * FROM `edu_vid_cat`");
                    while( $all_rows = mysqli_fetch_assoc($data)){
                           
                            ?>
                <div class="col-lg-3 col-xs-12 col-12 mt-3">
                    <a href="edu_audios.php?id=<?php echo $all_rows['sno']; ?>" class="btn btn-primary btn-lg btn-block text-dark"><?php echo $all_rows['cat_name']; ?></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>


   

    <?php include 'footer.php' ?>
</body>

</php?id=$all_rows[sno]>
