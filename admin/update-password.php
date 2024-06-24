<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update password</h1>
        <br> <br>

        <?php
            if(isset($_GET['id']))
            {
              $id=$_GET['id'];
            }
        
        
        ?>
    
       <form action="" method="POST">
       <table class="tbl-30">
          <tr>
            <td>Current password</td>
            <td>
              <input type="password" name="current_password" placeholder="current password">
            </td>
          </tr>
          <tr>
            <td>New password</td>
            <td>
              <input type="password" name="new_password" placeholder="new password">
            </td>
          </tr>
          <tr>
            <td>Confirm password</td>
            <td>
              <input type="password" name="confirm_password" placeholder="confirm password">
            </td>
          </tr>
          <tr>
            <td colspan= "2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Change password" class="btn-secondary">           
            </td>
          </tr>
        </table> 
       </form>
    </div>
</div>

<?php
     
     //check whether the submit button is clicked or not
     if(isset($_POST['submit']))
     {

         //get data from the form
         $id = $_POST['id'];
         $current_password = md5($_POST['current_password']);
         $new_password = md5($_POST['new_password']);
         $confirm_password = md5($_POST['confirm_password']);
     

         // check whether the user with current id and password exist or not
          $sql = "SELECT * FROM tbl_admin where id = $id AND password ='$current_password'";
    

          // Executing the query
           $res = mysqli_query($conn, $sql);

         if($res== true)
         {
           //check whether the data is available or not
            $count = mysqli_num_rows($res);
      
      
           if($count==1)
           {
                   //user exists and password can be changed


                //check whether the new password and confirm password
                 if($new_password == $confirm_password)
                 {
                      //update the password
                      $sql2 =" UPDATE tbl_admin SET
                      password ='$new_password'
                      where id=$id       
                      ";
                     // executing the query
                    $res2 = mysqli_query($conn, $sql2);

                     //checking if the query is running or not
                     if($res2== true)
                     {
                       //echo "succcess";
                       //show confirmation message
                       $_SESSION['change-pwd']= "<div class = 'success'>Password change successfully.</div>";

                        //redirect 
                       header('location:'.SITEURL.'admin/manage-admin.php');
                     }
                      else{
                                //show error message
                                $_SESSION['change-pwd']= "<div class = 'success'>Failed to change password.</div>";

                                 //redirect 
                                header('location:'.SITEURL.'admin/manage-admin.php');
                           }
                  }          
                 else{
                     //show error message
                     $_SESSION['pwd-not-match']= "<div class = 'error'>Password did not match</div>";

                     //redirect 
                      header('location:'.SITEURL.'admin/manage-admin.php');
                  }
                
           }   
            else{
                  //user not found
                   $_SESSION['user-not-found']= "<div class ='error'>User not found.</div>";

                   //redirect
                   header('location:'.SITEURL.'admin/manage-admin.php');
             }
     }  
    }      
?>

<?php include('partials/footer.php');?>
