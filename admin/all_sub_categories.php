

    <?php include "header.php";?>

    <div class="container-fluid page-body-wrapper">

        <?php include "sidebar.php";?>

        <div class="main-panel">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Sub Categories</h4>


                                <?php
                error_reporting(0);
                 $query = "SELECT a.sno, b.category_name FROM main_category a , sub_category b WHERE a.sno=b.category_name;";

               

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
                                                <th scope="col">Sub Category Name</th>
                                                <th scope="col">Related Category Name</th>
                                                <th scope="col">Sub Category image</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                      $data = mysqli_query($conn,"SELECT a.sno, b.* FROM main_category a , sub_category b WHERE a.sno=b.category_name;");
                      while($all_rows = mysqli_fetch_assoc($data))
                        {
                         $cat_number = $all_rows['category_name'];

                          $query3 = "SELECT * from main_category where sno= $cat_number";

                            $fetched_data1 = mysqli_query($conn,$query3);

                            $total1 = mysqli_num_rows($fetched_data1);

                            $all_rows1 = mysqli_fetch_assoc($fetched_data1);

                            if($total1 != 0)
                            {
                                
                              echo "<tr>
                                <td>$all_rows[sno]</td>
                                <td>$all_rows[sub_category_name]</td>
                                <td>$all_rows1[category_nm]</td>
                                <td><img src='sub_categories_img/$all_rows[sub_category_img]' style='width: 100px;
                                height: auto;'></td>
                                <td>
                                   
                                    
                                <span>
                                  
                                <a class='btn btn-success text-white' href='update-sub-category.php?id=$all_rows[sno]'><i class='typcn typcn-edit btn-icon-append'></i></a>
                              
                                </span>
                                  <span>
                                  
                                    <a class='btn btn-danger text-white' href='delete-sub-category.php?id=$all_rows[sno]'><i class='typcn typcn-delete-outline btn-icon-append'></i></a>
                                  
                                  </span>
                                </td>
                                
                            </tr>";
                                
                            }
                        
                            
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

    <?php include "footer.php";?>
</body>

</html>