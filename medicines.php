<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- select search -->
    <!-- <script src="./select/select.js"></script>
    <link href="./select/select.css" rel="stylesheet">
    <script>
    $(function() {
        $("select").select2();
    });
    </script> -->
    <!-- select search -->

<?php 
include "aside_structure.php";


if(isset($_GET['id']))
{
    $uid=$_GET['id'];
    $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `add_vital_bp` where `date`='$dt'"));
}
?>

<body onmouseover="total_vale()">
    <div class="pt-5">
        <div class="container-fluid theme-container">

            <!-- <h3 align="center"><u>Buy Medicine</u></h3> -->
            <!-- <br> -->
            <h3 class="text-center">Buy Medicine</h3><hr>
            <form class="form-horizontal" action="medicines_checkout.php" method="post">
                <div class="row rows">

                    <div class="col-sm-1">
                        <label for="Age">Sl No:</label>
                        <input type="text" class="form-control sl" name="slno[]" id="slno" value="1" readonly="">
                    </div>

                    <div class="col-sm-3">
                        <label for="Student Name">Medicine Name:</label>
                        <!-- <input type="text" class="form-control" name="student_name[]" id="st_name" placeholder="Enter Medicine Name"> -->

                        <select id="select_page" class="form-control operator" onchange="getdata(this,1)"
                            name="student_name[]" id="st_name1">
                            <option value="" selected disabled>Select Medicine</option>
                            <?php
            $query = mysqli_query($conn,"SELECT * FROM `medicines`");
            while($select = mysqli_fetch_assoc($query)){
            ?>
                            <option value="<?= $select['product_name']?>"><?= $select['product_name']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <label for="Phone">QTY*:</label>
                        <input type="text" class="form-control" name="phone_no[]" id="pn1" placeholder="QTY"
                            onkeyup="total(1)" onmouseover="total_vale()">
                    </div>

                    <div class="col-sm-1">
                        <label for="Age">Price:</label>
                        <input type="text" class="form-control price" id="age1" name="age[]" placeholder="Price"
                            onmouseover="total_vale()" readonly>
                    </div>

                    <div class="col-sm-3">
                        <label for="DateofBirth">Brand:</label>
                        <input type="text" id="dob1" name="date_of_birth[]" class="form-control"
                            placeholder="Enter Brand" onmouseover="total_vale()" readonly />
                    </div>


                    <div class="col-sm-3">
                        <label for="DateofBirth">Total price:</label>
                        <input type="text" id="total_price1" name="" class="form-control totalprice" placeholder="Enter"
                            onmouseover="total_vale()" readonly />
                    </div>



                </div><br />
                <div id="next"></div>

<div>
    <button type="button" name="addrow" id="addrow" class="btn btn-info pull-right float-left">Add New Row</button>
</div>
                <!-- <button type="submit" name="submit" class="btn btn-info pull-left">Submit</button><br><br> -->
                <!-- </form>


    <form method="POST" action="checkout.php"> -->
                <p style="text-align: right;font-weight: 800;"> Total Amount : <span id="show_total"></span><br>

                    <input type="submit" value="Checkout" class="btn btn-success" name="submit">
                    <input type="hidden" name="mytotalvalue" id="show_total_input" />

                </p><br>
            </form>



        </div>
    </div>




    <script>
    $('#addrow').click(function() {
        var length = $('.sl').length;
        var i = parseInt(length) + parseInt(1);
        var newrow = $('#next').append(
            '<div class="row rows"><div class="col-sm-1"><label for="Age">Sl No:</label>     <input type="text" class="form-control sl" name="slno[]" value="' +
            i +
            '" readonly="" >   </div><div class="col-sm-3"><label for="Student Name">Medicine Name:</label>    <select  id="select_page" onchange="getdata(this,' +
            i + ')"  class="form-control operator" name="student_name[]" id="st_name' + i +
            '" id="st_name"><option value="" selected disabled>Select Medicine</option> <?php $query = mysqli_query($conn,"SELECT * FROM `medicines`"); while($select = mysqli_fetch_assoc($query)){ ?> <option value="<?= $select['product_name']?>"><?= $select['product_name']?></option> <?php } ?> </select>   </div><div class="col-sm-1"><label for="Phone">QTY*:</label><input type="text" class="form-control" name="phone_no[]" id="pn' +
            i + '" placeholder="QTY" onkeyup="total(' + i +
            ')"  onclick="total_vale()" onmouseover="total_vale()"></div><div class="col-sm-1"><label for="Age">Price:</label><input type="text" class="form-control price" id="age' +
            i +
            '" name="age[]" placeholder="Price" onmouseover="total_vale()" readonly></div><div class="col-sm-3"><label for="DateofBirth">Brand:</label><input type="text" id="dob' +
            i +
            '" name="date_of_birth[]" class="form-control"  placeholder="Enter Brand" onmouseover="total_vale()" readonly/> </div>                  <div class="col-sm-2"><label for="DateofBirth">Total price:</label>      <input type="text" id="total_price' +
            i + '" name="" class="form-control totalprice" onkeyup="total(' + i +
            ')" placeholder="Enter" onmouseover="total_vale()" readonly/>     </div>                             <input type="button" class="btnRemove btn-danger btns btn" value="x" onclick="total(' +
            i + ')" onmouseover="total_vale()"> </div><br>');
    });

    // Removing event here
    $('body').on('click', '.btnRemove', function() {
        $(this).closest('div').remove()
    });

    function getdata(data, id) {
        $(document).ready(function() {
            $.ajax({
                url: "./website/ajax/getmedicine.php?data=" + data.value,
                success: function(result) {
                    var medicine = JSON.parse(result);
                    document.getElementById('age' + id).value = medicine.mrp;
                    document.getElementById('dob' + id).value = medicine.brand;
                }
            });
        });
    }



    function total_vale() {
        var total_amount = 0;
        var tot_val = document.getElementsByClassName('totalprice');
        for (i = 0; i < tot_val.length; i++) {
            total_amount = total_amount + Number(tot_val[i].value);
        }
        // console.log(total_amount);
        document.getElementById('show_total').innerText = total_amount;
        document.getElementById('show_total_input').value = total_amount;
    }


    function total(id) {
        // console.log(id);
        var price = document.getElementById('age' + id).value;
        var qty = document.getElementById('pn' + id).value;

        document.getElementById('total_price' + id).value = price * qty;
        // console.log(total);
        total_vale();
    }
    </script>
    
   
</body>
<?php include 'footer.php' ?>
</body>