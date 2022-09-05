<style>
@media(max-width:985px) {
    div.vitalscrollmenu {
        margin-top: 60px;
    }
}


div.vitalscrollmenu {
    /* background-color: #333; */
    overflow: auto;
    white-space: nowrap;
}

div.vitalscrollmenu .active {
    background: #4E97FD;
}

div.vitalscrollmenu a {
    display: inline-block;
    color: white;
    text-align: center;
    text-decoration: none;
    background-color: #777;
    border-radius: 30px;
    padding: 10px 30px;
    margin-right: 25px;
}
</style>

<?php 
include "aside_structure.php";

if(isset($_POST['submit'])){
$date = $_POST['date'];
$time = $_POST['time'];
$problem = $_POST['problem'];
$number = $_POST['number'];
$email = $_SESSION['email'];

$ins = mysqli_query($conn, "INSERT INTO `appointment`(`date`, `time`, `problem`,`phone_number`, `ref_id`) VALUES('$date','$time','$problem','$number','$email')");
if($ins) {
    echo "<script>
    alert('success');
    window.location.href='my_appointment.php';
    </script>";
}
}
?>

<div class="pt-5">
    <div class="container theme-container">
        <div class="row mb-2">
            <div class="col-md-6 m-auto">
            <h3 class="text-center w-100">Book an Appointment</h3>
            <form method="POST">
                <div class="row">                                     

                    <div class="col-md-12">
                    <label>Select Date :</label>
                        <input type="date" class="form-control" name="date" >
                    </div>
                   
                    <div class="col-md-12">
                    <label>Select time :</label>
                        <input type="time" class="form-control"  name="time" >
                    </div>
                
                    <div class="col-md-12">
                    <label>Enter Number :</label>
                        <input type="number" class="form-control"  name="number" >
                    </div>

                    <div class="col-md-12">
                    <label>Tell me about your problem :</label>
                        <textarea name="problem" rows="2" class="form-control"></textarea>                   
                    </div>

                    <div class="col-md-8 mt-2">
                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                    </div>

                </div>
            </form>
            </div>

        </div>

    </div>
</div>




<?php include 'footer.php' ?>
</body>