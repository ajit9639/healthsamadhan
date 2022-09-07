<?php include "header.php";?>

<div class="container-fluid page-body-wrapper">

    <?php include "sidebar.php";?>

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Appointment</h4>
                            <?php
          $query = "SELECT * FROM `appointment`";

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
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Problem</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">Phone Number</th>

                                            <!-- <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                                    <?php
                $data = mysqli_query($conn,"SELECT * FROM `appointment`");
                $s=1;
                while($all_rows = mysqli_fetch_assoc($data))
                  {                                       
                    ?>
                                    <tr>
                                        <td><?= $s ?></td>
                                        <td><?= $all_rows['date'] ?></td>
                                        <td><?= $all_rows['time'] ?></td>
                                        <td><?= $all_rows['problem'] ?></td>
                                        <td><?= $all_rows['ref_id'] ?></td>
                                        <td><?= $all_rows['phone_number'] ?></td>
                                    </tr>
                                    <?php 
                  $s++;}
              }
              else
                echo('no records found');

                include "footer.php";

              ?>