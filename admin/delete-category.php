<?php
    //include constants File
    include('../config/constants.php');


    //check whether the id and image_name is set or not


    if(isset($_GET['id']) && ($_GET['image_name']))
    {
         $id=$_GET['id'];
         $image_name=$_GET['image_name'];

         //Remove physical image if available
         if($image_name !=="")
         {
            //Image is available.so,remove it
            $path ="../images/category/".$image_name;

            //Remove the image
            $remove =unlink($path);

            if($remove==false)
            {
                //display error message
                $_SESSION['remove']="<div class='error'>Failed to remove image.</div>";

                //Redirecting to manage-categories
                header('location:'.SITEURL.'admin/manage-categories.php');
            }
         }

         // Delete data from the database
         //Sql query to delete data from the database
         $sql ="DELETE FROM tbl_category WHERE id=$id";

         //Executing data from the databse
         $res = mysqli_query($conn, $sql);

         if($res==true)
         {
             //Display session message
             $_SESSION['add']="<div class='success'> Category deleted successfully.</div>";
             
             //Redirecting to manage-categories
             header('location:'.SITEURL.'admin/manage-categories.php');
         }
         else 
         {
             //Display session message
             $_SESSION['add']="<div class='error'> Failed to delete Category .</div>";


             //Redirecting to manage-categories
             header('location:'.SITEURL.'admin/manage-categories.php');
         }


    }
    else
    {
        //redirecting to mage-categories
        header('location:'.SITEURL.'admin/manage-categories.php');
    }

?>