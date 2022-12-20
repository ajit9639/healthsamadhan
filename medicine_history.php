<?php 

include "aside_structure.php";
?>



<section class="appointment">
<div class="container-fluid">

<!-- <a href="book_appointment.php" class="btn btn-info mt-4">Book Appointment</a> -->

<h3 class="text-center">My Orders</h3><hr>

<div class="my_appointment">
<?php
           
           $query = "SELECT * FROM `student`";

           $fetched_data = mysqli_query($conn,$query);

           $total = mysqli_num_rows($fetched_data);

           $all_rows = mysqli_fetch_assoc($fetched_data);
        
             ?>
             <div class="table-responsive pt-3">
               <table class="table table-bordered">
                <thead>
                 <tr>
                   <th scope="col">Order Id</th>
                   <th scope="col">Payment Status</th>
                   <th scope="col">Medicine Name</th>
                   <th scope="col">Quantity</th>
                   <!-- <th scope="col">Total Price</th>
                   <th scope="col">Brand Name</th> -->
                   <th scope="col">Total Amount</th>
                   <th scope="col">Date</th>                      
                   <th scope="col">Transaction Id</th>                      
                                        
                   <th scope="col">Name</th>                      
                   <th scope="col">Email</th>                      
                   <th scope="col">Phone</th>                      
                   <th scope="col">address</th>                      
                   
                 </tr>
                  </thead>

                 <?php
                 $s =1;
                 $data = mysqli_query($conn,"SELECT * FROM `student` GROUP BY `random` having `status`='success'");
                 while($all_rows = mysqli_fetch_assoc($data))
                   {                        
                   echo "<tr>
                           <td>
                           <a href='all_orders_datail.php?id=$all_rows[random]'>ODR_HSN_$s</a></td>
                           <td>$all_rows[status]</td>
                           <td>$all_rows[student_name]</td>
                           <td>$all_rows[phone_no]</td>
                           <td>$all_rows[age]</td>
                           
                           <td>$all_rows[date]</td>                                                          
                           <td>$all_rows[txn_id]</td>                                                          
                                                                              
                           <td>$all_rows[fname]</td>                                                          
                                                                                
                           <td>$all_rows[email]</td>                                                          
                           <td>$all_rows[phone]</td>      
                           <td>$all_rows[address]</td>  
                                                                               
                           
                       </tr>";    
                       $s++;                      
                   }            

               ?>
               </table>
             </div>
</div>




</div>
</section>

<?php include 'footer.php' ?>
</body>

</html>