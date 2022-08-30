
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
                error_reporting(0);
                $query = "SELECT * FROM user";

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
                        <th scope="col">Looking For</th>
                        <th scope="col">User name</th>
                        <th scope="col">User email</th>
                        <th scope="col">User phone</th>
                        <th scope="col">mul1</th>
                        <th scope="col">der_bas_1</th>
                        <th scope="col">gram1</th>
                        <th scope="col">kanya1</th>
                        <th scope="col">k_potri1</th>
                        <th scope="col">k_perpotri1</th>
                        <th>mul2</th>
                        <th>der_bas_2</th>
                        <th>k_dohitri2</th>
                        <th>k_perdohitri2</th>
                        <th>mul3</th>
                        <th>der_bas_3</th>
                        <th>k_dohitri3</th>
                        <th>mul4</th>
                        <th>der_bas_4</th>
                        <th>k_dohitri4</th>
                        <th>mul5</th>
                        <th>der_bas_5</th>
                        <th>k_dohitri5</th>
                        <th>mul6</th>
                        <th>der_bas_6</th>
                        <th>k_dohitri6</th>
                        <th>mul7</th>
                        <th>der_bas_7</th>
                        <th>k_dohitri7</th>
                        <th>mul8</th>
                        <th>der_bas_8</th>
                        <th>k_dohitri8</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php
                      $data = mysqli_query($conn,"SELECT * FROM `user`");
                      while($all_rows = mysqli_fetch_assoc($data))
                        {
                          
                        echo "<tr>
                                <td>$all_rows[sno]</td>
                                <td>$all_rows[looking_for]</td>
                                <td>$all_rows[username]</td>
                                <td>$all_rows[email]</td>
                                <td>$all_rows[phone]</td>
                                <td>$all_rows[mul1]</td>
                                <td>$all_rows[der_bas_1]</td>
                                <td>$all_rows[gram1]</td>
                                <td>$all_rows[kanya1]</td>
                                <td>$all_rows[k_potri1]</td>
                                <td>$all_rows[k_perpotri1]</td>
                                <td>$all_rows[mul2]</td>
                                <td>$all_rows[der_bas_2]</td>
                                <td>$all_rows[k_dohitri2]</td>
                                <td>$all_rows[k_perdohitri2]</td>
                                <td>$all_rows[mul3]</td>
                                <td>$all_rows[der_bas_3]</td>
                                <td>$all_rows[k_dohitri3]</td>
                                <td>$all_rows[mul4]</td>
                                <td>$all_rows[der_bas_4]</td>
                                <td>$all_rows[k_dohitri4]</td>
                                <td>$all_rows[mul5]</td>
                                <td>$all_rows[der_bas_5]</td>
                                <td>$all_rows[k_dohitri5]</td>
                                <td>$all_rows[mul6]</td>
                                <td>$all_rows[der_bas_6]</td>
                                <td>$all_rows[k_dohitri6]</td>
                                <td>$all_rows[mul7]</td>
                                <td>$all_rows[der_bas_7]</td>
                                <td>$all_rows[k_dohitri7]</td>
                                <td>$all_rows[mul8]</td>
                                <td>$all_rows[der_bas_8]</td>
                                <td>$all_rows[k_dohitri8]</td>
                                <td>$all_rows[userid]</td>
                                <td>
                                   
                                    
                                    
                                  <span>
                                  
                                    <a class='btn btn-danger text-white' href='delete-reg-users.php?id=$all_rows[sno]'><i class='typcn typcn-delete-outline btn-icon-append'></i></a>
                                  
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
        <?php include'page-footer.php' ?>
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

