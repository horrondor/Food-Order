<?php include('partials-front/check.php');?>


<!--categories section-->

<section class="Categories">
<div class="container">
    <h1 class="text-center">Explore foods</h1>


     <?php
            //Create SQL Query to Display categories from Database
            $sql ="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes'";
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
                                     <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>"class="img-responsive img-curve">
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
    



    <?php include('partials-front/footer.php'); ?>    