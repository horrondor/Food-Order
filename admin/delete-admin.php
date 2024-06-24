<?php
include ('../config/constants2.php');

//Getting the id of the admin
$id = $_GET['id'];
    
//1.Create sql query to delete admin

$sql = "DELETE FROM tbl_admin where id=$id";

//Running the query

$res = mysqli_query($conn, $sql);



//checking if the query is running

if($res == TRUE){
    //creating session variable
    $SESSION['delete'] = "<div class = 'success'>Admin deleted successfully</div>";
   
    //Redirecting to manage-admin
    header('location:'.SITEURL.'Admin/manage-admin.php');
}
else
{
     //creating session variable
     $SESSION['delete'] = "<div class = 'error'>Failed to delete admin</div>";
   
     //Redirecting to manage-admin
     header('location:'.SITEURL.'Admin/manage-admin.php');
}


?>