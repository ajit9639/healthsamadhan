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
tr:nth-child(even) {
  background-color: #f2f2f2 !important;
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
            
                <div class="col-lg-12 col-xs-12 col-12 mt-5 mb-2">
               
                
                <table class="table table-striped table-dark">
                
                <tbody>
                <?php
                      $data = mysqli_query($conn,"SELECT * FROM `edu_aud_product` where `edu_cat`='$idd' ;");
                        while( $all_rows = mysqli_fetch_assoc($data)){
                            ?>
                        <?php echo "<tr>
                               
                                <td><a href='single-song.php?id=$all_rows[sno]'>$all_rows[aud_name]</a></td>
                               
                            </tr>"; ?>
                    <?php } ?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>



    <?php include 'footer.php' ?>
</body>

</php?id=$all_rows[sno]>
