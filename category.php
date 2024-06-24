<?php require_once('partials-front/menu.php');?>

  <section class="categoryfull">
        <h3 class="Msub-heading">Category</h3>
        <?php
            //Create SQL Query to Display categories from Database
            $sql ="SELECT * FROM tbl_category WHERE featured='Yes' AND active='Yes'";
            //Execute the query
            $statement = $conn->prepare($sql);
            if($statement->execute())
            $res = $statement->fetchAll();

            //Count rows to check whether the category is available or not
            $count = count($res);
             ?>
             <div class="mid-cat-container">
              <?php
             if($count>0)
             {
                 //categories available
                 foreach($res as $row)
                 {
                     //Get the values
                     $id=$row['id'];
                     $title=$row['title'];
                     $image_name=$row['image_name'];
                     ?>
        
                <div class="category-image">
                   <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>">
                </div>
         <?php
      }  
    }
    ?> 
     </div>
  
  </section>

<?php require_once('partials-front/footer.php');?>
    
