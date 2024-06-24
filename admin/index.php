
<?php include('partials/menu.php'); ?>

<!-- Main content section -->
<div class="main-content">
 <div class="wrapper">
  <h1>Dashboard</h1>
     
    <div class="col-4 text-center">
      <?php
      //Sql query
          $sql = "SELECT * From tbl_category";
          
          //Executing the queries
          $res = mysqli_query($conn, $sql);
          //Counting the rows
          $count = mysqli_num_rows($res);
      ?>

     <h2><?php echo $count;?></h2>
     <br />
     <p>Categories</p>
    </div>

    <div class="col-4 text-center">
    <?php
      //Sql query
          $sql2 = "SELECT * From tbl_food";
          
          //Executing the queries
          $res2 = mysqli_query($conn, $sql2);
          //Counting the rows
          $count2 = mysqli_num_rows($res2);
      ?>
     <h2><?php echo $count2;?></h2>
     <br />
     <p>Food Menu</p>
    </div>

    <div class="col-4 text-center">
    <?php
      //Sql query
          $sql3 = "SELECT * From tbl_order";
          
          //Executing the queries
          $res3 = mysqli_query($conn, $sql3);
          //Counting the rows
          $count3 = mysqli_num_rows($res3);
      ?>
    <h2><?php echo $count3;?></h2>
     <br />
     <p>Total Orders</p>
    </div>

    <div class="col-4 text-center">
      <?php
          //SQL Query to get total from tbl_order
           $sql4 = "SELECT SUM(total) AS Total FROM tbl_order";
        
            //Executing the query
              $res4 = mysqli_query($conn,$sql4);

                $row4 = mysqli_fetch_assoc($res4);

                 //Get the Total 
                   $total_revenue = $row4['Total'];
      ?>

    <h2>Rs <?php echo $total_revenue; ?></h2>
     <br />
     <p>Revenue</p>
    </div>
    <div class="clearfix"></div>
 </div>
</div>

<?php include('partials/footer.php');?>
   