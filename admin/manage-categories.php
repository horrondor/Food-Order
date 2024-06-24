<?php include('partials/menu.php');?>
  
<div class="main-content">
       <div class="wrapper">
       <h1>Manage category</h1>
       <br>     

            
        
              <?php
                  if(isset($_SESSION['add']))
                  {
                      echo $_SESSION['add'];
                      unset($_SESSION['add']);

                  }

                  if(isset($_SESSION['upload']))
                  {
                      echo $_SESSION['upload'];
                      unset($_SESSION['upload']);
                  }

                  if(isset($_SESSION['remove']))
                  {
                     echo $_SESSION['remove'];
                     unset($_SESSION['remove']);

                  }

                  if(isset($_SESSION['delete'] ))
                  {
                    echo $_SESSION['delete'] ;
                    unset($_SESSION['delete']);
                  }
                  if(isset($_SESSION['update']))
                  {
                    echo$_SESSION['update'];
                    unset($_SESSION['update']);
                  }
                  if(isset($_SESSION['no-category']))
                  {
                    echo $_SESSION['no-category'];
                    unset($_SESSION['no-category']);
                  }

             ?>
                 <br><br>

                 <br><br><br>
                   <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add category</a>
                    <br><br>

                     <table class="tbl-full">
                         <tr>
                             <th>S.N.</th>
                             <th>Title</th>
                             <th>image</th>
                             <th>featured</th>
                             <th>active</th>
                             <th>actions</th>                    
                         </tr>
                            <?php
                                    //selcting from the database
                                    $sql ="SELECT * FROM tbl_category";

                                    //
                                    $res = mysqli_query($conn, $sql);

                                    //
                                    $count = mysqli_num_rows($res);
                                    
                                    //creating a sn variable and set it's value as 1
                                    $sn=1;

                                    if($count>0)
                                    {
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                             $id =$row['id'];
                                             $title = $row['title'];
                                             $image_name =$row['image_name'];
                                             $featured =$row['featured'];
                                             $active =$row['active'];
                                        
                                           ?>
                                            <tr>
                                                 <td><?php echo $sn++; ?></td>
                                                 <td><?php echo $title; ?></td>
                                                 
                                                 <td>
                                                 <?php
                                                 //check whether image is available or not
                                                      if($image_name!="")
                                                      {
                                                        //Display image
                                                        ?>
                                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="100px;">
                                                        <?php
                                                      }
                                                      else
                                                      {
                                                         //Display error message
                                                         echo "<div class='error'>Image not Added.</div>";   
                                                      }
                                                      ?>
                                                 </td>                                                 
                                                 <td><?php echo $featured; ?></td>
                                                 <td><?php echo $active; ?></td>
                                                
                                                <td colspan="2">

                                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class='btn-secondary'>Update Category</a>
                                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Category</a>

                                                </td>                                    
                                              </tr>

                                     
                                          <?php
                                        }


                                    }
                                    else
                                    {
                                        ?>
                                        <td colspan="6"><div class="error">No category Added.</div></td>  
                                   
                        
                                        <?php 
                                    }
                                    ?>
                     

                           
                      
                                                                
                     </table>                 
       </div>
</div>
<?php include('partials/footer.php');  ?>