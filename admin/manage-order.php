
<?php include('partials/menu.php');?>

<div class="main-content">
   <div class="wrapper">
          <h1>Manage Order</h1>
          <br/> <br/> <br/>

          <?php
                 if(isset($_SESSION['update']))
                 {
                     echo  $_SESSION['update'];
                     unset($_SESSION['update']);
                 }
          
          ?>

          <form action="" method="POST" enctype="multipart/form-data" >
          
             <table class="tbl-full">
                  <tr>
                       <th>S.N.</th>
                       <th>Food</th>
                       <th>Price</th>
                       <th>Qty.</th>
                       <th>total</th>
                       <th>status</th>
                       <th>Name</th>
                       <th>contact</th>
                       <th>Address</th>
                       <th>Special instruction</th>
                       <th>Actions</th>
                      
                  </tr>
                     

                     <?php
                        //Get all the orders from the database
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC";//Display the latest order at first

                        //Execute the query
                        $res = mysqli_query($conn, $sql);
                        
                        //count the rows
                        $count = mysqli_num_rows($res);

                        
                        //Create a serial number and assign its value as 1
                        $sn = 1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                      //Get all the order details

                                      $id=$row['id'];
                                      $food = $row['food'];
                                      $price = $row['price'];
                                      $qty = $row['qty'];
                                      $total = $row['total'];                                   
                                      $status = $row['status'];
                                      $customer_name = $row['customer_name'];
                                     $customer_contact = $row['customer_contact'];                                 
                                      $customer_address= $row['customer_address'];
                                      $special_instruction = $row['special_instruction'];
                                  ?>
                                      
                                       <tr>
                                                 <td><?php echo $sn++; ?></td>
                                                 <td><?php echo $food; ?></td>
                                                 <td><?php echo $price; ?></td>
                                                 <td><?php echo $qty; ?></td>
                                                 <td><?php echo $total ; ?></td>
                                            


                                                       <td><?php echo $status; ?></td> 
                                                      <td><?php echo $customer_name ; ?></td>                                                    
                                                      <td><?php echo $customer_contact ; ?></td> 
                                                      <td><?php echo $customer_address ; ?></td>
                                                      <td><?php echo $special_instruction ; ?></td>
                                                      <td>
                                                         <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update order</a>
                         
                                                      </td>
                         
                  
                                        </tr>

                                  <?php    
                            }
                        }
                        else
                        {
                            //NO Order available
                            echo "<tr> <td colspan ='12' class='error'> Orders not Available.</td></tr>" ;            
                       
                        }                
                   ?>
                  
             
             </table>
          
          </form>
     
   </div>
</div>
<?php include('partials/footer.php');?>



