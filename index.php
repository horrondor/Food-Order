<?php require_once('partials-front/menu.php'); ?>



</div>
<body>   
   <!-- search form starts-->

     <!-- <form action="" id="search-form">
          <input type="search" placeholder="search here..." name="" id="search-box" >
          <label for="search-box" class="fas fa-search"></label>
          <i class="fas fa-times" id="close"></i>
     </form> -->
  <!-- search form  ends-->  

  
<!-- special dish section starts-->
 <section class="home " >
      <?php
       //Getting special dish from database that are active and featured and selected active
       //SQL Query
       $sql2 ="SELECT * FROM tbl_food WHERE active='Yes' AND special='Yes' ";
       
       //Executing the query
       $statement2 = $conn ->prepare($sql2);

      ?>
       
        <div class="swiper mySwiper"> 
     
           <div class="swiper-wrapper">

       <?php 
       if($statement2->execute())
       {
        $res2 = $statement2->fetchAll();
        $output2 ='';
          foreach($res2 as $row2)
         {               
              $output2 .='
                 <div class="swiper-slide home-slide">
      
                    <div class="content">     
                       <span>Our special dish</span>
                       <h3>'.$row2["title"].'</h3>
                       <p>'.$row2["description"].' </p>
                       <p class="rupess">Rs '.$row2["price"].'</p>
                      

                       <input type="button" id='.$row2["id"].' class="btn  p-3 rounded fs-2 fw-bold Add_to_cart" value="Add to cart">
                        <input type="hidden" name="hidden_title" id="title'.$row2["id"].'" value="'.$row2["title"].'">
                        <input type="hidden" name="hidden_price" id="price'.$row2["id"].'" value="'.$row2["price"].'">
                    </div>
                     <div class="image mt-5">
                     <img src="images/food/'.$row2["image_name"].'">
                     </div>
                          
                 </div> 
                 ';
         }
         echo $output2;
     }
     ?>                
           </div>
           <div class="swiper-pagination"></div>   
           
        </div>
 
  
  
 </section>
<!-- home section ends-->

<!-- Category section starts  -->
 <!-- <section class="category">
  <div class="container">
     <h3 class="heading text-center">Category</h3>
          <a href="<?php echo SITEURL;?>category.php"> <h2 class="text-right">View All</h2></a>
     <?php
        
            $sql ="SELECT * FROM tbl_category WHERE featured='Yes' AND active='Yes' LIMIT 3";
           
      
            $statement = $conn->prepare($sql);
            if($statement->execute())
            {

            
            $res = $statement->fetchAll();
             $count = count($res);

             ?>
  
           <div class="category-container">
       
            <?php
            
             if($count>0)
             {
                
               
               $output1 ='';
               foreach($res as $row)
                 {
                  
                  
                     $id=$row["id"];
                     $title=$row["title"];
                      
                     //  ';
                      $image_name=$row["image_name"];
                     
                     ?>
     
                         <div class="category-box">
                           
                             <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>">
                          </div>
                          
                   
                   <?php
                  }   
                 
                   
               }
         }  
       
     ?> 
        </div>
  </div>
 </section> -->
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
             $statement3 = $conn->prepare($sql3);
             if($statement3->execute())
             {  
                $res3 = $statement3->fetchAll();
                $output3 ='';
                //check whether food available or not
                $count3 = count($res3);
          ?> 
               <div class="box-container">
                <?php 
                if($count3>0)
                {
                 foreach($res3 as $row3)
                
                 {
                  $output3 .='
                   <div class="box">                 
                    <a href="#" class="fas fa-eye"></a>
                    <img src="images/food/'.$row3["image_name"].'">
                    <h3>'.$row3["title"].'</h3>
                     <div class="stars">
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star-half-alt"></i>
                     </div>
                     <span>Rs'.$row3["price"].'</span><br>
                      <input type="button" id='.$row3["id"].' class="btn  p-3 rounded fs-2 fw-bold Add_to_cart" value="Add to cart">
                      <input type="hidden" name="hidden_title" id="title'.$row3["id"].'" value="'.$row3["title"].'">
                      <input type="hidden" name="hidden_price" id="price'.$row3["id"].'" value="'.$row3["price"].'">
                   </div>
                   ';
                   }
                   echo $output3;
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

<!--special dish section  starts -->

<!-- Menu section Starts -->
<section class="menu">
      <h3 class="sub-heading"> our menu </h3>
      <h1 class="heading"> today's speciality </h1>
      <?php
       //Getting food menu from database that are active and featured
       //SQL Query
       $sql4 ="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' AND trending='Yes'";
       
       //preparing the query
       $statement4 = $conn->prepare($sql4);
       //Executing the query
       if($statement4->execute())
       {
         $res4 = $statement4->fetchAll();
         $output4 ='';

          //check whether food available or not
      
            //  $count4 = mysqli_num_rows($res4);  
            $count4 = count($res4);   
        ?> 
         <div class="menu-box-container">         
          <?php 
          if($count4>0)
          {
            foreach($res4 as $row4)
              {
               $output4 .='
                <div class="menu-box">
                 <div class="menu-image">
                 <img src="images/food/'.$row4["image_name"].'">
    
                 </div> 
                  <div class="menu-content">
                    <div class="menu-stars">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>'.$row4["title"].' </h3>
                    <p>'.$row4["description"].' </p>
                    <span>Rs '.$row4["price"].'</span><br>
                    <input type="button" id='.$row4["id"].' class="btn  p-3 rounded fs-2 fw-bold Add_to_cart" value="Add to cart">
                    <input type="hidden" name="hidden_title" id="title'.$row4["id"].'" value="'.$row4["title"].'">
                    <input type="hidden" name="hidden_price" id="price'.$row4["id"].'" value="'.$row4["price"].'">
                  </div> 
                   
                </div>
            
                ';
               }
          }
          echo $output4;
   
        
     
       }
       ?>
    </section>

<!-- Menu section Ends -->
<?php require_once('partials-front/review.php');?>
<?php require_once('partials-front/footer.php');?>
