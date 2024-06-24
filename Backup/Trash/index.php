<?php require_once('partials-front/check.php');?>


<body>
<!--search section-->
<section class="food-search text-center">
  <div class="container">

      <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
          <input type="search" name="search" placeholder="search for foods" >
          <input type="submit" name="submit" value="search" class="btn btn-primary">
      </form>
  </div>
</section>


<?php
      if(isset($_SESSION['order']))
      {
          echo $_SESSION['order'];
          unset($_SESSION['order']);
      }

?>


<!--categories section-->

<section class="Categories">
<div class="container">
    <h1 class="text-center">Explore foods</h1>


     <?php
            //Create SQL Query to Display categories from Database
            $sql ="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Count rows to check whether the category is available or not
             $count = mysqli_num_rows($res);

             if($count>0)
             {
                 //categories availabe
                 while($row= mysqli_fetch_assoc($res))
                 {
                     //Get the values
                     $id=$row['id'];
                     $title=$row['title'];
                     $image_name=$row['image_name'];
                     ?>
                 
                    <a href="<?php echo SITEURL;?>category-food.php?category_id=<?php echo $id;?>">
                       <div class="box float-container">
                           <?php
                              //Check whether Image is available or not
                              if($image_name=="")
                              {
                                  //Display message
                                  echo "<div class='error'>Image not available</div>";
                              }
                              else
                              {
                                  //image Available
                                  ?>
                                     <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"class="img-responsive img-curve">
                                  <?php
                              }
                           ?>
                        
                             <h2 class="float-text text-white"><?php echo $title; ?></h2>
                        </div>
                     </a>
                     
                     <?php
                 }
             }
             else
             {
                  //CAtegories not available
                  echo "<div class='error'> Categories not Added.</div>";
             }
     
     ?>
     
    
    <div class="clearfix"></div>
</div>
</section>

<!--menu section-->
<section class="food-Menu">
 <div class="container"> 
   <h1 class="text-center">Food menu</h1>

   <form action="" method="POST">
      

   <?php
       //Getting food menu from database that are active and featured
       //SQL Query
       $sql2 ="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
       
       //Executing the query
       $res2= mysqli_query($conn, $sql2);

       //check whether food available or not
      
      $count2 = mysqli_num_rows($res2);
      
       if($count2>0)
       {
           while($row2= mysqli_fetch_assoc($res2))
           {
               //Getting the values
               $food_id =$row2['id'];
               $title=$row2['title'];
               $price= $row2['price'];
               $description =$row2['description'];
               $image_name =$row2['image_name'];
               ?>
                    <div class="food-menu-box">
                           <div class="food-menu-image">
                             
                             
                                 <?php
                                    //Check whether image available or not
                                     if($image_name=="")
                                     {
                                        //Image not available
                                        echo "<div class='error'>Image not available.</div>";
                                      }
                                      else
                                     { 
                                         //Image available
                                         ?>
                                     
                                             <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"  class="img-responsive img-curve">

                                          <?php
                                      }
                             
                                  ?>

                            </div>
                             
                                <div class="food-menu-desc">
                                    <h3> <?php echo $title; ?> </h3>
                                   <p class="food-price">$<?php echo $price; ?></p>
                                  
                                   <p class="food-details">
                                       <?php echo $description; ?>
                                   </p>
                                    <br>

                                   <!-- <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn  btn-primary">Order Now</a> -->
                               
                                    

                                               
                                         <input type="hidden" name="id" value="<?php echo $fod_id;?>">
                                          <input type="submit" name="cart" value="Add to cart" class="modal-btn btn btn-primary">
                                    
                                     
                                     
                               </div> 
                             
                             
                     </div>        
     

               <?php
           }
       }
       else
       {
           //Food not available
           echo "<div class=''error'>Food not available.</div>";
       }

   ?>
       
        <div class="clearfix"></div>

</div>

      <p class="text-center">
           <a href="<?php echo SITEURL; ?>food-Menu.php">See All Foods</a>
      </p>
</section>
</form> 

<section class="addtocart">

  <?php
          if(!isset($_SESSION['user']))
          {
              header('location:'.SITEURL.'login.php');
              $_SESSION['login']="<div class='error text-center'>Please login to access my cart.</div>";
          }
          
   ?>

  
       <div class="modal-bg">
           <div class="modal">

   <?php 
   
     //Checking if the add to cart is clicked or not
      if(isset($_POST['cart']))
      {
          //echo "clicked";

          //storing the id from form
           $id = $_POST['id'];

          //Getting the details of the food from tbl_food
          //SQL query to get data
          $sql5 = "SELECT * FROM tbl_food WHERE id=$id";

          //Executing the query
          $res5 = mysqli_query($conn, $sql5);
          
          //counting rows to check data
          $count5 = mysqli_num_rows($res5);

          if($count5==1)
          {
              //data is available
              $row5 = mysqli_fetch_assoc($res5);

                $food_name = $row5['title'] ;
                $food_price = $row5['price'];
                $food_desc = $row5['description'];
                


          }
          else
          {
              //Data is not available
          }

      }

   ?>

         <form action="" method="POST">
            
            <table class="tbl-30">
                <tr>
                     <td>Food name:</td>
                     <input type="hidden" name="food_name" value="<?php echo $food_name; ?>">
                     <td><b><?php echo $food_name; ?></b></td>
                
                </tr>

                <tr>
                     <td>food price</td>
                     <input type="hidden" name="food_price" value="<?php echo $food_price; ?>">
                     <td><b>$<?php echo $food_price; ?></b></td>
                </tr>

                <tr>
                     <td>
                          <?php echo $food_desc;?>
                         <input type="hidden" name="food_desc" value=" <?php echo $food_desc;?>">
                     </td>
                </tr>

                <tr>
                      <td>food quantity</td>
                      
                      <td>
                           <input type="number" name="qty" id="qty" value="1"> 
                      </td>
                
                </tr>


                
                <tr>
                    <td>Special instructions</td>
                    <td>
                          <textarea name="special_instruction"  cols="28" rows="3"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Total</td>
                    <td>
                         <?php echo $total=  $food_price; ?>
                    </td>
                    
                            
                    
                </tr>

                <tr>
                      <td colspan="2">
                         
                             <input type="submit" name="submit" value="Add to Bag">
                         
                       
                       
                         <input type="hidden" name="food_id" value="<?php echo $id; ?>">

                      </td>
                </tr>

                <span class="modal-close">X</span>
            
            </table>
           
         </form>


         <?php
              
              //check if the submit button is clicked or not
              if(isset($_POST['submit']))
              {
                  //echo"clicked";
                  //Get details from the form 

                  $id = $_POST['food_id'];
                  $food_desc = $_POST['food_desc'];
                  $food_name = $_POST['food_name'];
                  $food_price = $_POST['food_price'];
                  $food_qty = $_POST['qty'];
                  $total = $food_price * $food_qty;
                  $special_instruction = $_POST['special_instruction'];

                  //SQL QUERY to add details into the tbl_cart
                  $sql6 = "INSERT INTO tbl_cart SET 
                   
                   title = '$food_name',
                   price = '$food_price',
                   qty ='$food_qty',
                   total = '$total',
                   special_instruction ='$special_instruction',
                   food_desc = '$food_desc'

                     
                  ";

                  //Execute the query
                  $res6 = mysqli_query($conn, $sql6);
                 // echo $sql2; die();

                  if($res6==true)
                  {
                      //redirecting to my_bag
                      header('location:'.SITEURL.'my-bag.php');
                  }
                  else
                  {
                      //redirect to add-to-cart
                      echo "<div>Failed to add data to my bag.</div>".
                      header('location:'.SITEURL.'add-to-cart.php');
                  }                
              }
              

         ?>
         </div>
     </div>
   </div>
 </div>
</section>
<script src="m.js"></script>




















   


