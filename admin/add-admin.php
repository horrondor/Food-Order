<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
 
       <h1>Add admin</h1>
       <br> <br>
       <?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add']; // display session message.
        unset($_SESSION['add']); // removing session message.
    }
    ?>


        <form action="" method="POST">
            <table class="tbl-30">
              <tr>
                  <td>Full name:</td>
                  <td><input type="text" name="full_name" placeholder="Enter your name"></td>
              </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Your username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Your password"></td>
            </tr>
            <tr>
                <td colspan="2">
                  <input type="submit" name="submit" value="Add admin" class="btn-secondary">
               </td>
            </tr>
            </table>
            
        </form>
    </div>
</div>
<?php include('partials/footer.php');?>


<?php
          //Process the data from the form and save it in the Database
           //Check if submit button is clicked


{
    
//1.Get the data from the form

$full_name= $_POST['full_name'];
$username= $_POST['username'];
// $password = md5( $_POST['password']); //password encryption with MD5
$password = $_POST['password']; 

//2.SQL query to save data into the database
$sql = "INSERT INTO tbl_admin SET
        full_name ='$full_name',
        username = '$username',
        password = '$password'
        ";

//3.Executing Query and savin data into database
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));        


//4.Check whether the (Query is executed) data is inserted or not and display appropriate message
if($res == TRUE){
    //Data inserted
 
    //create a session variable to Display message
    $_SESSION['add'] = "<div class='success'>Admin added Successfully.</div>";
    //Redirecting page to manage admin
    header("location:".SITEURL.'Admin/manage-admin.php');   
}
else{
    //create a session variable to Display message
    $_SESSION['add'] = "<div class='error'>Failed to add admin.</div>";
    //Redirecting page to manage admin
    header("location:".SITEURL.'Admin/add-admin.php'); 
}
}

?>









