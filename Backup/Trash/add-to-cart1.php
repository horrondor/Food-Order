<!-- <?php //require_once('partials-front/check.php');?> -->
 <?php include_once('config/constants.php');?>
 <link rel="stylesheet" href="css/modal.css">

<?php
     if(!isset($_SESSION['user']))
     {
         header('location:'.SITEURL.'login.php');
         $_SESSION['login']="<div class='error text-center'>Please login to access my cart.</div>";
     }
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
   <title>Document</title>
</head>
<body>
   <div class="main-content">

   <div class="wrapper">
       <div class="modal-bg">
           <div class="modal">

   <?php 
   
     //Checking if the id is set or not
      if(isset($_GET['id']))
      {
          //echo "clicked";

          //storing the id from the url in variable id
          $id = $_GET['id'];

          //Getting the details of the food from tbl_food
          //SQL query to get data
          $sql = "SELECT * FROM tbl_food WHERE id=$id";

          //Executing the query
          $res = mysqli_query($conn, $sql);
          
          //counting rows to check data
          $count = mysqli_num_rows($res);

          if($count==1)
          {
              //data is available
              $row = mysqli_fetch_assoc($res);

                $food_name = $row['title'] ;
                $food_price = $row['price'];
                $food_desc = $row['description'];
                


          }
          else
          {
              //Data is not available
          }

      }

   ?>

         <form action="" method="POST">
            
            <table class="tbl-30">
                <tr>
                     <td>Food name:</td>
                     <input type="hidden" name="food_name" value="<?php echo $food_name; ?>">
                     <td><b><?php echo $food_name; ?></b></td>
                
                </tr>

                <tr>
                     <td>food price</td>
                     <input type="hidden" name="food_price" value="<?php echo $food_price; ?>">
                     <td><b>$<?php echo $food_price; ?></b></td>
                </tr>

                <tr>
                     <td>
                          <?php echo $food_desc;?>
                         <input type="hidden" name="food_desc" value=" <?php echo $food_desc;?>">
                     </td>
                </tr>

                <tr>
                      <td>food quantity</td>
                      
                      <td>
                           <input type="number" name="qty" id="qty" value="1"> 
                      </td>
                
                </tr>


                
                <tr>
                    <td>Special instructions</td>
                    <td>
                          <textarea name="special_instruction"  cols="28" rows="3"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Total</td>
                    <td>
                         <?php echo $total=  $food_price; ?>
                    </td>
                    
                            
                    
                </tr>

                <tr>
                      <td colspan="2">
                         
                             <input type="submit" name="submit" value="Add to Bag">
                         
                       
                       
                         <input type="hidden" name="food_id" value="<?php echo $id; ?>">

                      </td>
                </tr>

                <span class="modal-close">X</span>
            
            </table>
           
         </form>


         <?php
              
              //check if the submit button is clicked or not
              if(isset($_POST['submit']))
              {
                  //echo"clicked";
                  //Get details from the form 

                  $id = $_POST['food_id'];
                  $food_desc = $_POST['food_desc'];
                  $food_name = $_POST['food_name'];
                  $food_price = $_POST['food_price'];
                  $food_qty = $_POST['qty'];
                  $total = $food_price * $food_qty;
                  $special_instruction = $_POST['special_instruction'];

                  //SQL QUERY to add details into the tbl_cart
                  $sql2 = "INSERT INTO tbl_cart SET 
                   
                   title = '$food_name',
                   price = '$food_price',
                   qty ='$food_qty',
                   total = '$total',
                   special_instruction ='$special_instruction',
                   food_desc = '$food_desc'

                     
                  ";

                  //Execute the query
                  $res2 = mysqli_query($conn, $sql2);
                 // echo $sql2; die();

                  if($res==true)
                  {
                      //redirecting to my_bag
                      header('location:'.SITEURL.'my-bag.php');
                  }
                  else
                  {
                      //redirect to add-to-cart
                      echo "<div>Failed to add data to my bag.</div>".
                      header('location:'.SITEURL.'add-to-cart.php');
                  }

                 
              }
              

         ?>
         </div>
     </div>
   </div>
 </div>
 <script src="m.js"></script>
</body>
</html>
