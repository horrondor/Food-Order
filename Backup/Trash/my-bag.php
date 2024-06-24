<?php include('partials-front/check.php');?>


<?php 
     //Create sql query to fetch data from the tbl_cart database
     $sql = "SELECT * FROM tbl_cart ";

     //Execute the query
     $res = mysqli_query($conn, $sql);
     
     //Counting the rows
     $count = mysqli_num_rows($res);

     if($count>0)
     {
         while($row = mysqli_fetch_assoc($res))
         {
             $food_id = $row['id'];
             $food_name = $row['title'];
             $food_price = $row['price'];
             $food_qty = $row['qty'];
           
        
           ?>

           
                  <form action="" method="POST">
                        <table>
                             <tr>
                                 <td>
                                      <?php echo $food_name; ?>
                                      <input type="hidden" name="food_name" value="<?php echo $food_name; ?>">
                                 </td>
                            </tr>

                            <tr>
                                 <td>
                                     <?php echo $food_price; ?>
                                     <input type="hidden" name="food_price" value="<?php echo $food_price; ?>">
                                 </td>
                            </tr>

                            <tr>
                                 <td>
                                     <?php echo $food_qty;?>
                                     <input type="hidden" name="food_qty" value="<?php echo $food_qty;?>">

                                 </td>
                            </tr>

                            <tr>
                                   <td colspan="2">
                                             
                                                   
                                                   <a href="<?php echo SITEURL;?>remove-mybag-cart.php?id=<?php echo $food_id;?>">
                                                       <input type="button" name="remove" value="Remove">
                                                   </a>   
                                                  
                                                  <a href="<?php echo SITEURL?>order-form.php">
                                                       <input type="button" name="checkout" value="Checkout">
                                                  </a>
                                                    
                                                                  

                                   </td>

                            </tr>
                       </table>

 
                  </form>

              <?php
         }
     }
     else 
     {
            //Data not available in tbl_cart

     }
?>

<form action="">
    <table>
            <tr>
                 <td>
                       
                 </td>
            </tr>
    </table>

 
</form>