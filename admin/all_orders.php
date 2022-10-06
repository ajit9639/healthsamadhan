    <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
      <div class="content-wrapper">

        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Orders</h4>
                
                <?php
           
              $query = "SELECT * FROM `orders`";

              $fetched_data = mysqli_query($conn,$query);

              $total = mysqli_num_rows($fetched_data);

              $all_rows = mysqli_fetch_assoc($fetched_data);

            //   if($total != 0)
            //   {
                
                ?>
                <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                   <thead>
                    <tr>
                      <th scope="col">Sno</th>
                      <th scope="col">Medicine Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Total Price</th>
                      <th scope="col">User Id</th>
                      <th scope="col">Order Id</th>
                      <th scope="col">Transaction Id</th>                      
                    </tr>
                     </thead>

                    <?php
                    $data = mysqli_query($conn,"SELECT * FROM `orders`");
                    while($all_rows = mysqli_fetch_assoc($data))
                      {                        
                      echo "<tr>
                              <td>$all_rows[id]</td>
                              <td>$all_rows[medicine_name]</td>
                              <td>$all_rows[quantity]</td>
                              <td>$all_rows[total_price]</td>
                              <td>$all_rows[user_id]</td>
                              <td>$all_rows[order_id]</td>
                              <td>$all_rows[transaction_id]</td>                                                          
                              
                          </tr>";                          
                      }

                //   }
                //   else
                //     echo('no records found');

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

