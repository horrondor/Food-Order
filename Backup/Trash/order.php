<?php include('partials-front/menu.php'); ?> 

<?php
      //Check whether the food id is set or not
      if(isset($_GET['food_id']))
      {
           //Get the food id and details of the selected food
           $food_id=$_GET['food_id'];

           //Get the details of the selected food
           $sql = "SELECT * FROM tbl_food WHERE id='$food_id'";

           //Execute the query
           $res = mysqli_query($conn, $sql);
           
           //Count the rows
           $count= mysqli_num_rows($res);

           //Check whether the data is available or not
           if($count==1)
           {
               //We have data
               //Get the data from the database
               $row = mysqli_fetch_assoc($res);

               $title = $row['title'];

               $price = $row['price'];

               $image_name = $row['image_name'];
           }
           else
           {   
               //Food not available
               //Redirect to Home page
               header('location:'.SITEURL);
           }
      }
     

?>

    <!--Food search section-->
<section class="food-search">
    <div class="container">
        
        <h2 class="text-center text-white">Fill this form to confirm order</h2>
           
        <form action="" method="POST"  class="order">
            <fieldset class="fieldset">

                <legend>Selected Food</legend>
                
                <div class="food-menu-image">

                <?php
                          //Check whether the image is available or not
                          if($image_name=="")
                          {
                            //Image not available
                            echo "<div class='error'>Image not available.</div>";
                          }
                          else
                          {
                              //We have image
                              ?>
                                
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">

                              <?php
                          }
                  
                ?>
                   
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>

                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price">$<?php echo $price; ?></p>

                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    
                    <div class="order-label">Quantity</div>
                    <input type="number" name="quantity" class="input-responsive" value="1" required>
                </div>

                </fieldset>


               
        </form>

        <?php   
                 //check if the submit button is clicked or not
                 if(isset($_POST['submit']))
                 {
                     //Get all the details from the form

                       $food = $_POST['food'];
                       $price = $_POST['price'];
                       $qty  = $_POST['quantity'];
                        
                          $total = $price * $qty;

                          $order_date = date("Y-m-d h:i:sa"); //Order date

                           $status = "ordered";// Ordered, On delivery, Cancelled

                           $customer_name = $_POST['full_name'];

                           $customer_contact= $_POST['number'];

                          $customer_email = $_POST['email'];

                         $customer_address = $_POST['address'];

                      //Post the data into tbl_order database
                      $sql2 = "INSERT INTO tbl_order SET
                        food ='$food',
                        price= '$price',
                        qty=  $qty,
                        total= $total,
                        order_date='$order_date',
                        status='$status',
                        customer_name='$customer_name',
                        customer_contact='$customer_contact',
                        customer_email='$customer_email',
                        customer_address= '$customer_address'
                      
                      
                      ";
                      //echo $sql2; die();

                      //Execute the query
                      $res2 = mysqli_query($conn, $sql2);

                      //Check if query is executed or not

                      if($res2==true)
                      {
                        //Query Executed and order saved
                        $_SESSION['order'] = "<div class='success text-center'>Food order successfully.</div>";
                        header('location:'.SITEURL); 
                      }
                      else
                      {
                          //Failed to save Order
                          $_SESSION['order']= "<div class='error text-center'>Failed to save order.</div>";
                          header('location:'.SITEURL); 
                      }
                         

                 }
               
        
        ?>
    </div>
  </section>
  

<?php include('partials-front/footer.php'); ?>

