<?php
//session_start();
include "../conn.php";
if(isset($_POST['submit'])){
for($i=0;$i<count($_POST['slno']);$i++){
        $student_name = $_POST['student_name'][$i];
        $phone_no = $_POST['phone_no'][$i];
        $age = $_POST['age'][$i];
        $date_of_birth = $_POST['date_of_birth'][$i];
        if($student_name!=='' && $phone_no!=='' && $age!=='' && $date_of_birth!==''){
    $sql="INSERT INTO student(student_name,phone_no,age,date_of_birth)VALUES('$student_name','$phone_no','$age','$date_of_birth')";
            $stmt=$con->prepare($sql);
            $stmt->execute();
            //echo '<div class="alert alert-success" role="alert">Submitted Successfully</div>';
        }
        else{
             
            echo '<div class="alert alert-danger" role="alert">Error Submitting in Data</div>';
        }
    }
    echo "<script type='text/javascript'>";
        echo "alert('Submitted successfully')";
        echo "</script>";
}
?>
<html>
<head>
<title>ajax example</title>
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
.container{
     
    width:80%;
    height:30%;
    padding:20px;
}
</style>
</head>
<body>
<div class="container">
<h3 align="center"><u>Add Your Medicing</u></h3>
<br/><br/><br/>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="col-sm-1">
          <label for="Age">Sl No:</label>
          <input type="text" class="form-control sl" name="slno[]" id="slno" value="1" readonly="">
        </div>
         
        <div class="col-sm-3">
          <label for="Student Name">Student Name:</label>
          <input type="text" class="form-control" name="student_name[]" id="st_name" placeholder="Enter Student Name">
        </div>
         
        <div class="col-sm-3">
         <label for="Phone">Phone No*:</label>
          <input type="text" class="form-control" name="phone_no[]" id="pn" placeholder="Enter Phone No">
        </div>
         
        <div class="col-sm-1">
          <label for="Age">Age:</label>
          <input type="text" class="form-control" id="age" name="age[]" placeholder="Enter Age">
        </div>
         
        <div class="col-sm-3">
         <label for="DateofBirth">Date of Birth:</label>
            <input type="date" id="dob" name="date_of_birth[]" class="form-control"/>
        </div>
         
        </div><br/>
        <div id="next"></div>
        <br/>
    <button type="button" name="addrow" id="addrow" class="btn btn-success pull-right">Add New Row</button>
    <br/><br/>
    <button type="submit" name="submit" class="btn btn-info pull-left">Submit</button>
    </form>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<script>
$('#addrow').click(function(){
        var length = $('.sl').length;
        var i   = parseInt(length)+parseInt(1);
        var newrow = $('#next').append('<div class="row"><div class="col-sm-1"><label for="Age">Sl No:</label><input type="text" class="form-control sl" name="slno[]" value="'+i+'" readonly=""></div><div class="col-sm-3"><label for="Student Name">Student Name:</label><input type="text" class="form-control" name="student_name[]" id="st_name'+i+'" placeholder="Enter Student Name"></div><div class="col-sm-3"><label for="Phone">Phone No*:</label><input type="text" class="form-control" name="phone_no[]" id="pn'+i+'" placeholder="Enter Phone No"></div><div class="col-sm-1"><label for="Age">Age:</label><input type="text" class="form-control" id="age'+i+'" name="age[]" placeholder="Enter Age"></div><div class="col-sm-3"><label for="DateofBirth">Date of Birth:</label><input type="date" id="dob'+i+'" name="date_of_birth[]" class="form-control"/></div><input type="button" class="btnRemove btn-danger" value="Remove"/></div><br>');
         
        });
     
    // Removing event here
  $('body').on('click','.btnRemove',function() {
       $(this).closest('div').remove()
 
  });
         
</script>
</body>
</html>