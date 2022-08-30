<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php include "header.php"; ?>
<body>
  <div class="wrapper text-center">
  <a href="./../index.php">
  <img src="../assets/img/logo.png" alt="">
  </a>
  <hr>
    <section class="users">
      <header>
        <div class="content">
          <?php      
          // echo "SELECT * FROM user_diet WHERE unique_id = {$_SESSION['unique_id']}";exit;     
            $sql = mysqli_query($conn, "SELECT * FROM user_diet WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>

          <!-- <img src="./image/user.png" alt=""> -->
          <div class="details">
            <span>Hello <?php echo $row['fname']. " " . $row['lname'] ?> </span>
            <!-- <p><?php echo $row['status']; ?></p> -->
          </div>
        </div>
      </header>

          <!-- <img src="php/images/<?php echo $row['img']; ?>" alt=""> -->
      <!-- <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a> -->
      <div class="search" style="display:none;">
        <span class="text">Select Dietition to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <br>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
