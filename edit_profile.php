<?php 
include "aside_structure.php";

$x = $_SESSION['email'];
$get = mysqli_query($conn , "SELECT * FROM `signup` where `email`='$x'");
$get1 = mysqli_fetch_assoc($get);


$type = $get1['gender'];


if(isset($_POST['submit'])){
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$age = $_POST['age'];
$mother_tongue = $_POST['mother_tongue'];
$marital_status = $_POST['marital_status'];
$monthly_income = $_POST['monthly_income'];
$education = $_POST['education'];

// echo "UPDATE `signup` SET `first_name`='$first_name',`last_name`='$last_name',`gender`='$gender',`phone_number`='$phone_number',`email`='$email',`address`='$address',`dob`='$dob',`height`='$height',`weight`='$weight',`age`='$age',`mother_tongue`='$mother_tongue',`marital_status`='$marital_status',`monthly_income`='$monthly_income',`education`='$education' WHERE `email`='$x'";exit;

$update = mysqli_query($conn , "UPDATE `signup` SET `first_name`='$first_name',`last_name`='$last_name',`gender`='$gender',`phone_number`='$phone_number',`email`='$email',`address`='$address',`dob`='$dob',`height`='$height',`weight`='$weight',`age`='$age',`mother_tongue`='$mother_tongue',`marital_status`='$marital_status',`monthly_income`='$monthly_income',`education`='$education' WHERE `email`='$x'");
if($update){
    echo"<script>
        alert('success');
        window.location.href='edit_profile.php';
        </script>"; 
}
}
?>
<style>
body {
    background: #eee !important;
}

.general_info {
    padding-top: 100px;
}
</style>
<div class="general_info">
    <form action="" method="POST">
        <div class="container">
            <div class="row">


                <div class="col-3 label">
                    <label for="">First Name  </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="first_name" value="<?= $get1['first_name'] ?>">
                </div>

                <div class="col-3 label">
                    <label for="">Last Name </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="last_name" value="<?= $get1['last_name'] ?>">
                </div>


                <div class="col-3 label">
                    <label for="">Gender </label>
                </div><br>
                <div class="col-9 input">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="male" <?php if ($type == 'male') echo 'checked="checked"'; ?>>Male
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="female" <?php if ($type == 'female') echo 'checked="checked"'; ?>>Female
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="other" <?php if ($type == 'other') echo 'checked="checked"'; ?>>Other
                        </label>
                    </div>
                    
                </div>


                <div class="col-3 label">
                    <label for="">Number </label>
                </div>
                <div class="col-9 input">
                    <input type="number" class="form-control" name="phone_number" value="<?= $get1['phone_number'] ?>">
                </div>


                <div class="col-3 label">
                    <label for="">Email </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="email" value="<?= $get1['email'] ?>">
                </div>



                <div class="col-3 label">
                    <label for="">DOB </label>
                </div>
                <div class="col-9 input">
                <input type="date" class="form-control" name="dob" value="<?= $get1['dob'] ?>">
                </div>


                <div class="col-3 label">
                    <label for="">Address </label>
                </div>
                <div class="col-9 input">
                    <textarea name="address" rows="3" class="form-control"><?= $get1['address'] ?></textarea>
                </div>


                <div class="col-3 label">
                    <label for="">Height </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="height" value="<?= $get1['height'] ?>">
                </div>

                <div class="col-3 label">
                    <label for="">Weight </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="weight" value="<?= $get1['weight'] ?>">
                </div>


                <div class="col-3 label">
                    <label for="">Age </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="age" value="<?= $get1['age'] ?>">
                </div>

                <div class="col-3 label">
                    <label for="">Mother Tongue </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="mother_tongue" value="<?= $get1['mother_tongue'] ?>">
                </div>

                <div class="col-3 label">
                    <label for="">Marital Status </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="marital_status" value="<?= $get1['marital_status'] ?>">
                </div>

                <div class="col-3 label">
                    <label for="">Monthly Income </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="monthly_income" value="<?= $get1['monthly_income'] ?>">
                </div>

                <div class="col-3 label">
                    <label for="">Education </label>
                </div>
                <div class="col-9 input">
                    <input type="text" class="form-control" name="education" value="<?= $get1['education'] ?>">
                </div>

                <div class="col-6">
                    <input type="submit" class="btn btn-success" value="update" name="submit">

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