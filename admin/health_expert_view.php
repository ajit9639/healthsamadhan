<?php include "header.php";


include "./php-framwork/methods/pagination.php";
include "./php-framwork/methods/search_data.php";

// pagination
$condition1 = 1;
$limit = 10;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
    unset($_SESSION['condition']);
};
$start_from = ($page - 1) * $limit;
$s_no = $start_from + 1;
$condition = '1 LIMIT ' . $start_from . ',' . $limit;
if (isset($_SESSION['condition'])) {
    if ($_SESSION['condition'] != '') {
        $condition = $_SESSION['condition'] . '  LIMIT ' . $start_from . ',' . $limit;
        $condition1 = $_SESSION['condition'];
    } else {
        $condition = '1 LIMIT ' . $start_from . ',' . $limit;
    }
}
// pagination end
?>

<div class="container-fluid page-body-wrapper">

    <?php include "sidebar.php";?>

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Health Expert</h4>


                            <div class="row">
                              <div class="col-md-6">
                              <div class="form-group">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon">Search</span> -->
                                    <input type="text" name="search_text" id="search_text"
                                        placeholder="Search Here" class="form-control" />
                                </div>
                            </div>
                              </div>
                            </div>
                            
                            <br />
                            <div id="result"></div>

                            <script>
                            $(document).ready(function() {

                                load_data();

                                function load_data(query) {
                                    $.ajax({
                                        url: "fetch_health.php",
                                        method: "POST",
                                        data: {
                                            query: query
                                        },
                                        success: function(data) {
                                            $('#result').html(data);
                                        }
                                    });
                                }
                                $('#search_text').keyup(function() {
                                    var search = $(this).val();
                                    if (search != '') {
                                        load_data(search);
                                    } else {
                                        load_data();
                                    }
                                });
                            });
                            </script>
                            <?php
paginate('health_expert_registration',$limit,'health_expert_view.php');
                include "footer.php";

              ?>