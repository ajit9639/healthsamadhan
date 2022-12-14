<?php
include "conn.php";


$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM health_expert_registration 
  WHERE first_name LIKE '%".$search."%'
  OR phone LIKE '%".$search."%' 
  OR email LIKE '%".$search."%' 
  OR reg_no LIKE '%".$search."%' 
  OR city LIKE '%".$search."%'
  OR address LIKE '%".$search."%'
  
 ";
}
else
{
 $query = "
  SELECT * FROM health_expert_registration ORDER BY id
 ";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered table table-bordered">
    <tr class="bg-danger text-light">
     <th>Doctor Name</th>
     <th>Phone Number</th>
     <th>Email</th>
     <th>Registration Number</th>
     <th>Gender</th>
     <th>Year Of Exp</th>
     <th>City</th>
     <th>Address</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["first_name"].'</td>
    <td>'.$row["phone"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["reg_no"].'</td>
    <td>'.$row["gender"].'</td>
    <td>'.$row["year_of_exp"].'</td>
    <td>'.$row["city"].'</td>
    <td>'.$row["address"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>