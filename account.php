<?php include 'conn.php'; ?>

<!doctype html>
<html lang="zxx">



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
                        <h1 class="h3 mb-0">Account</h1>
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
                            <button class="navbar-toggler d-md-none rounded bg-primary text-light" type="button" data-toggle="collapse" data-target="#sidenav" aria-controls="sidenav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="ti-menu"></span>
                            </button>
                            <!-- Collapse navbar -->
                            <div class="collapse navbar-collapse" id="sidenav">
                                <div class="navbar-nav flex-column">
                                    <!-- List -->
                                    <div class="border-bottom">
                                        <div class="m-4">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="avater btn-soft-primary">DS</div>
                                                </div>
                                                <div class="col-auto">
                                                    <h6 class="d-block font-weight-bold mb-0"><?php echo $_SESSION['usrnm']; ?></h6>
                                                    <small class="text-muted">Youremail@gmail.com</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="account.html"><i class="fa fa-user"></i> My
                                                Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="change-password.html"><i class="fa fa-lock"></i>
                                                Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="address.html"><i class="fa fa-address-book"></i>
                                                Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="orders.html"><i class="fa fa-shopping-cart"></i>
                                                Order</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="wishlist.html"><i class="fa fa-heart"></i>
                                                Wishlist</a>
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
                            <div class="d-none d-md-block">
                                <div class="row mb-md-5">
                                    <div class="col">
                                        <h5 class="mb-1 text-white">Account Details</h5>
                                        <p class="mb-0 text-white small">
                                            You have full control to manage your own Account.
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="change-password.html" class="btn btn-primary btn-sm"> Change Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <form class="row align-items-end">
                                            <!-- First name -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="fname">First Name</label>
                                                <input type="text" id="fname" class="form-control" placeholder="First Name">
                                            </div>
                                            <!-- Last name -->
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="lname">Last Name</label>
                                                <input type="text" id="lname" class="form-control" placeholder="Last Name">
                                            </div>
                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="fname">Phone</label>
                                                <input type="text" id="fname" class="form-control" placeholder="Phone" value="1234567890">
                                            </div>

                                            <div class="mb-3 col-12 col-md-6">
                                                <label class="form-label" for="fname">Email</label>
                                                <input type="text" id="fname" class="form-control" placeholder="Email" value="abc@abc.com">
                                            </div>
                                            <div class="col-12 mb-3 text-lg-right">
                                                <button class="btn btn-primary" type="submit">
                                                    edit details
                                                </button>
                                            </div>
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