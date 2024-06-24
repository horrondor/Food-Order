<?php 

include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
       //1.Get id and imaeg_name
       $id=$_GET['id'];
       $image_name=$_GET['image_name'];
       
       //2.Remove the image if available
       if($image_name!="")
       {
           //get the path

           $path="../images/food/".$image_name;

           //unlink 
           $remove= unlink($path);

             if($remove==false)
             {
                 //session message
                 $_SESSION['upload']="<div class='error'>Failed to remove image.</div>";
                 //redirect
                 header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process            
                 die(); 
             }
       }

       //3.create sql query to delete food menu
       $sql="DELETE FROM tbl_food where id=$id";
       
       //4.Execute the query
       $res = mysqli_query($conn, $sql);

       if($res==true)
       {
          // Food menu deleted
          $_SESSION['delete']="<div class='success'>Food menu deleted successfully.</div>";
          //Redirect
          header('location:'.SITEURL.'admin/manage-food.php'); 
       }
       else
       {
             //Failed to delete food menu
             // Food menu deleted
             $_SESSION['delete']="<div class='error'>Failed to delete food menu.</div>";
             //Redirect
             header('location:'.SITEURL.'admin/manage-food.php'); 
       }
    }
    else
    {
            //Redirect to Manage Food Page         
             $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
             header('location:'.SITEURL.'admin/manage-food.php');
     }


?>





