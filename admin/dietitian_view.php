<?php include "header.php";?>

<div class="container-fluid page-body-wrapper">

    <?php include "sidebar.php";?>

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Brands</h4>
                            <?php
        //   error_reporting(0);
          $query = "SELECT * FROM `package`";

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
                                            <th scope="col">SNO</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">DOB</th>
                                            <th scope="col">Registration no</th>
                                            <th scope="col">Services</th>
                                            <th scope="col">Year of Experience</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Address</th>

                                            
                                            <!-- <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                                    <?php
                $data = mysqli_query($conn,"SELECT * FROM `dietitian_registration`");
                while($all_rows = mysqli_fetch_assoc($data))
                  {?>
                    
                 <tr>
                          <td><?= $all_rows['id']?></td>
                          <td><?= $all_rows['first_name']?></td>
                          <td><?= $all_rows['last_name']?></td>
                          <td><?= $all_rows['email']?></td>
                          <td><?= $all_rows['phone']?></td>
                          <td><?= $all_rows['date']?></td>
                          <td><?= $all_rows['reg_no']?></td>
                          <td><?= $all_rows['gender']?></td>
                          <td><?= $all_rows['year_of_exp']?></td>
                          <td><?= $all_rows['city']?></td>
                          <td><?= $all_rows['address']?></td>
                                                                             
                          <!-- <td>                                                           
                          <span>                            
                          <a class='btn btn-success text-white' href='edit_dietitian.php?id=$all_rows[id]'><i class='typcn typcn-edit btn-icon-append'></i></a>                        
                          </span>
                            <span>                            
                              <a class='btn btn-danger text-white' href='edit_dietitian.php?id=$all_rows[id]&type=delete'><i class='typcn typcn-delete-outline btn-icon-append'></i></a>                            
                            </span>
                          </td>
                           -->
                      </tr>
                      <?php
                  }
              }

              else
                echo('no records found');

                include "footer.php";

              ?>