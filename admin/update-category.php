<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
         <h1>Update category</h1>

        <?php
              //check if id is set
              if(isset($_GET['id']))
              {
                 //Get the data 

                 $id=$_GET['id'];

                 //Sql Query to delete data from the databse
                 $sql ="SELECT * FROM tbl_category WHERE id=$id ";

                 //Executing the query
                 $res = mysqli_query($conn, $sql);

                 //count the rows to check if the id is valid or not
                 $count = mysqli_num_rows($res);

                 if($count== 1)
                 {
                     //get all the data 
                     $row = mysqli_fetch_assoc($res);

                     $title = $row['title'];
                     $current_image = $row['image_name'];
                     $featured = $row['featured'];
                     $active = $row['active'];

                 }
                 else 
                 {
                   //redirect to manage categories with session message
                   $_SESSION['no-category']="<div class='error'>No category found.</div>";
                   header('location:'.SITEURL.'admin/manage-categories.php');
                 }
              }
              else 
              {
                 //Redirecting to manage-categories
                  header('location:'.SITEURL.'admin/manage-categories.php');    
              }
        
        ?>


    
        <form action="" method="POST" enctype="multipart/form-data">
             <table class="tbl-30">
                  <tr>
                       <td>Title</td>
                       <td>
                           <input type="text" name="title" value="<?php echo $title;?>">
                       </td>
                   </tr>

                   <tr>
                        <td>current Image:</td>
                        <td>
                            <?php
                                if($current_image !="")
                                {
                                      ?>

                                      <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image; ?>" width="100px"> 
                                      <?php
                                }
                                else
                                {
                                   echo "<div class='error'>Image not added.</div>";
                                }
                            ?>

                        </td>

                   </tr>  
                   <tr>
                       <td>New Image:</td>
                       <td>
                           <input type="file" name="image">
                       </td>
                   </tr>

                    <tr>
                          <td>Featured:</td>
                          <td>
                              <input <?php if($featured=="yes"){echo "checked";} ?> type="radio" name="featured" value="yes">Yes
                              <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="no">No
                        
                        </td>

                    </tr>

                    <tr>
                         <td>Active:</td>
                         <td>
                              <input <?php if($active=="yes"){echo "checked";} ?> type="radio" name="active" value="yes">Yes
                              <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="no">No

                         </td>
                    </tr>
                      
                    <tr>
                        <td>
                            <input type="hidden" name="current_image" value="<?php echo  $current_name ;?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update category" class="btn-secondary">
                        </td>
                    </tr>        
             </table>

        </form>  
        
        
                 <?php
                 
                       //check if the submit button is clicked or not
                       if(isset($_POST['submit']))
                       {
                           //1.get all  the data from the form
                            $id = $_POST['id'];
                           $title =$_POST['title'];
                           $current_name=$_POST['current_image'];
                           $featured =$_POST['featured'];
                           $active =$_POST['active'];
                         
                           //2.Updating New image if selected
                           if(isset($_FILES['image']['name']))
                           {
                              //get the mage details
                              $image_name=  $_FILES['image']['name'];
                              
                              //check if the image is available or not
                              if($image_name != "")
                              {
                                    //Image available
                                    //A. upload image

                                    //Auto Rename our image
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
                              else
                              {
                                 $image_name =$current_image;   
                              }
                             
                            
                           }
                           else 
                           {
                              $image_name= $current_image;   
                           }


                           //3.creating sql query to update database
                           $sql2 ="UPDATE tbl_category SET
                            
                               title= '$title',
                               image_name='$image_name',
                               featured='$featured',
                               active='$active'     
                            
                                WHERE id=$id
                            ";

                            //3.executing the query
                            $res2 = mysqli_query($conn, $sql2);

                            if($res2==true)
                            {
                               //category updated
                               $_SESSION['update']="<div class='success'>Category updated successfully.</div>";
                               header('location:'.SITEURL.'admin/manage-categories.php');
                            }
                            else
                            {
                                 //failed to update category
                                 //category updated
                               $_SESSION['update']="<div class='error'>Failed to update categoy.</div>";
                               header('location:'.SITEURL.'admin/manage-categories.php');
                            }
                       
                    }
                 
                 
                 ?>

    </div>

</div>


<?php include('partials/footer.php')?>
