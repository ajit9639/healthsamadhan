
  <?php include "header.php";?>
    
      <div class="container-fluid page-body-wrapper">
        
        <?php include "sidebar.php";?>
        
        <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Educational Audios</h4>
                  

                  <?php
      
                $query = "SELECT * FROM edu_aud_product";

                $fetched_data = mysqli_query($conn,$query);

                $total = mysqli_num_rows($fetched_data);

                $all_rows = mysqli_fetch_assoc($fetched_data);

              //  echo $all_rows;

                if($total != 0)
                {
                  

                  ?>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                     <thead>
                      <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Audio Name</th>
                        <th scope="col">Audio File</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>

                      <?php
                     
                        
                      $data = mysqli_query($conn,"SELECT a.*, b.* FROM edu_aud_product a  ,  edu_vid_cat b WHERE a.edu_cat=b.sno ");
                      while($all_rows = mysqli_fetch_assoc($data))
                        {
                          
                        echo "<tr>
                                <td>$all_rows[sno]</td>
                                <td>$all_rows[cat_name]</td>
                                <td>$all_rows[aud_name]</td>
                                <td>
                                <audio controls>
                                    <source src='edu_products/$all_rows[edu_aud]' type='audio/mp3'>
                                </audio>
                                
                                </td>
                                <td>
                                   
                                    
                                <span>
                                  
                                <a class='btn btn-success text-white' href='update-edu-aud.php?id=$all_rows[sno]'><i class='typcn typcn-edit btn-icon-append'></i></a>
                              
                                </span>
                                  <span>
                                  
                                    <a class='btn btn-danger text-white' href='delete-edu-aud.php?id=$all_rows[sno]'><i class='typcn typcn-delete-outline btn-icon-append'></i></a>
                                  
                                  </span>
                                </td>
                                
                            </tr>";
                            
                        }
                    }

                    
                  
                    ?>
                    </table>
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

  <?php include "footer.php";?>
</body>

</html>

