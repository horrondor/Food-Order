<section class="category">
  <div class="container">
     <h3 class="heading text-center">Category</h3>
          <a href="<?php echo SITEURL;?>category.php"> <h2 class="text-right">View All</h2></a>
     <?php
            //Create SQL Query to Display categories from Database
            $sql ="SELECT * FROM tbl_category WHERE featured='Yes' AND active='Yes' LIMIT 3";
            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Count rows to check whether the category is available or not
             $count = mysqli_num_rows($res);
             ?>
  
       <div class="category-container">
       
            <?php
             if($count>0)
             {
                 //categories available
                while($row= mysqli_fetch_assoc($res))
                 {
                     //Get the values
                     $id=$row['id'];
                     $title=$row['title'];
                     $image_name=$row['image_name'];
                     ?>
     
                         <div class="category-box">
                           
                             <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>">
                          </div>
                          
                   
                   <?php
         }  
       }
     ?> 
        </div>
  </div>
</section>

<!-- category section ends -->


  <!-- Dishes section starts -->
       <section class="dishes">
         <h3 class="sub-heading">Our dishes</h3>
         <h1 class="heading">Popular dishes</h1>
         <?php
       //Getting food menu from database that are active and featured
       //SQL Query
       $sql3 ="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' AND popular='Yes'";
       
       //Executing the query
       $res3 = mysqli_query($conn, $sql3);

       //check whether food available or not
      
      $count3 = mysqli_num_rows($res3);
      
       ?>
        
             <div class="box-container">
          <?php 
          if($count3>0)
          {
              while($row3= mysqli_fetch_assoc($res3))
              {
                  //Getting the values
                  $id =$row3['id'];
                  $title=$row3['title'];
                  $price= $row3['price'];
                  $description =$row3['description'];
                  $image_name =$row3['image_name'];
                  ?>
               <div class="box">
                   <!-- <a href="#" class="fas fa-heart"></a> -->
                   <a href="#" class="fas fa-eye"></a>
                   <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>">
                   <h3><?php echo $title; ?></h3>
                     <div class="stars">
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star-half-alt"></i>
                     </div>
                     <span>Rs <?php echo $price; ?></span><br>
                     <a href="<?php echo SITEURL; ?>cart.php?food_id=<?php echo $id; ?>" class="btn">Add to cart <i class="fas fa-shopping-cart"></i></a>
               
               </div>
               <?php
              }
              }
              ?>
            </div>
 
        </section>
 <!-- Dishes section Ends -->

 <!-- About section starts -->
     <section class="about">
        <h3 class="sub-heading">about us</h3>
        <h1 class="heading">why choose us? </h1>

        <div class="row">
          <div class="image">
              <img src="images/about-img.jpg" >
          </div>

          <div class="content">
              <h3>best in the country</h3>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus provident aut ratione autem, consequuntur veniam amet repellendus reprehenderit earum esse voluptas tempore quo doloribus consectetur labore unde numquam laudantium animi.</p>
                
              <div class="icons-container">
                  <div class="icons">
                     <i class="fas fa-shipping-fast"></i>
                     <span>free delivery</span>
                   </div>  
                   <div class="icons">
                     <i class="fas fa-dollar-sign"></i>
                     <span>easy payment</span>
                   </div>
                     <div class="icons">
                       <i class="fas fa-headset"></i>
                        <span>24/7 service</span>
                     </div>
                </div>
                 <!-- <a href="#" class="btn">learn more</a> -->
          </div>
        </div>
     </section>
 <!-- About section ends -->


<!-- Menu section Starts -->
    <section class="menu">
      <h3 class="sub-heading"> our menu </h3>
      <h1 class="heading"> today's speciality </h1>
      <?php
       //Getting food menu from database that are active and featured
       //SQL Query
       $sql4 ="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' AND trending='Yes'";
       
       //Executing the query
       $res4 = mysqli_query($conn, $sql4);

       //check whether food available or not
      
      $count4 = mysqli_num_rows($res4);     
       ?> 
         <div class="menu-box-container">         
         <?php 
          if($count4>0)
          {
              while($row4= mysqli_fetch_assoc($res4))
              {
                  //Getting the values
                  $id =$row4['id'];
                  $title=$row4['title'];
                  $price= $row4['price'];
                  $description =$row4['description'];
                  $image_name =$row4['image_name'];
                  ?>     
             <div class="menu-box">
                 <div class="menu-image">
                 <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>">
                    <!-- <i class="menu-fas fa-heart"></i> -->
                 </div> 
                  <div class="menu-content">
                    <div class="menu-stars">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3><?php echo  $title; ?></h3>
                    <p><?php echo $description; ?></p>
                    <span>Rs <?php echo $price; ?></span><br>
                    <a href="<?php echo SITEURL; ?>cart.php?food_id=<?php echo $id; ?>" class="btn">add to cart <i class="fas fa-shopping-cart"></i></a>                   
                  </div> 
                   
             </div>
           
           <?php
              }
            }
           ?>
                  
         </div>
    </section>

<!-- Menu section Ends -->