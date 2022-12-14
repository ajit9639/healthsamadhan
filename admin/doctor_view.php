<?php include "header.php";?>

<div class="container-fluid page-body-wrapper">

    <?php include "sidebar.php";?>

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Doctors</h4>
                            
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
                                        url: "fetch_doctor.php",
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
                include "footer.php";

              ?>