<section class="home" >
      <?php
       //Getting special dish from database that are active and featured and selected active
       //SQL Query
       $sql2 ="SELECT * FROM tbl_food WHERE active='Yes' AND special='Yes' ";
       
       //Executing the query
       $res2= mysqli_query($conn, $sql2);

       //check whether food available or not
      
      $count2 = mysqli_num_rows($res2);
      ?>
       
        <div class="swiper mySwiper"> 
     
           <div class="swiper-wrapper">

       <?php if($count2>0)
       {
        while($row2 = mysqli_fetch_assoc($res2))
         {
           
               //Getting the values
               $id =$row2['id'];
               $title=$row2['title'];
               $price= $row2['price'];
               $description =$row2['description'];
               $image_name =$row2['image_name'];
               ?> 
                 <div class="swiper-slide home-slide">
      
                    <div class="content">     
                       <span>Our special dish</span>
                       <h3><?php echo $title;?> </h3>
                       <p><?php echo $description;?> </p>
                       <p class="ruppess">Rs <?php echo $price;?></p>
          
                       <a href="javascript:void(0)" class="btn btn-success p-3 rounded fs-2 fw-bold Add_to_cart">Add to cart</a>
                      
                    </div>
                     <div class="image">
                     <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>">
                     </div>
     
              </div> 
              <?php
         }
     }
     ?>                 
           </div>
           
           
        </div>
 
    <div class="swiper-pagination"></div>
  
</section>