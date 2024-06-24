<?php include('partials-front/check.php');?>



<!--search section-->
<section class="food-search text-center">
  <div class="container">
  
      <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
          <input type="search" name="search" placeholder="search for foods" >
          <input type="submit" name="submit" value="search" class="btn btn-primary">
      </form>
  </div>
</section>




<!--menu section-->
<section class="food-Menu">
<div class="container">
   <h1 class="text-center">Food menu</h1>

   <?php
       //Getting food menu from database that are active and featured
       //SQL Query
       $sql2 ="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes'";
       
       //Executing the query
       $res2 = mysqli_query($conn, $sql2);

       //check whether food available or not
      
      $count2 = mysqli_num_rows($res2);
      
       if($count2>0)
       {
           while($row2= mysqli_fetch_assoc($res2))
           {
               //Getting the values
               $id =$row2['id'];
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

                                 <!-- <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a> -->
                                 <a  href="<?php echo SITEURL;?>add-to-cart.php?id=<?php echo $id; ?>" class="btn  btn-primary">Add to cart</a>
                                </div>   
                     </div>        
     

               <?php
           }
       }
       else
       {
           //Food not available
           echo "<div class='error'>Food not available.</div>";
       }

   ?>

         
     
      

        <div class="clearfix"></div>


</div>

    
</section>
    
<?php include('partials-front/footer.php'); ?>