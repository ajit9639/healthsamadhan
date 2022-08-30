
  <?php include "header.php";?>
    
      <div class="container-fluid page-body-wrapper">
        
        <?php include "sidebar.php";?>
        
        <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Categories</h4>
                  

                  <?php
                error_reporting(0);
                $query = "SELECT a.* , b.* , c.*  FROM main_category a , sub_category b , products c  WHERE c.product_cat=a.sno and c.product_sub_cat=b.sno";

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
                        <th scope="col">Recepie Name</th>
                        <th scope="col">Recepie Category</th>
                        <th scope="col">Recepie Sub Category</th>
                        <th scope="col">Recepie Image</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                      <?php
                      $data = mysqli_query($conn,"SELECT a.* , b.*,c.*  FROM main_category a , sub_category b, products c  WHERE c.product_cat=a.sno and c.product_sub_cat=b.sno");
                      while($all_rows = mysqli_fetch_assoc($data))
                        {
                          
                        echo "<tr>
                                <td>$all_rows[sno]</td>
                                <td>$all_rows[product_name]</td>
                                <td>$all_rows[category_nm]</td>
                                <td>$all_rows[sub_category_name]</td>
                                <td><img src='product_img/$all_rows[product_img]' style='width: 100px;
                                height: auto;'></td>
                                <td>
                                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal$all_rows[sno]'>
                                      Recepie Description
                                    </button>
                                    <!-- Modal -->
                                        <div class='modal fade' id='exampleModal$all_rows[sno]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' style='z-index: 99999;'>
                                          <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                              <div class='modal-body'>
                                                $all_rows[product_desc]
                                              </div>
                                              <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                </td>
                                
                               
                                <td>
                                   
                                    
                                <span>
                                  
                                <a class='btn btn-success text-white' href='update_recepie_product.php?id=$all_rows[sno]'><i class='typcn typcn-edit btn-icon-append'></i></a>
                              
                                </span>
                                  <span>
                                  
                                    <a class='btn btn-danger text-white' href='delete_recepie_product.php?id=$all_rows[sno]'><i class='typcn typcn-delete-outline btn-icon-append'></i></a>
                                  
                                  </span>
                                </td>
                                
                            </tr>";
                            
                        }
                    }

                    else
                      echo('no records found');

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

