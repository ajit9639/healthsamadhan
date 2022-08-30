  <?php include "header.php";?>
    
    <div class="container-fluid page-body-wrapper">
      
      <?php include "sidebar.php";?>
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Registered Users</h4>
                  

                  <?php
               // error_reporting(0);
                $query = "SELECT * FROM users_payment";

                $fetched_data = mysqli_query($conn,$query);

                $total = mysqli_num_rows($fetched_data);
                
                $all_rows = mysqli_fetch_assoc($fetched_data);

              //  echo $all_rows;

              
                  

                  ?>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                     <thead>
                      <tr>
                        <th scope="col">sno</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Receipt</th>
                        <th scope="col">Approval status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                      <?php
                    
$data = mysqli_query($conn,"SELECT * FROM `users_payment`");
while($all_rows = mysqli_fetch_assoc($data))                     
{
   

                        echo "<tr>
                                <td>$all_rows[sno]</td>
                                <td>$all_rows[userid]</td>
                                <td>$all_rows[remarks]</td>
                                <td><a class='btn btn-success text-white' type='button' href='../payment_receipt/$all_rows[receipt]'>download</a></td>
                                <td>$all_rows[approval]</td>
                                <td>
                                  <span>
                                  
                                    <a class='btn btn-warning text-white' href='edit-payment-status.php?sno=$all_rows[sno]'><i class='typcn typcn-edit btn-icon-append'></i></a>
                                  
                                  </span>
                                </td>
                                
                            </tr>";
                            
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
     <!-- partial:partials/_footer.html -->
     <?php include 'footer.php' ?>
</body>

</html>

