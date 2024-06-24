<?php include('partials-front/check.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
</head>
<body>
      <form action="" method="POST" class="text-center">
         <label>Full Name:</label><br>
             <input type="text" name="full_name" placeholder="Enter your Fullname."><br><br>
                 <label>
                       Username:
                 </label><br>
                   <input type="text" name="username" placeholder="Enter your username."><br><br>
                     <label>
                         Password:
                     </label><br>
                         <input type="password" name="password" placeholder="Enter your password"><br><br>
                            <label> 
                                Email Address:
                            </label>  <br>
                               <input type="email" name="email" placeholder="Enter Email"><br><br>
                            <label> 
                               Contact:
                            </label>  <br>
                              <input type="tel" name="contact" placeholder="98xxxxxxxx"><br><br>

                                  <input type="submit" name="submit" value="Register" class="btn-primary">  

                                    <a href="<?php echo SITEURL;?>login.php"> 
                                      <input type="button" name="login" value="Login" class="btn-primary">                 
                                    </a>

        </form>   
        
        <?php
             //Check if the submit button is clicked or not
             if(isset($_POST['submit']))
             {
                   //Getting values from the form
                     $full_name = $_POST['full_name'];
                     $username = $_POST['username'];
                     $password = md5( $_POST['password']);
                     $email_address = $_POST['email'];
                     $contact = $_POST['contact'];

                     //SQL Qyery to insert data into tbl_user
                     $sql = "INSERT INTO tbl_user SET 
                       full_name = '$full_name',
                       username='$username',
                       password  = '$password',
                       email = '$email_address',
                       contact = '$contact'                
                        ";

                     //Execute the query
                     $res = mysqli_query($conn,$sql);

                     if($res== true)
                     {
                        //Data inserted successfully
                        //Redirecting to login page
                        header('location:'.SITEURL.'login.php');

                     }
                     else
                     {
                            //Failed to insert data.
                            //Redirectig to register page
                            header('location:'.SITEURL.'Register.php');
                     }
           
             }

        ?>
</body>
</html>