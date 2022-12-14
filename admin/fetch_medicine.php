<?php
include "conn.php";


$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM medicines 
  WHERE product_name LIKE '%".$search."%'
  OR skunit LIKE '%".$search."%' 
  OR mrp LIKE '%".$search."%' 
  OR brand LIKE '%".$search."%' 
 
  
 ";
}
else
{
 $query = "
  SELECT * FROM medicines ORDER BY id
 ";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered table table-bordered">
    <tr class="bg-danger text-light">
     <th>medicines Name</th>
     <th>Skunit</th>
     <th>Price</th>     
     <th>Brand</th>          
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["product_name"].'</td>
    <td>'.$row["skunit"].'</td>
    <td>'.$row["mrp"].'</td>
    <td>'.$row["brand"].'</td>    
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