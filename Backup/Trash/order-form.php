<?php include('partials-front/check.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<body>
  

 <section class="food-search">
      <div class="container">   
         <h2 class="text-center text-white">Fill this form to confirm order</h2>  
            <form action="" method="POST" class="order">
                   <fieldset class="fieldset">
                           <legend>Delivery Details</legend>
                               <div class="order-label">Full Name</div>
                                   <input type="text" name="full_name" placeholder="Enter your name" class="input-responsive" required>                   
                                       <div class="order-label">Phone number</div>
                                           <input type="tel" name="number" placeholder="Eg.980xxxxxxx" class="input-responsive" required>                    
                                        <div class="order-label">Email</div>
                                     <input type="email" name="email" placeholder="Eg." class="input-responsive" required>                   
                                <div class="order-label">Address</div>
                                 <textarea name="address" rows="5" placeholder="Eg. Street, City, Country" class="input-responsive" required></textarea>
                                  
                                 <button id="payment-button">Pay with Khalti</button>
                                 
                                 
                                 
                                 
                                 
                                 <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary"> 
                    </fieldset>             
            </form>  
        </div>
 </section>


 
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






 <?php
      //check if the submit button is clicked or not
      if(isset($_POST['order']))
      {

            //Get the details from the form
            $food_name = $_POST['food_name'];
            $food_price = $_POST['food_price'];
            $food_qty = $_POST['food_qty'];
            $total= $_POST['total'];
            $special_instruction= $_POST['special_instruct'];


            //Enter data into tbl_order
            $sql2 ="INSERT INTO tbl_order SET
               food = '$food_name',
               price = '$food_price',
               qty='$food_qty',
               total='$total',
               order_date='$order_date',
                 ";
               
             //Execute the  query
             $res2 = mysqli_query($conn,$sql2);

             
            
      }    
      ?>

<script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_dc74e0fd57cb46cd93832aee0a390234",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>
</body>
</html>