<?php include('partials/menu.php'); ?>


<div class="main-content">
   <div class="wrapper">
       <h1>Update Admin</h1>
       <br> <br>

     <?php
        //get the id of the admin
        $id = $_GET['id'];

        //
        $sql =" SELECT * FROM tbl_admin where id = $id";

        // running the query
        $res = mysqli_query($conn, $sql);

         //checking if the query is running or not.
         if($res == TRUE)
         {
              // Check if their is data or not
              $count = mysqli_num_rows($res);
      

               if($count == 1){
                    //Get the data
                   // echo Admin available
                   $row = mysqli_fetch_assoc($res);
 
                   $full_name = $row['full_name'];
                  $username  = $row['username'];
               } 
           }     
         else
          {
            // Redirect to manage-admin
             header('location:'.SITEURL.'admin/manage-admin.php');
          }


?>

     <form action="" method="POST">
     
     <table class="tbl-30">
       <tr>
         <td>Full Name:</td>
         <td>
           <input type="text" name="full_name" value="<?php echo $full_name?>">
         </td>
       </tr>
       <tr>
           <td>Username:</td>
           <td>
                <input type="text" name="username" value="<?php echo $username?>">
           </td>
       </tr>
       <tr>
           <td colspan = "2">
                       <input type="hidden" name="id" value="<?php echo $id?>">
                       <input type="submit" name="submit" value="Update Admin"class="btn-secondary">
           
           
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
        // echo button clicked
        //Get all the values from the form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
   
    
        // creating sql query to update Admin
        $sql = "UPDATE  tbl_admin SET
        full_name = '$full_name',
        username  = '$username'
       WHERE id='$id'
        ";

       //Execute the Query
        $res = mysqli_query($conn, $sql );

       if($res == true)
       {
         //creating session to show message
         $_SESSION['update']="<div class='success'>Admin updated successfully</div>";
         //Redirect to Manage Admin page
         header('location:'.SITEURL.'admin/manage-admin.php');
         
       }
       else
       {
           //creating session to show message
           $_SESSION['update']="<div class='error'>Failed to update Admin </div>";
           //Redirect to Manage Admin page
           header('location:'.SITEURL.'admin/manage-admin.php');
       }
   }
?>

<?php include('partials/footer.php'); ?>