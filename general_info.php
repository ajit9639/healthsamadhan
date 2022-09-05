<?php 
include "aside_structure.php";



$x = $_SESSION['email'];
$get = mysqli_query($conn , "SELECT * FROM `signup` where `email`='$x'");
$get1 = mysqli_fetch_assoc($get);

?>
<style>
    body{
        background: #eee!important;
    }
    .general_info{
        padding-top: 100px;
    }
</style>
<div class="general_info">
    <form action="">
        <div class="container">
            <div class="row">


                <div class="col-5 label">
                    <label for="">First Name :</label>
                </div>
                <div class="col-7 label">
                <label for=""><?= $get1['first_name'] ?> </label>
                </div>

                <div class="col-5 label">
                    <label for="">Last Name :</label>
                </div>
                <div class="col-7 label">
                <label for=""><?= $get1['last_name'] ?> </label>
                </div>


               <div class="col-5 label">
                    <label for="">Gender :</label>
                </div>
                 <div class="col-7 label">
                <label for=""><?= $get1['gender'] ?> </label>
                </div>


               <div class="col-5 label">
                    <label for="">Number :</label>
                </div>
                 <div class="col-7 label">
                <label for=""><?= $get1['phone_number'] ?> </label>
                </div>


               <div class="col-5 label">
                    <label for="">Email :</label>
                </div>
                 <div class="col-7 label">
                <label for=""><?= $get1['email'] ?></label>
                </div>


                <div class="col-5 label">
                    <label for="">DOB :</label>
                </div>
                 <div class="col-7 label">
                    <label for=""><?= $get1['dob'] ?> </label>
                </div>

               <div class="col-5 label">
                    <label for="">Address :</label>
                </div>
                 <div class="col-7 label">
                    <label for=""><?= $get1['address'] ?> </label>
                </div>


               <div class="col-5 label">
                    <label for="">Height :</label>
                </div>
                 <div class="col-7 label">
                <label for=""><?= $get1['height'] ?> </label>
                </div>

               <div class="col-5 label">
                    <label for="">Age :</label>
                </div>
                 <div class="col-7 label">
                <label for=""><?= $get1['age'] ?>  </label>
                </div>

               <div class="col-5 label">
                    <label for="">Mother Tongue :</label>
                </div>
                 <div class="col-7 label">
                <label for=""><?= $get1['mother_tongue'] ?>  </label>
                </div>

               <div class="col-5 label">
                    <label for="">Marital Status :</label>
                </div>
                 <div class="col-7 label">
                <label for=""><?= $get1['marital_status'] ?> </label>
                </div>

               <div class="col-5 label">
                    <label for="">Monthly Income :</label>
                </div>
                 <div class="col-7 label">
                <label for=""><?= $get1['monthly_income'] ?> </label>
                </div>

               <div class="col-5 label">
                    <label for="">Education :</label>
                </div>
                 <div class="col-7 label">
                <label for=""><?= $get1['education'] ?> </label>
                </div>

               <!-- <div class="col-5 label">
                    <label for="">Occupation :</label>
                </div>
                 <div class="col-7 label">
                <label for="">Business </label>
                </div> -->

                <div class="col-6">
                    <a href="edit_profile.php" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i> Edit</a>
                
                </div>
                <div class="col-6">
                </div>

    </form>
</div>
</div>
</div>

<?php include 'footer.php' ?>
</body>

</html>