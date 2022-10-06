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
          $query = "SELECT * FROM `medicines`";

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
                                            <!-- <th scope="col">Sno</th> -->
                                            <th scope="col">Medicine Name</th>
                                            <th scope="col">Skunit</th>
                                            <th scope="col">MRP Price</th>
                                            <th scope="col">Sale Price</th>
                                            
                                            <th scope="col">Brands</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                $data = mysqli_query($conn,"SELECT * FROM `medicines`");
                while($all_rows = mysqli_fetch_assoc($data))
                  {
                    
                  echo "<tr>
                          <td>$all_rows[product_name]</td>
                          <td>$all_rows[skunit]</td>                                                                        
                          <td>$all_rows[mrp]</td>                                                                        
                          <td>$all_rows[sale]</td>                                                                        
                          
                          <td>$all_rows[brand]</td>  
                                                                              
                          <td>                                                           
                          <span>                            
                          <a class='btn btn-success text-white' href='medicines_edit.php?id=$all_rows[id]'><i class='typcn typcn-edit btn-icon-append'></i></a>                        
                          </span>
                            <span>                            
                              <a class='btn btn-danger text-white' href='medicines_edit.php?id=$all_rows[id]&type=delete'><i class='typcn typcn-delete-outline btn-icon-append'></i></a>                            
                            </span>
                          </td>
                          
                      </tr>";
                      
                  }
              }

              else
                echo('no records found');

                include "footer.php";

              ?>