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
                                            <!-- <th scope="col">Sno</th> -->
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Category image</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                $data = mysqli_query($conn,"SELECT * FROM `main_category`");
                while($all_rows = mysqli_fetch_assoc($data))
                  {
                    
                  echo "<tr>
                          <td>$all_rows[category_nm]</td>
                          <td>$all_rows[category_img]</td>                                                                        
                                                   
                          <td>                                                           
                          <span>                            
                          <a class='btn btn-success text-white' href='edit_category.php?id=$all_rows[sno]'><i class='typcn typcn-edit btn-icon-append'></i></a>                        
                          </span>
                            <span>                            
                              <a class='btn btn-danger text-white' href='edit_category.php?id=$all_rows[sno]&type=delete'><i class='typcn typcn-delete-outline btn-icon-append'></i></a>                            
                            </span>
                          </td>
                          
                      </tr>";
                      
                  }
              }

              else
                echo('no records found');

                include "footer.php";

              ?>