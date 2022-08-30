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
                $data = mysqli_query($conn,"SELECT * FROM `users_payment`");

                $total = mysqli_num_rows($data);

                $all_rows = mysqli_fetch_assoc($data);

              //  echo $all_rows;

                if($total != 0)
                {
                  

                  ?>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                     <thead>
                      <tr>
                        <th scope="col">sno</th>
                        <th scope="col">User Id</th>
                        <th scope="col">gender</th>
                        <th scope="col">uname</th>
                        <th scope="col">email</th>
                        <th scope="col">pwd</th>
                        <th scope="col">cpwd</th>
                        <th scope="col">fname</th>
                        <th>lname</th>
                        <th>phno</th>
                        <th>dob</th>
                        <th>religion</th>
                        <th>m_status</th>
                        <th>height</th>
                        <th>country</th>
                        <th>state</th>
                        <th>h_degree</th>
                        <th>emp_in</th>
                        <th>income</th>
                        <th>self_txt</th>
                        <th>family_type</th>
                        <th>f_job</th>
                        <th>m_job</th>
                        <th>brother</th>
                        <th>sister</th>
                        <th>family_place</th>
                        <th>contact_address</th>
                        <th>family_txt</th>
                        <th>uploadfile</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php
                      $data = mysqli_query($conn,"SELECT * FROM `tbl_login`");
                      while($all_rows = mysqli_fetch_assoc($data))
                        {
                          
                        echo "<tr>
                                <td>$all_rows[id]</td>
                                <td>$all_rows[user_id]</td>
                                <td>$all_rows[gender]</td>
                                <td>$all_rows[uname]</td>
                                <td>$all_rows[email]</td>
                                <td>$all_rows[pwd]</td>
                                <td>$all_rows[cpwd]</td>
                                <td>$all_rows[fname]</td>
                                <td>$all_rows[lname]</td>
                                <td>$all_rows[phno]</td>
                                <td>$all_rows[dob]</td>
                                <td>$all_rows[religion]</td>
                                <td>$all_rows[m_status]</td>
                                <td>$all_rows[height]</td>
                                <td>$all_rows[country]</td>
                                <td>$all_rows[state]</td>
                                <td>$all_rows[h_degree]</td>
                                <td>$all_rows[emp_in]</td>
                                <td>$all_rows[income]</td>
                                <td>$all_rows[self_txt]</td>
                                <td>$all_rows[family_type]</td>
                                <td>$all_rows[f_job]</td>
                                <td>$all_rows[m_job]</td>
                                <td>$all_rows[brother]</td>
                                <td>$all_rows[sister]</td>
                                <td>$all_rows[family_place]</td>
                                <td>$all_rows[contact_address]</td>
                                <td>$all_rows[family_txt]</td>
                                <td><a class='btn btn-success text-white' type='button' href='../payment_receipt/$all_rows[uploadfile]'>download</a></td>
                                
                                <td>
                                   
                                     
                                    
                                  <span>
                                  
                                    <a class='btn btn-danger text-white' href='delete-user-profile.php?id=$all_rows[id]'><i class='typcn typcn-delete-outline btn-icon-append'></i></a>
                                  
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

  <?php include "footer.php" ?>
</body>

</html>

