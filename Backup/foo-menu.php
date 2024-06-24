<?php require_once('partials-front/menu.php'); ?>




<body>
    

<!-- Menu section Starts -->
<section class="menu Mmenu">
    <h3 class="Msub-heading "> our menu </h3>
      <?php
       //Getting food menu from database that are active and featured
       //SQL Query
       $sql4 ="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes'";
       
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
       </div>
  </section>

<!-- Menu section Ends -->
</body>
</html>