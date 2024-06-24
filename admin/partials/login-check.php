<?php
       
       //Authorization-access control
       //check whether user is logged in or not
       if(!isset($_SESSION['user']))
       {
           //user not logged in
           $_SESSION['not-login']="<div class='error text-center'> Please login to access admin panel</div>";

           //Redirect
           header('location:'.SITEURL.'admin/login.php');
       }
?>