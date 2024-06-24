<?php     
     include('../config/constants.php');
    
     //1. Destroy the Session
     session_destroy();

     //2.redirect
     header('location:'.SITEURL.'admin/login.php');


?>