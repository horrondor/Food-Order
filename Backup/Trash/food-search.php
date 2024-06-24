<?php include('partials-front/check.php');?>



<!-- Food search section start here-->

<section class="food-search text-center">
  <div class="container">
     <?php
     
             $search = mysqli_real_escape_string($conn, $_POST['search']);

     ?>
        
          
          <h2>Foods on Your Search  <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>
 
  </div>
</section>

<!--Food-Menu section starts here-->
<section class="food-Menu">
<div class="container">


   <?php
       //Getting food menu from database 
       //SQL Query
       $sql ="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
       
       //Executing the query
       $res = mysqli_query($conn, $sql);

       //check whether food available or not
      
      $count = mysqli_num_rows($res);
      
       if($count>0)
       {
           while($row= mysqli_fetch_assoc($res))
           {
               //Getting the values
               $id =$row['id'];
               $title=$row['title'];
               $price= $row['price'];
               $description =$row['description'];
               $image_name =$row['image_name'];
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
                                    <h3> <?php $title; ?> </h3>
                                   <p class="food-price">$<?php echo $price; ?></p>
                                  
                                   <p class="food-details">
                                       <?php echo $description; ?>
                                   </p>
                                    <br>

                                 <a href="<?php echo SITEURL; ?> order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
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