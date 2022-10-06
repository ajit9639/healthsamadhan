<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php
//session_start();
include('../conn.php');

// if(isset($_POST['submit'])){
// for($i=0;$i<count($_POST['slno']);$i++){

//         $student_name = $_POST['student_name'][$i];
//         $phone_no = $_POST['phone_no'][$i];
//         $age = $_POST['age'][$i];
//         $date_of_birth = $_POST['date_of_birth'][$i];

//         if($student_name!=='' && $phone_no!=='' && $age!=='' && $date_of_birth!==''){
//     $sql="INSERT INTO order(student_name,phone_no,age,date_of_birth)VALUES('$student_name','$phone_no','$age','$date_of_birth')";
//             $stmt=$conn->prepare($sql);
//             $stmt->execute();
//             echo '<div class="alert alert-success" role="alert">Submitted Successfully</div>';
//         }
//         else{
             
//             echo '<div class="alert alert-danger" role="alert">Error Submitting in Data</div>';

//         }
//     }
//     echo "<script type='text/javascript'>";
//         echo "alert('Submitted successfully')";
//         echo "</script>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php' ?>

<body class="custom-cursor">

<?php include 'header.php' ?>




<style>

  @media(min-width:576px){
    .rows{
    position: relative;
  }
  .btns{
    position: absolute;
    width: 0px;
    right: 45px;
    top:30px;
    border-radius:5px;
  }
  }
  
</style>
</head>
<body  onmouseover="total_vale()">

<div class="container">
<h3 align="center"><u>Add your medicine</u></h3>
<br>
    <form class="form-horizontal" action="checkout.php" method="post">
    <div class="row rows">

        <div class="col-sm-1">
          <label for="Age">Sl No:</label>
          <input type="text" class="form-control sl" name="slno[]" id="slno" value="1" readonly="">
        </div>
         
        <div class="col-sm-3">
          <label for="Student Name">Medicine Name:</label>
          <!-- <input type="text" class="form-control" name="student_name[]" id="st_name" placeholder="Enter Medicine Name"> -->
          
          <select id="select_page" class="form-control operator" onchange="getdata(this,1)" name="student_name[]" id="st_name1" >
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
          <input type="text" class="form-control" name="phone_no[]" id="pn1" placeholder="Enter QTY" onkeyup="total(1)" onmouseover="total_vale()">
        </div>
         
        <div class="col-sm-1">
          <label for="Age">Price:</label>
          <input type="text" class="form-control price" id="age1" name="age[]" placeholder="Enter Price" onmouseover="total_vale()" readonly>
        </div>
         
        <div class="col-sm-3">
         <label for="DateofBirth">Brand:</label>
            <input type="text" id="dob1" name="date_of_birth[]" class="form-control" placeholder="Enter Brand" onmouseover="total_vale()" readonly/>
        </div>
         

        <div class="col-sm-3">
         <label for="DateofBirth">Total price:</label>
            <input type="text" id="total_price1" name="" class="form-control totalprice" placeholder="Enter" onmouseover="total_vale()" readonly/>
        </div>



        </div><br/>
        <div id="next"></div>
       

    <button type="button" name="addrow" id="addrow" class="btn btn-primary pull-right">Add New Row</button>    
    <!-- <button type="submit" name="submit" class="btn btn-info pull-left">Submit</button><br><br> -->
    <!-- </form>


    <form method="POST" action="checkout.php"> -->
    <p  style="text-align: right;font-weight: 800;"> Total Amount : <span id="show_total"></span><br>
      
        <input type="submit" value="Checkout" class="btn btn-success" name="submit">
        <input type="hidden" name="mytotalvalue" id="show_total_input" />
   
      </p><br>
    </form>

</div>


<!-- <script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script> -->

<script>
        $('#addrow').click(function(){
        var length = $('.sl').length;
        var i   = parseInt(length)+parseInt(1);
        var newrow = $('#next').append('<div class="row rows"><div class="col-sm-1"><label for="Age">Sl No:</label>     <input type="text" class="form-control sl" name="slno[]" value="'+i+'" readonly="" >   </div><div class="col-sm-3"><label for="Student Name">Medicine Name:</label>    <select  id="select_page" onchange="getdata(this,'+i+')"  class="form-control operator" name="student_name[]" id="st_name'+i+'" id="st_name"><option value="" selected disabled>Select Medicine</option> <?php $query = mysqli_query($conn,"SELECT * FROM `medicines`"); while($select = mysqli_fetch_assoc($query)){ ?> <option value="<?= $select['product_name']?>"><?= $select['product_name']?></option> <?php } ?> </select>   </div><div class="col-sm-1"><label for="Phone">QTY*:</label><input type="text" class="form-control" name="phone_no[]" id="pn'+i+'" placeholder="Enter QTY" onkeyup="total('+i+')"  onclick="total_vale()" onmouseover="total_vale()"></div><div class="col-sm-1"><label for="Age">Price:</label><input type="text" class="form-control price" id="age'+i+'" name="age[]" placeholder="Enter Price" onmouseover="total_vale()" readonly></div><div class="col-sm-3"><label for="DateofBirth">Brand:</label><input type="text" id="dob'+i+'" name="date_of_birth[]" class="form-control"  placeholder="Enter Brand" onmouseover="total_vale()" readonly/> </div>                  <div class="col-sm-2"><label for="DateofBirth">Total price:</label>      <input type="text" id="total_price'+i+'" name="" class="form-control totalprice" onkeyup="total('+i+')" placeholder="Enter" onmouseover="total_vale()" readonly/>     </div>                             <input type="button" class="btnRemove btn-danger btns" value="x" onclick="total('+i+')" onmouseover="total_vale()"> </div><br>');         
        });
     
        // Removing event here
        $('body').on('click','.btnRemove',function() {
            $(this).closest('div').remove()
        });
         
        function getdata(data,id){
          $(document).ready(function(){
          $.ajax({
          url: "ajax/getmedicine.php?data="+data.value, 
          success: function(result){ 
          var medicine = JSON.parse(result);
          document.getElementById('age'+id).value = medicine.mrp;
          document.getElementById('dob'+id).value = medicine.brand;                        
          }   
        });
      });
      }



        function total_vale(){
          var total_amount=0;
          var tot_val = document.getElementsByClassName('totalprice');
          for(i=0;i<tot_val.length;i++){
            total_amount = total_amount + Number(tot_val[i].value);      
          }
          // console.log(total_amount);
          document.getElementById('show_total').innerText = total_amount;
          document.getElementById('show_total_input').value = total_amount;    
        }


        function total(id){
          // console.log(id);
          var price = document.getElementById('age'+id).value;
          var qty = document.getElementById('pn'+id).value;

          document.getElementById('total_price'+id).value = price * qty;
          // console.log(total);
          total_vale();
        }
     
</script>


   

<?php include 'footer.php' ?>
<script>
        $(function () {
    $("select").select2();
    });
    </script>
</body>
</html>