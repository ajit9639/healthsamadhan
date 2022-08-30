<?php include "conn.php"; 
// session_start();
// if(!isset($_SESSION['usrnm']))
// {
// 	echo"<script>window.location.href='index.php';
//                             </script>";
// }else{

//   include "headlaout.php"
?>



  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-xl-12 grid-margin stretch-card flex-column">
              <h5 class="mb-2 text-titlecase mb-4">Recepies Dashboard</h5>
              <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="all_categories.php">All Recepie Categories</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="all_sub_categories.php">All Recepie Sub Categories</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="all_recepie_products.php">All Recepies</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="all-sliders.php">All Recepies Banners</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-xl-12 grid-margin stretch-card flex-column">
              <h5 class="mb-2 text-titlecase mb-4">Educational Dashboard</h5>
              <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="all_edu_vid_cat.php">All Educational Categories</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="all_edu_vid.php">All Educational Videos</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="all_edu_aud.php">All Educational Audio</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="all_edu_doc.php">All Educational Documents</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include 'page-footer.php' ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php include 'footer.php' ?>
</body>

</html>

<?php //} ?>