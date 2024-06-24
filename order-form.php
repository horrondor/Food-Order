<?php require_once('partials-front/menu.php');?>
<!-- order section starts  -->
<html>

    <body>
   
<section class="order">

    <h3 class="sub-heading"> order now </h3>
    <h1 class="heading"> free and fast </h1>

    <form  method="POST">

        <!-- <div class="inputBox"> -->
            <div class="input">
                <span>full Name: </span>
                <input type="text" name="fullname" placeholder="Enter your name">
            </div>  
            <div class="input">
                <span>Contact number:</span>
                <input type="number" name="contact" placeholder="enter your number">
            </div>
        <!-- </div> -->
        <!-- <div class="inputBox"> -->
            <!-- <div class="input">
                <span>DELIVERY DATE AND TIME</span>
                <input type="text" name="deliverydate" placeholder="Enter delivery date and time">
            </div> -->
            <div class="payment">
                <span>PAYMENT OPTION:</span>
                <br>
                <input type="radio" name="cash" value="cash"> Cash on Delivery<br>
                <!-- <input type="radio" name="khalti" value="khalti"> <button>Khalti</button> -->
                <!-- <input type="test" placeholder="extra with food"> -->
            </div>
        </div>
     
            <div class="input">
                <span>Delivery address</span>
                <textarea name="address" placeholder="enter your address"  cols="10" rows="10"></textarea>
            </div>
            <div class="input">
                <span>Special instruction: </span>
                <textarea name="instruction" placeholder="enter your message"  cols="10" rows="10"></textarea>
            </div>
        <!-- </div> -->

        <input type="submit" name="submit" value="order now" class="btn">

    </form>

    <?php
         if(isset($_POST['submit']))
         {
            $order_date = date("Y-m-d h:i:sa"); //Order date
            $username = $_POST['fullname'];
            $contact = $_POST['contact'];
           $address = $_POST['address'];
           $instruction = $_POST['instruction'];
              
           if(isset($_POST['cash']))
           {
               $payment=$_POST['cash'];
           }
           else{
               $payment=$_POST['khalti'];
           }

            //SQL query to insert data into tbl_order
            $sql = "INSERT INTO tbl_order SET
              order_date='$order_date',
             customer_name='$username',
             customer_contact='$contact',
             customer_address = '$address',
             special_instruction = '$instruction'
        ";
           //Executing the query
            $res = mysqli_query($conn,$sql);
            if($res==true)
           {
               ?>
               <script>alert("Order successfull.")</script>
               <script>window.location.href='index.php'</script>
               <?php  
                //   header('location:'.SITEURL.'index.php');
                  
                  
                
            }
            else{
               // ?>
                <script>window.location.href='index.php'</script>
               <script>alert("Order not successfull.")</script> -->
               <?php
            }
          } 
    ?>

</section>

</body>
</html>
<!-- order section ends -->
