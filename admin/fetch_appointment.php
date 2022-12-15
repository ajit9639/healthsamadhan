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
     <th> Status</th>
     <th> Date</th>
     <th> Time</th>
     <th>Action</th>
     
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
   $id = $row['id'];
  $output .= '
   <tr>
    <td>'.$row["date"].'</td>
    <td>'.$row["time"].'</td>
    <td>'.$row["problem"].'</td>
    <td>'.$row["ref_id"].'</td>    

    <td>'.$row["app_status"].'</td>    
    <td>'.$row["app_date"].'</td>    
    <td>'.$row["app_time"].'</td>    
    <td><a href="update_appointment.php?id='.$id.'" class="btn btn-success"> Change Status</a>'.'</td>    
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