<?php 
include 'conn.php';
 include 'head.php' ?>

<body>

   <?php include 'header.php' ?>

   <?php include 'mobile-header.php' ?>
    
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                
                <div class="modal-body">
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
                        <button type="submit" name="submit" class="btn btn-primary btn-full btn-medium rounded">Change
                            Password</button>
                        <div class="form-group text-center small font-weight-bold mt-3">
                            Want to <a href="login.php" >
                                Login?</a>
                        </div>
                        <hr class="my-4">
                        <div class="form-group text-center small font-weight-bold mb-0">
                            Don’t have an account? <a href="register.php"> Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php include 'footer.php' ?>