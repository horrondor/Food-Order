<?php include('partials/menu.php');?>

   <div class="main-content">
     <div class="wrapper">
       <h1>Add Category</h1>
       <br><br>
   

          <form action="" method="POST" enctype="multipart/form-data">

              <table class="tbl-30">
                     <tr>
                          <td>Title:</td>
                          <td>
                               <input type="text" name="title" placeholder="Category title">
                          </td>
                     </tr>     

                     <tr>
                          <td>Select image:</td>
                          <td>
                               <input type="file" name="image">
                          </td>
                     </tr>

                     <tr>
                          <td>Featured:</td>
                          <td>
                                <input type="radio" name="featured" value="Yes">Yes
                                <input type="radio" name="featured" value="No">No
                          </td>
                     </tr>


                     <tr>
                           <td>Active:</td>
                           <td>
                               <input type="radio" name="active" value="Yes">Yes
                               <input type="radio"b name="active" value="No">No
                           </td>
                          
                     </tr>
                    
                    <tr>
                         <td colspan="2">
                               <input type="submit" name="submit" value="Add category" class="btn-secondary">                                                 
                         </td>
                      
                    </tr>
             </table>
          </form>
     
     </div>   
   </div>



   <?php
        
       //Getting data from the form
       if(isset($_POST['submit']))
       {
             $title =$_POST['title'];
           
             //1.Getting data for featured
             if(isset($_POST['featured']))
             {
                $featured =$_POST['featured'];
             }
             else 
             {
                  $featured ="No";
             }
             
                    //2.Getting data for active
                    if(isset($_POST['active']))
                    {
                       $active= $_POST['active'];
                    }
                    else 
                    {
                        $active ="No";
                    }
              
                  //3.Check whether the image is selected or not and set the value for image name accoridingly
                   
                  if(isset($_FILES['image']['name']))
                  {

                        //Getting image name
                        // for upload we need image_name,source_path and destination_path
                        $image_name = $_FILES['image']['name'];
                
                
                         //upload the image onlu if selected
                         if($image_name !== "")
                            {
  
  
                                 //Auto Rename ou image
                                 //Get the extension of our image
                                 $ext = end(explode('.', $image_name));
  
                                 //Rename the image
                                   $image_name = "Food_category_".rand(000,999).'.'.$ext;
  
  
  
                                    $source_path =$_FILES['image']['tmp_name'];
    
                                   $destination_path ="../images/category/".$image_name;
                  
    
    
                                   //finally uploading
    
                                    $upload =move_uploaded_file($source_path, $destination_path);
    
                                    //check whether the image is uploaded or not
                                    if($upload==false)
                                    {
                                      //creating session variable to show message
                                      $_SESSION['upload']="<div class='error'> Failed to upload image. </div>";
    
                                      //rediecting 
                                      header('location:'.SITEURL.'admin/add-category.php');
                                      die();
                                    }
                        
  
                               }  
                   }
                   else 
                   {
                       //Don't upload the image and set the value as blank
                       $image_name="";     
                   }
               
                 
                  
                  
                  //4.Inserting data into database
                  $sql ="INSERT INTO tbl_category SET
                  title='$title',
                  image_name='$image_name',
                  featured ='$featured',
                  active = '$active'                                                      
                  ";
                  
                  //5.Executing the query
                  $res = mysqli_query($conn, $sql);

                  if($res==true)
                  {
                       //session message
                       $_SESSION['add']="<div class='success'> Category added successfully.</div>";

                       //redirect to manage_category
                       header('location:'.SITEURL.'admin/manage-categories.php');
                 

                  }
                  else
                  {
                        //session message
                        $_SESSION['add']="<div class='error'>Failed to Add Category.</div>";

                        //redirect to manage_category
                        header('location:'.SITEURL.'admin/add-category.php');
                  
                  }

       }

  
   ?>

<?php include('partials/footer.php'); ?>