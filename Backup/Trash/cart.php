<?php require_once('partials-front/menu.php'); ?>

<?php
      //Check whether the food id is set or not
      if(isset($_GET['food_id']))
      {
           //Get the food id and details of the selected food
           $food_id=$_GET['food_id'];

           //Get the details of the selected food
           $sql = "SELECT * FROM tbl_food WHERE id='$food_id'";

           //Execute the query
           $res = mysqli_query($conn, $sql);
           
           //Count the rows
           $count= mysqli_num_rows($res);

           //Check whether the data is available or not
           if($count==1)
           {
               //We have data
               //Get the data from the database
               $row = mysqli_fetch_assoc($res);

               $title = $row['title'];

               $price = $row['price'];
               $description= $row['description'];

               $image_name = $row['image_name'];

               
               //Executing the query
               $res = mysqli_query ($conn, $sql);
           }
           else{
             ?>
             <script>alert('Empty cart')</script>

             <?php
           }
           //sql query to insert data into tbl_cart
           $sql3="INSERT INTO tbl_cart SET
            title='$title',
            price='$price',
            food_desc = '$description',
            image_name = '$image_name'
           ";
           $res3 = mysqli_query($conn,$sql3);

          }
             ?>


 <body>
  
<form id="cart" method="POST">
<!-- cart section starts -->
<?php 
     //Create sql query to fetch data from the tbl_cart database
     $sql2 = "SELECT * FROM tbl_cart ";

     //Execute the query
     $res2 = mysqli_query($conn, $sql2);
     
     //Counting the rows
     $count2 = mysqli_num_rows($res2);
        
           ?>

      <div class="cart">
          <div class="cart-container">

              <div class="cart-header">
                  <h3 class="cart-heading">Cart</h3>
                 <a href="#"><h5 class="action">Remove all</h5></a> 
              </div>
                <?php 
                
                   if($count2>0)
                    {
                     while($row2 = mysqli_fetch_assoc($res2))
                   {
                     $food_id = $row2['id'];
                     $food_name = $row2['title'];
                     $food_price = $row2['price'];
                     $food_description = $row2['food_desc'];
                     $image_name = $row2['image_name'];
                            
                ?>
                <div class="cart-items">
                    <div class="cart-image">
                     <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"> 
                    </div>
                       <div class="cart-about">                        
                            <h1 class="cart-title"><?php echo $food_name;?></h1>
                        
                                                                                                 
                       </div>
                       
                        <div class="cart-qty">                              
                          <input type="number" name="qty" min='1'> 

                        </div>
                            <div class="cart-prices">
                              <div class="cart-amount">
                                Rs <?php echo $food_price; ?>
                                <input type="hidden" name="price" value="<?php echo $food_price; ?>">
                                
                              </div>     

                            <a href="#"> <div class="cart-remove"><u>Remove</u></div></a> 
                            </div>
                </div>
                   <?php
                   }
                  }
                   ?>
 </form>
 
                <hr> 
                <div class="cart-checkout">
                <div class="cart-total">
                  <span>Total:</span>
                   
                <div>
                  <div class="shipping">
                   <span>Shipping: Free</span> 
                  </div>
                <div class="cart-Subtotal">
                  <span>Grand-Total:</span>
                  
                </div>
               
                </div>
                
                </div>
                <a href="<?php echo SITEURL;?>order-form.php"><button class="checkout-button">Checkout</button></a>
                </div>
          </div>         
      </div>
     

</body>
<script src="script.js"></script>
</html>