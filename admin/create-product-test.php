<?php include "header.php"; ?>
  <!-- Fonts
    ============================================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<script>
function getsate(val) {
    $.ajax({
        type: "POST",
        url: "get-sate.php",
        data: '$countryid=' + val,
        success: function(data) {
            $("#state").html(data);
        }

    });
}
</script>


</head>

<body>




    <div class="container-fluid page-body-wrapper">

        <?php include "sidebar.php";?>

        <div class="main-panel">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Enter product details</h4>

                                <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="form-group col-lg-6">
                                            <label for="product_cat">Select Product Category</label>

                                            <select type="text" name="country" id="country" required="true"
                                                onChange="getsate(this.value)" class="form-control">
                                                <option value="">Select Country</option>
                                                <?php $query=mysqli_query($conn,"select * from main_category");
                                                      while($row=mysqli_fetch_array($query))
                                                        {
                                                        ?>
                                                <option value="<?php echo $row['sno'];?>">
                                                    <?php echo $row['category_name'];?></option>
                                                <?php } ?>
                                            </select>


                                        </div>


                                        <div class="form-group col-lg-6">
                                            <label for="product_sub_cat">Select Product Sub Category</label>
                                            <select type="text" class="form-control" name="state" id="state"
                                                    onChange="getcity(this.value)">
                                                </select>


                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mr-2 p-2">Submit</button>
                                    <button class="btn btn-light p-2">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php // include'page-footer.php' ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- End custom js for this page-->
    <?php include "footer.php";?>
</body>

</html>