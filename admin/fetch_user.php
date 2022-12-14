<?php
include "conn.php";


$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM signup 
  WHERE first_name LIKE '%".$search."%'
  OR phone_number LIKE '%".$search."%' 
  OR email LIKE '%".$search."%' 
  OR address LIKE '%".$search."%' 
  OR user_status LIKE '%".$search."%'
  OR tranx_id LIKE '%".$search."%'
  OR tranx_status LIKE '%".$search."%'
  OR tranx_date LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM signup ORDER BY id
 ";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered table table-bordered">
    <tr class="bg-danger text-light">
     <th>Customer Name</th>
     <th>Phone Number</th>
     <th>Email</th>
     <th>Address</th>
     <th>User Status</th>
     <th>Transaction Status</th>
     <th>Transaction ID</th>
     <th>Transaction Date</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["first_name"].'</td>
    <td>'.$row["phone_number"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["address"].'</td>
    <td>'.$row["user_status"].'</td>
    <td>'.$row["tranx_status"].'</td>
    <td>'.$row["tranx_id"].'</td>
    <td>'.$row["tranx_date"].'</td>
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