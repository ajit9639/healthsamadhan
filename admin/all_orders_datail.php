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
           
              $query = "SELECT * FROM `student`";

              $fetched_data = mysqli_query($conn,$query);

              $total = mysqli_num_rows($fetched_data);

              $all_rows = mysqli_fetch_assoc($fetched_data);

            //   if($total != 0)
            //   {
                
                ?>
                <div class="table-responsive pt-3">
                <h4 class="card-title">Order Detail</h4>
<?php
$rand_get = $_GET['id'];
                $data = mysqli_query($conn,"SELECT * FROM `student` where `random`='$rand_get'");
                   $all_rows = mysqli_fetch_assoc($data);
                                            
                      echo "
                <h6>Order Id : ODR_HSN_$all_rows[random] </h6>
                
                <h6>Order Date : $all_rows[date] </h6>
                <h6>Transaction Id : $all_rows[txn_id] </h6>
                <hr>
                <h4  class='card-title'>Shipping Detail</h4>

                <h6>Name : $all_rows[fname] </h6>
                <h6>Email : $all_rows[email] </h6>
                <h6>Phone : $all_rows[phone] </h6>
                <h6>Address : $all_rows[address] </h6>

                <hr>
                <h4  class='card-title'>Payment Status</h4>

                <h6>Payment Status : $all_rows[status] </h6>
                
                <hr>
                <h4  class='card-title'>Medicine Detail</h4>

                ";  ?>


                  <table class="table table-bordered">
                   <thead>
                    <tr>
                     
                      <th scope="col">Medicine Name</th>
                      <th scope="col">Quantity</th>
                      <!-- <th scope="col">Total Price</th>
                      <th scope="col">Brand Name</th> -->
                      <th scope="col">Total Amount</th>                                                                                                                                                                                            
                    </tr>
                     </thead>

                    <?php
                    
                    $data = mysqli_query($conn,"SELECT * FROM `student` where `random`='$rand_get'");
                    while($all_rows = mysqli_fetch_assoc($data))
                      {                        
                      echo "<tr>
                              
                              <td>$all_rows[student_name]</td>
                              <td>$all_rows[phone_no]</td>
                              <td>$all_rows[age]</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                      
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

