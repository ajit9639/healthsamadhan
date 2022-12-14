<style>
/* website view */
.web-nav {
    background-color: #000;
}
.web-nav ul {
    display: flex;
    list-style-type: none;
    margin: 0px;
}
.web-nav ul li {
    padding: 0 10px;
}
.web-nav ul li a {
    text-decoration: none;
    color: #fff;
}
@media(max-width:992px){
    .web-nav{
        display: none;
    }    
}
@media (max-width: 992px) {
         .accordians {
             padding-top: 100px;
         }
         .appointment{
            padding-top: 100px;
         }
     }         
</style>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark web-nav">
  <!-- Brand -->
  <!-- <a class="navbar-brand" href="#">Logo</a> -->

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="my_appointment.php">My Appointment</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="my_subscription.php">My Subscription</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="payment_history.php">Payment History</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="faq.php">FAQ</a>
    </li>

    
    <li class="nav-item">
      <a class="nav-link" href="#">Share this App</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Notification  <span class="badge badge-secondary badge-success">2</span>
      </a>
      <div class="dropdown-menu bg-dark">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>


 <!-- <nav class="web-nav">
        <ul>
            <li><a href="my_appointment.php">My Appointment</a></li>
            <li><a href="my_subscription.php">My Subscription</a></li>
            <li><a href="payment_history.php">Payment History</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav> -->
    <!-- // web view nav -->

<div class="mobile-header">
        <div class="container-fluid theme-container">
            <div class="row align-items-center">
                <div class="col-auto">
                    <ul class="header-left-options">
                        <li class="link-item open-sidebar">
                            <i class="ti-align-left" style="font-weight: 500;color: deepskyblue;font-size: 20px;" ></i>
                        </li>
                    </ul>
                    
                </div>
                <div class="col text-center">
                    <a href="index.php"><img src="assets/img/logo.png" alt="logo" class="header-logo"></a>
                </div>
                <div class="col-auto">

                    <!-- <ul class="header-right-options">
                        <li class="link-item">
                            <span class="badge badge-secondary">0</span>
                            <i class="ti-bag"></i>
                        </li>
                    </ul> -->

                </div>
            </div>


            <div class="menu-sidebar">
                <div class="close">
                    <i class="ti-close"></i>
                </div>

                <div class="welcome d-flex align-items-center">
                    <!-- <a href="#"  data-toggle="modal" data-dismiss="modal" data-target="#login_modal" class="btn btn-soft-primary btn-md">Login</a>
                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#register_modal" class="btn btn-primary btn-md">Register</a> -->
                    <!-- <div class="avater btn-soft-primary"></div> -->
                    <!-- <a href="profile.php"><?php //echo 'Hello,'.' '. $_SESSION['my_nm']; ?></a> -->
                    <a href=""><?php echo 'Hello,'.' '. $_SESSION['my_nm']; ?></a>
                </div>
                <div class="mobileMenuLinks mb-4 mt-2">
                    <!-- <h6>Account Info</h6> -->
                    <ul>
                        <!-- <li><a href="#">Your Last Rx</a></li> -->
                        <li><a href="my_appointment.php">My Appointment</a></li>
                        <li><a href="my_subscription.php">My Subscriptions</a></li>
                        <!-- <li><a href="#">Program Adherence</a></li> -->
                        <!-- <li><a href="#">Choose Your Program</a></li> -->
                        <!-- <li><a href="health_partner.php">Health Partners</a></li> -->
                        <li><a href="payment_history.php">Payment History</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="#">Share this App</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>

                
            </div>
        </div>
        <div class="overlay"></div>
    </div>