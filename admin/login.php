<?php include('../config/conswtants2.php'); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
        <div class="login">
             <h1 class="text-center">login</h1>
               
             <?php
                   if(isset($_SESSION['login']))
                   {
                       echo $_SESSION['login'];
                       unset($_SESSION['login']);
                   } 
              
                   if(isset($_SESSION['not-login']))
                   {
                       echo  $_SESSION['not-login'];
                       unset( $_SESSION['not-login']);
                   }
              ?>



             <form action="" method="POST"class="text-center">
                   <label>Username:</label><br>
                   <input type="text" name="username" placeholder="Enter your username."><br><br>

                   <label>Password:</label><br>
                   <input type="password" name="password" placeholder="Enter your password"><br><br>

                    <input type="submit" name="submit" placeholder="Login" class="btn-primary">            
            
             </form>   
        </div>
</body>
</html>

<?php
       if(isset($_POST['submit']))
       {
           //process for login
           // get data from form

           $username = mysqli_real_escape_string($conn,$_POST['username']);
           
           $raw_password= md5($_POST['password']);
           $password= mysqli_real_escape_string($conn,md5($_POST['password']));
           $password= mysqli_real_escape_string($conn,$_POST['password']);
      

       
           // whether the username and password exist or not
           $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
           
           //executing the query
          
           $res = mysqli_query($conn, $sql);

           $count=mysqli_num_rows($res);

           if($count==1)
           {
               //user available
               $_SESSION['login']="<div class='success text-center'>Login successfully</div>";
               $_SESSION['user']= $username;

               //redirect
               header('location:'.SITEURL.'admin/index.php');
           }
           else
           {
                 //user not available
                 $_SESSION['login']="<div class='error text-center'>username or password didn't match</div>";

                 //redirect
                //  header('location:'.SITEURL.'admin/login.php');  
                header('location:'.SITEURL.'admin/index.php');
           }
       }   

          
       

    
?>