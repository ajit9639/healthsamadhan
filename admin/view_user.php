<?php include "header.php";?>

<div class="container-fluid page-body-wrapper">

    <?php include "sidebar.php";?>

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Users</h4>
                            <?php
          $query = "SELECT * FROM `signup`";

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
                                            <th scope="col">SNO</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Phone Number</th>
                                            
                                            <th scope="col">package_name</th>
                                            <th scope="col">package_amount</th>
                                            
                                            <th scope="col">payment_status</th>
                                            <th scope="col">Assign Doctor</th>
                                            <th scope="col">Assign Health Expert</th>
                                            <th scope="col">Assign Dietition</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <?php
                                    $data = mysqli_query($conn,"SELECT * FROM `signup`");
                                    while($all_rows = mysqli_fetch_assoc($data))
                                      {?>                    
                         <tr>
                          <td><?= $all_rows['id'] ?></td>
                          <td><?= $all_rows['first_name'] ?></td>
                          <td><?= $all_rows['phone_number'] ?></td>
                          <td> <?php
                          $d1 = $all_rows['package_name'];
                          $d = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `package` where `id`='$d1'"));
                          echo $d['package_name']?></td>                          
                          <td><?= $all_rows['package_amount'] ?></td>                                                                           
                          <td><?= $all_rows['user_status'] ?></td>



                          <td>
                          <select onchange="location=this.value; ">
                          <option>
                            <?php
                            $d1 = $all_rows['assigned_doctor'];
                            $d = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_doctor` where `user_id`='$d1'"));
                            echo $d['fname'].' '.$d['lname'];
                            ?>
                          </option>
                            <?php
                          $data11 = mysqli_query($conn,"SELECT * FROM `user_doctor` where `i_am`='doctor'");?>                        
                          <?php while($all_rows11 = mysqli_fetch_assoc($data11)){?>
                          <option value="assign.php?doctorid=<?= $all_rows11['user_id']?>&type=doctor&id=<?= $all_rows['id'] ?>">  <?= $all_rows11['fname'] .' '. $all_rows11['lname'] ?></option>
                          <?php } ?>                         
                          </select>
                          </td>
                          



                          <td>
                           <select onchange="location=this.value; ">
                           <option><?php
                          $d1 = $all_rows['assigned_healthexpert'];
                          $d = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_healthexpert` where `user_id`='$d1'"));
                          echo $d['fname'].' '.$d['lname']
                            ?>
                          </option>
                            <?php
                          $data12 = mysqli_query($conn,"SELECT * FROM `user_healthexpert`");
                          while($all_rows12 = mysqli_fetch_assoc($data12)){?>
                          <option value="assign.php?doctorid=<?= $all_rows12['user_id']?>&type=health&id=<?= $all_rows['id'] ?>">   <?= $all_rows12['fname'] .' '. $all_rows12['lname'] ?></option>
                          <?php } ?>                         
                          </select>
                          </td>




                          <td>
                           <select onchange="location=this.value; ">
                           <option> <?php
                          $d1 = $all_rows['assigned_dietition'];
                          $d = mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM `user_diet` where `user_id`='$d1'"));
                          echo $d['fname'].' '.$d['lname']
                          ?>
                        </option>
                          <?php
                          $data13 = mysqli_query($conn,"SELECT * FROM `user_diet`");
                          while($all_rows13 = mysqli_fetch_assoc($data13)){?>
                          <option value="assign.php?doctorid=<?= $all_rows13['user_id']?>&type=diet&id=<?= $all_rows['id'] ?>">  <?= $all_rows13['fname'] .' '. $all_rows13['lname'] ?></option>
                          <?php } ?>                         
                          </select>
                          </td>
                                                   
                          

                          
                          
                      </tr>
                      <?php 
                  }
              }

              else
                echo('no records found');

                include "footer.php";

              ?>