<?php
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Packages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <h3 class="w-100 text-center">View Our Package </h3>
            <?php 
$package = mysqli_query($conn , "SELECT * FROM `package`");
while($row = mysqli_fetch_assoc($package)){
?>
            <div class="col-md-3">
                <div class="card" style="background: #22c<?= $row['id']?>90;">
                    <div class="card-body">
                        <h6 class="card-title">Package Name : <?= $row['package_name']?></h6>
                        <p></p>
                        <p class="card-text">Package Amount : <?= $row['package_amount']?></p>
                        <p class="card-text">Package Duration : <?= $row['package_duration']?></p>
                        <p class="card-text">Package Description : <?= $row['package_description']?></p>
                        
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    
</body>

</html>