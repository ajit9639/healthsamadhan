<?php include 'conn.php' ?>

<!doctype html>
<html lang="zxx">

<?php include 'head.php';?>
<link rel="stylesheet" href="./assets/css/other_page.css">
<style>
    body{
        background: #eee!important;
    }
</style>
<body>

    <?php include 'header.php' ?>

    <?php include 'mobile-header.php' ?>

    <ul class="mobile-aside-bar">
        <li>
            <a href="general_info.php">Genearal Information</a>
        </li>

        <li>
            <a href="diabetic_history_meal.php">Diabetic History</a>
        </li>
        <li>
            <a href="comorbidities_&_complications_history.php">Comorbidities & Complications History</a>
        </li>
        <li>
            <a href="consult_history.php">Consult History</a>
        </li>
        <li>
            <a href="lap_detail_report.php">Lap Detail Report</a>
        </li>
        <li>
            <a href="uploaded_report.php">Uploaded Report</a>
        </li>
        <li>
            <a href="upload_new_report.php">Upload New Report</a>
        </li>
        <li>
            <a href="treatment.php">Treatment</a>
        </li>
        <li>
            <a href="all_experts.php">All Experts</a>
        </li>
    </ul>



    <?php include 'footer.php' ?>
</body>

</html>