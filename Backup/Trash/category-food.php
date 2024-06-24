<?php include('partials-front/check.php');?>


<?php
      if(isset($_GET['category_id']))
      {
          //Category id is set and get the id
          $category_id= $_GET['category_id'];
          
          //Get the category title based on category id
          $sql = "SELECT title FROM tbl_category WHERE id='$category_id'";

          //Executing the query
          $res = mysqli_query($conn, $sql);

          //Get the value from the database
          $row = mysqli_fetch_assoc($res);

          $category_title= $row['title'];

      }
      else
      {
          //category not passed
          //Redirect to home page
          header('location:'.SITEURL);
      }
?>

<!-- Food search section start here-->

<section class="food-search text-center">
  <div class="container">
     
        
          
          <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>
 
  </div>
</section>

<!--Food-Menu section starts here-->
<section class="food-Menu">
<div class="container">


   <?php
       //Getting food menu from database 
       //SQL Query
       $sql2 ="SELECT * FROM tbl_food WHERE category_id = $category_id";
       
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
                                    <h3> <?php $title; ?> </h3>
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