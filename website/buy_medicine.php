<!DOCTYPE html>
<html lang="en">

<?php include 'head.php' ?>

<body class="custom-cursor">

<?php include 'header.php' ?>

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg">
            </div>
            <div class="page-header-shape-1"><img src="assets/images/shapes/page-header-shape-1.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span>/</span></li>
                        <li>Insurance One</li>
                    </ul>
                    <h2>Insurance one</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>

                </h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="card">
                        <div class="header">
                            <h2 class="text-center">
                                Company
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="company_add.php">
                                        <i class="material-icons adds">add</i>
                                    </a>

                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SNO</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Operating Address</th>
                                            <th>GST Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>GSTIN</th>
                                            <th>Pin_Code</th>
                                            <th>Mobile_No</th>
                                            <th>Whatsapp_No</th>
                                            <th>E_mail</th>
                                            <th>Website</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                    $s = 1;
                                    $sql=mysqli_query($conn,"select * from `company`");
                                    while($row=mysqli_fetch_assoc($sql))
                                    {
                                    ?>
                                        <tr>
                                            <th><?php echo $s; ?></th>        
                                            <th><?php echo $row['Name']; ?></th>
                                            <th><?php echo $row['Address']; ?></th>
                                            <th><?php echo $row['oppaddress']; ?></th>
                                            <th><?php echo $row['gstaddress']; ?></th>
                                          
                                            <th><?php echo $row['City']; ?></th>
                                            <th><?php echo $row['State']; ?></th>
                                            <th><?php echo $row['State_Code']; ?></th>
                                            <th><?php echo $row['Pin_Code']; ?></th>
                                            <th><?php echo $row['Mobile_No']; ?></th>
                                            <th><?php echo $row['alternate_Mobile_No']; ?></th>
                                            <th><?php echo $row['E_mail']; ?></th>
                                            <th><?php echo $row['Website']; ?></th>
                                            

                                            <td class="action">

                                                <a href='company_add.php?id=<?php echo $row["id"] ?>' class="get_id"><i
                                                        class="material-icons">edit</i></a>
                                                <a href='company_add.php?id=<?php echo $row["id"] ?>&type=delete'
                                                    class="get_id"><i class="material-icons">delete</i></a>
                                                <a href='javascript:void(0)' class="get_id"
                                                    data-id='<?php echo $row["id"] ?>' data-toggle="modal"
                                                    data-target="#myModal"><i class="material-icons">preview</i></a>
                                            </td>
                                        </tr>

                                        <?php 
                                        $s++;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body" id="load_data">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>



</html>