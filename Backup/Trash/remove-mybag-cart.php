<?php  include('config/constants.php'); ?>


<?php
     if(isset($_GET['id']))
     {
         $id= $_GET['id'];

         //SQL Query to remove data from my bag
         $sql = "DELETE FROM tbl_cart WHERE id=$id";

         //Executing the query
         $res = mysqli_query ($conn, $sql);

         if($res==true)
         {
             //successfully deleted
             //Redirect
             header('location:'.SITEURL.'my-bag.php');
         }
         else 
         {
             
              //Failed to delete
              //Session message
              $_SESSION['error']="<div class='error'>Failed to remove from my cart.</div>";
              header('location:'.SITEURL.'my-bag.php');
             
         }
     }

?>