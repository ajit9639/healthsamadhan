<?php
if(!isset($_SESSION['email'])){
    echo "<script>
    location.href = 'login.php';
    </script>";
}else{
    // $s =  $_SESSION['email'];
    // $s1 = mysqli_query($conn , "SELECT * FROM `signup` WHERE `email` = $s");
    // $getme = mysqli_fetch_assoc($s1);
    // $getme_name = $getme['first_name'];
}


?>

<div class="header">
    <div class="container-fluid theme-container">
        <div class="top-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <a href="index.php">
                        <img src="assets/img/logo.png" alt="logo" class="header-logo">
                    </a>
                </div>
                <div class="col">
                    <div class="header-search">
                        <!-- <form action="#">
                            <input class="form-control custom-search"
                                placeholder="Search for Medicines and Health Products" type="text">
                        </form> -->
                    </div>
                </div>
                <div class="col-auto">
                    <ul class="header-right-options">


                        <li class="dropdown">
                            <button id="dropdownCartButton" class="btn dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="list-icon">
                                    <i class="ti-user"></i>

                                    <?php echo 'Hello,'.' '. $_SESSION['my_nm']; ?>
                                    <span><i class="fa fa-angle-down drop-icon"></i></span>
                                </div>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right user-links"
                                aria-labelledby="dropdownMenuButton">
                                <ul>
                                    <li>
                                        <a href="account.php">
                                            Account
                                        </a>
                                    </li>
                                    <li>
                                        <a href="change-password.html">
                                            Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="address.html">
                                            Address
                                        </a>
                                    </li>
                                    <li>
                                        <a href="orders.html">
                                            My Orders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="orders-details.html">
                                            Order Details
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">
                                            Wish List
                                        </a>
                                    </li>
                                    <li id="user_logout">
                                        <a href="logout.php">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <!-- <li>
                            <a href="upload-prescription.html" class="btn btn-primary btn-sm">Upload</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>