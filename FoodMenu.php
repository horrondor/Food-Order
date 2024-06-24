<?php require_once('partials-front/menu.php'); ?>




<body>
    <!-- Menu section Starts -->
<section class="menu Mmenu mt-4">
      <h3 class="Msub-heading"> our menu </h3>
   
      <?php
       //Getting food menu from database that are active and featured
       //SQL Query
       $sql4 ="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' AND trending='Yes'";
       
       //preparing the query
       $statement4 = $conn->prepare($sql4);
       //Executing the query
       if($statement4->execute()){
         $res4 = $statement4->fetchAll();

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
                    <?php
                    $output8='';
                    $output8 .='
                    <input type="button" id='.$row4["id"].' class="btn  p-3 rounded fs-2 fw-bold Add_to_cart" value="Add to cart">
                        <input type="hidden" name="hidden_title" id="title'.$row4["id"].'" value="'.$row4["title"].'">
                        <input type="hidden" name="hidden_price" id="price'.$row4["id"].'" value="'.$row4["price"].'">
                        ';
                        echo $output8;
                        ?>

                  </div> 
                   
                </div>
            
                <?php
               }
          }
           ?>
                  
         </div>
       <?php
       }
       ?>
    </section>

<!-- Menu section Ends -->
<?php require_once('partials-front/footer.php');?>
</body>
</html>