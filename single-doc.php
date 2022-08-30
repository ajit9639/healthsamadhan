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

#toolbar {
    display: none !important;
    align-items: center;
    background-color: var(--viewer-pdf-toolbar-background-color);
    color: white;
    display: flex;
    height: var(--viewer-pdf-toolbar-height);
    padding: 0 0px;
}
   </style>

   <div class="pt-5">
        <div class="container-fluid theme-container">
                <div class="row mb-2">
                <?php
                      $data = mysqli_query($conn,"SELECT * FROM `edu_doc_product` where `sno`='$idd' ");
                        while( $all_rows = mysqli_fetch_assoc($data)){
                                
                            ?>
                    <div class="col">
                        <h5 class="product-heading"><?php echo $all_rows['doc_name'] ?></h5>
                    </div>
                    <?php } ?>
                </div>
            <div class="row">
            
            <div class="col-lg-12 col-xs-12 col-12 mt-3 mb-2">
            <?php
                      $data = mysqli_query($conn,"SELECT * FROM `edu_doc_product` where `sno`='$idd' ");
                        while( $all_rows = mysqli_fetch_assoc($data)){
                                
                            ?>
                
                <!-- <embed src="admin/edu_products/<?php echo $all_rows['edu_doc'] ?>" width="800px" height="2100px" /> -->

                <embed src="admin/edu_products/<?php echo $all_rows['edu_doc'] ?>"  type="application/pdf" width="100%" height="500px" />
                
                <?php } ?>
            </div>
        </div>
    </div>


    <?php include 'footer.php' ?>
</body>

</php?id=$all_rows[sno]>
