<?php include('partials/menu.php');?>


<div class="main-content">
<div class="wrapper">
<h1>Manage admin</h1>
<br />
<?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add']; // display session message.
        unset($_SESSION['add']); // removing session message.
    }
   
                if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                   
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    
?>
    <br />    <br />    <br />
    <!-- Button to add admin -->
    <a href="add-admin.php" class="btn-primary">Add admin</a>
    <br />    <br />    <br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>fullname</th>
                <th>username</th>
                <th>action</th>
            </tr>
            <?php 
            //Queryy to Get all Admin
            $sql = "SELECT * FROM tbl_admin";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
             
            //Check whether the query is executed or not
            if($res == TRUE)
            {
                //Count rows to check whether we hava datain database or not
                $count = mysqli_num_rows($res);// function to get all the rows in the database.
                  
                $sn=1;//Create a variable and assign value 
              
                //check the number of rows
                if($count>0)
                {
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        //using while loop to get all the data from the database.
                        //and while loop will run as long as we have data in the database
                   
                        //Get individual data
                        $id = $rows['id'];
                        $full_name =$rows['full_name'];
                        $username =$rows['username'];

                        // Display the value in the table
                        ?>

                             <tr>
                                 <td><?php echo $sn++ ?></td>
                                  <td><?php echo $full_name ?></td>
                                  <td><?php echo $username ?></td>
                                  <td>
                                    <a href=" <?php echo SITEURL; ?>Admin/update-password.php?id=<?php echo $id?>"class="btn-primary">Change password</a>
                                    <a href=" <?php echo SITEURL; ?>Admin/update-admin.php?id=<?php echo $id?>"class="btn-secondary">Update Admin</a>
                                    <a href=" <?php echo SITEURL; ?>Admin/delete-admin.php?id=<?php echo $id?>"class="btn-danger">Delete Admin</a>
                                 </td>
                             </tr>
                       <?php
                    }
                }
                else{ 
                    // we don't have data in database
                }
            }
        ?>
           
         
        </table>
  </div> 
</div>
<?php include('partials/footer.php');?>