

<?php include('partials/menu.php'); ?>

<div class="main-content">

   <div class="wrapper">
      <h1>Update Order</h1>
      <br> <br> <br>

      <?php
            //Checking if the id is set or not
            if(isset($_GET['id']))
            {
                $food_id = $_GET['id'];


                //SQL Query to get details of the selected food
                $sql = "SELECT * FROM tbl_order WHERE id=$food_id";


                //Execute the query
                $res = mysqli_query($conn, $sql);
                
                //counting rows to check data
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Data is available and getting the details of the order

                    $row = mysqli_fetch_assoc($res);

                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_address = $row['customer_address'];
                    $instruction = $row['special_instruction'];

                }
                else
                {
                    //Order details not available
                    //Redirect to manage-order page
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
      ?>

      <form action="" method="POST">
      
          <table class="tbl-30">
          
                 <tr>
                      <td>Food Name</td>
                      <td><b><?php echo $food; ?></b></td>
                 </tr>

                 <tr>
                      <td>Price</td>
                      <td><b>$<?php echo $price; ?></b></td>
                 </tr>

                 <tr>
                      <td>Qty</td>
                      <td>
                          <input type="number" name="qty" value="<?php echo $qty; ?>">
                      </td>
                 
                 </tr>

                 <tr>
                      <td>Status</td>
                      <td>
                           <select name="status" >
                           
                             <option value="ordered">ordered</option>
                             <option value="on delivery">On delivery</option>
                           </select>
                      </td>
                 </tr>

                 <tr>
                        <td>Customer Name:</td>
                        <td>
                             <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                        </td>
                 
                 </tr>

                 <tr>
                      <td>Customer Contact:</td>
                      <td>
                           <input type="varchar" name="customer_contact" value="<?php echo $customer_contact; ?>">
                      </td>
                 </tr>

                 <tr>
                        <td>special instruction:</td>
                        <td>
                             <textarea name="instruction" cols="30" rows ="4" ><?php echo $instruction; ?></textarea>
                        </td>
                 </tr>

                 <tr>
                      <td>Customer Address:</td>
                      <td>
                           <textarea name="customer_address"  cols="30" rows="4"><?php echo $customer_address; ?></textarea>
                      </td>    
                 </tr>

                 <tr>
                        <td colspan="2">
                           <input type="hidden" name="price" value="<?php  echo $price; ?>">
                           <input type="hidden" name="id" value="<?php echo $food_id; ?>">
                           <input type="submit" name="submit" value="Update order" class="btn-secondary">
                        </td>
                 
                 </tr>
           
          </table>
      
      </form>


      <?php
             //Checking if the submit button is clicked or not
             if(isset($_POST['submit']))
             {
                 //echo "clicked";

                 //Getting details from the form

                 $price = $_POST['price'];
                 $id = $_POST['id'];
                 $qty = $_POST['qty'];

               //   $total = $price * $qty; 
                 $status = $_POST['status'];
                 $customer_name = $_POST['customer_name'];
                 $customer_contact = $_POST['customer_contact'];
                 $customer_email = $_POST['customer_email'];
                 $customer_address = $_POST['customer_address'];
                 $instruction = $_POST['instruction'];


                 //Creating sql query to enter details from the form into tbl_order database
                 $sql2 ="UPDATE  tbl_order SET
                   
                   qty= $qty,
                   total= $total,
                   status ='$status',
                   customer_name='$customer_name',
                   customer_contact='$customer_contact',
                  
                   customer_address = '$customer_address',
                   special_instruction = '$instruction'


                 WHERE id=$id
                 ";

                 //executing the query
                 $res2 = mysqli_query($conn, $sql2);

                 //checking if the food is updated or not
                 if($res2==true)
                 {
                      //Ordered updated successfully
                      $_SESSION['update']="<div class='success'>Ordered Updated successfully.</div>";

                     //Redirecting to manage-order page
                     header('location:'.SITEURL.'admin/manage-order.php');
   
                 }
                 else
                 {  
                     //failed to ordered food
                    $_SESSION['update']="<div class='error'>Failed to update order.</div>";

                    //Redirecting to manage-order page
                    header('location:'.SITEURL.'admin/manage-order.php');
   
                 }
                

             }
      ?>
   </div>
</div>

<?php include('partials/footer.php'); ?>