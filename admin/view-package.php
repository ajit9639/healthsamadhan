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
 
          $query = "SELECT * FROM `package`";

          $fetched_data = mysqli_query($conn,$query);

          $total = mysqli_num_rows($fetched_data);

          $all_rows = mysqli_fetch_assoc($fetched_data);


          if($total != 0)
          {
            
            ?>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sno</th>
                                            <th scope="col">Package Name</th>
                                            <th scope="col">Package amount</th>
                                            <th scope="col">Package Duration</th>
                                            <th scope="col">Package Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                $data = mysqli_query($conn,"SELECT * FROM `package`");
                while($all_rows = mysqli_fetch_assoc($data))
                  {
                    
                  echo "<tr>
                          <td>$all_rows[id]</td>
                          <td>$all_rows[package_name]</td>
                          <td>$all_rows[package_amount]</td>
                          <td>$all_rows[package_duration]</td>
                         <td> <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal$all_rows[id]'>
                         View Description
                         </button>
                         </td>
                          

                        <div class='modal' id='myModal$all_rows[id]'>
                            <div class='modal-dialog'>
                            <div class='modal-content'>

                                <div class='modal-header'>
                                <h4 class='modal-title'>Description</h4>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                
                                <div class='modal-body'>
                                <p> $all_rows[package_description]</p>
                                </div>                       
                            </div>
                            </div>
                        </div>
                                                   
                          <td>                                                           
                          <span>                            
                          <a class='btn btn-success text-white' href='edit_package.php?id=$all_rows[id]'><i class='typcn typcn-edit btn-icon-append'></i></a>                        
                          </span>
                            <span>                            
                              <a class='btn btn-danger text-white' href='edit_package.php?id=$all_rows[id]&type=delete'><i class='typcn typcn-delete-outline btn-icon-append'></i></a>                            
                            </span>
                          </td>
                          
                      </tr>";
                      
                  }
              }

              else
                echo('no records found');

                include "footer.php";

              ?>