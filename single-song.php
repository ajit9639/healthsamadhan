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
.audioPlayer{
  display: block;
  border-radius: 20px;
  margin:0 auto;
}
   </style>

   <div class="pt-5">
        <div class="container-fluid theme-container">
                <div class="row mb-2">
                <?php
                      $data = mysqli_query($conn,"SELECT * FROM `edu_aud_product` where `sno`='$idd' ");
                        while( $all_rows = mysqli_fetch_assoc($data)){
                                
                            ?>
                    <div class="col">
                        <h5 class="product-heading"><?php echo $all_rows['aud_name'] ?></h5>
                    </div>
                    <?php } ?>
                </div>
            <div class="row">
            
            <div class="col-lg-12 col-xs-12 col-12 mt-3 mb-2">
            <?php
                      $data = mysqli_query($conn,"SELECT * FROM `edu_aud_product` where `sno`='$idd' ");
                        while( $all_rows = mysqli_fetch_assoc($data)){
                                
                            ?>
                

                <div class="audio-container-main">

                    <div class="media-img mb-2">
                        <img src="admin/edu_product_img/yoga.jpg" class="rotate player-image"  />
                    </div>
                    <div class="pt-3">
                        <marquee><p style="font-size: 20px;font-weight: 600;color: #000;" class="album-title"><?php echo $all_rows['aud_name'] ?></p></marquee>
                    </div>
                    <div class="container-audio">
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                        <div class="colum1">
                            <div class="row"></div>
                        </div>
                       
                    </div>
                </div>
                <div class="container-audio">
                        <audio controls  loop autoplay>
                                <source src="admin/edu_products/<?php echo $all_rows['edu_aud']; ?>" type="audio/mpeg">
                                Your browser dose not Support the audio Tag
                            </audio>
                    </div>
                
                <?php } ?>
            </div>
        </div>
    </div>


    <?php include 'footer.php' ?>
</body>

</php?id=$all_rows[sno]>
