<?php include 'conn.php'; ?>

<!doctype html>
<html>



<?php include 'head.php' ?>

<body>


<?php include 'header.php' ?>

<?php include 'mobile-header.php' ?>

    <main>
        <div class="accounnt_header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-auto col-12 order-md-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a class="text-nowrap" href="index.php"><i class="fa fa-home mr-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item text-nowrap active" aria-current="page">Account</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="order-md-1 text-center text-md-left col-lg col-12">
                        <h1 class="h3 mb-0"> </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="accounnt_body">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-md-4 col-12">
                        <nav class="navbar navbar-expand-md mb-4 mb-lg-0 sidenav">
                            <!-- Menu -->
                            <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Sidebar Menu</a>
                            <!-- Button -->
                            <button class="navbar-toggler d-md-none rounded bg-info text-light" type="button" data-toggle="collapse" data-target="#sidenav" aria-controls="sidenav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="ti-menu"></span>
                            </button>
                            <!-- Collapse navbar -->
                            <div class="collapse navbar-collapse bx-shadow" id="sidenav">
                                <div class="navbar-nav flex-column">
                                    <!-- List -->
                                    <div class="border-bottom">
                                        <div class="m-4">
                                            <div class="row no-gutters align-items-center">
                                                <!-- <div class="col-auto">
                                                    <div class="avater btn-soft-info">DS</div>
                                                </div> -->
                                                <div class="col-auto">
                                                    <h6 class="d-block font-weight-bold mb-0"><?php echo $_SESSION['my_nm']; ?></h6>
                                                    <small class="text-muted"><?php echo $_SESSION['email']; ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="account.php"><i class="fa fa-user"></i> My
                                                Account</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="change_password.php"><i class="fa fa-lock"></i>
                                                Change Password</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-sign-out"></i> Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="ml-0 ml-md-4">
                            <!-- <div class="d-none d-md-block">
                                <div class="row mb-md-5">
                                    <div class="col">
                                        <h5 class="mb-1 text-white">Account Details</h5>
                                        <p class="mb-0 text-white small">
                                            You have full control to manage your own Account.
                                        </p>
                                    </div>
                                   
                                </div>
                            </div> -->
                            <div class="card bx-shadow">
                                <div class="card-body">
                                    <div>
                                    <form action="#" method="POST">
                        <div class="form-group">
                            <input name="password" type="password" placeholder="Old Password"
                                class="form-control input-lg rounded">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" placeholder="New Password"
                                class="form-control input-lg rounded">
                        </div>
                        <div class="form-group">
                            <input name="password" type="text" placeholder="Confirm Password"
                                class="form-control input-lg rounded">
                        </div>
                        <button type="submit" name="submit" class="btn btn-info btn-full btn-medium rounded">Change
                            Password</button>
                       
                        <!-- <hr class="my-4"> -->
                        
                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php include 'footer.php' ?>
</body>


<!-- Mirrored from newannapurnatoursandtravels.com/deep/hospitania/website/account.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jun 2022 10:11:43 GMT -->

</html>