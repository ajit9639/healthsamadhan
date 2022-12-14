<?php
include "conn.php";


$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM appointment 
  WHERE date LIKE '%".$search."%'
  OR time LIKE '%".$search."%' 
  OR problem LIKE '%".$search."%' 
  OR phone_number LIKE '%".$search."%' 
  OR ref_id LIKE '%".$search."%'
  
 ";
}
else
{
 $query = "
  SELECT * FROM appointment ORDER BY id
 ";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered table table-bordered">
    <tr class="bg-danger text-light">
     <th>Appointment Date</th>
     <th>Time</th>
     <th>Problem</th>
     <th>Email</th>
     
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["date"].'</td>
    <td>'.$row["time"].'</td>
    <td>'.$row["problem"].'</td>
    <td>'.$row["ref_id"].'</td>    
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