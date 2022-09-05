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
?>
<style>
body {
    background: #eee !important;
}

.general_info {
    padding-top: 40px;
}
</style>
<div class="general_info">
    <form action="">
        <div class="container">
            <div class="row">

               <!-- scrollable tabs -->
               <div class="vitalscrollmenu">
                    <a href="diabetic_history_meal.php">Meal Pattern</a>
                    <a class="active" href="diabetic_history_sugar.php">Sugar Level</a>
                    <a href="diabetic_history_weight.php">Weight(in Kg)</a>
                    <a href="diabetic_history_bp.php">BP</a>
                </div>


                <div class="col-12 label">
                    <label for=""> </label>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>DATE</th>
                            <th>FASTING</th>
                            <th>PP1</th>
                            <th>PP2</th>
                            <th>PP3</th>
                        </tr>

                        <?php   
                        $s = 1; 
$x = $_SESSION['email'];
// echo "SELECT * FROM `add_vital_sugar_level` where `user_id`='$x'";
$get = mysqli_query($conn , "SELECT * FROM `add_vital_sugar_level` where `user_id`='$x'");
while($get1 = mysqli_fetch_assoc($get)){
?>
                        <tr>
                            <td><?= $s?></td>
                            <td><?= $get1['date']?></td>
                            <td><?= $get1['fasting']?></td>
                            <td><?= $get1['pp1']?></td>
                            <td><?= $get1['pp2']?></td>
                            <td><?= $get1['pp3']?></td>
                        </tr>
                        <?php $s++;} ?>
                    </table>
                </div>
    </form>
</div>
</div>
</div>

<?php include 'footer.php' ?>
</body>

</html>