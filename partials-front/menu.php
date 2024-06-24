<?php require_once('config/constants.php'); ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"   href="https://unpkg.com/swiper@8/swiper-bundle.min.css">

     <!-- font awesome cdn link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <!-- custom css file link  -->
       <link rel="stylesheet" href="./index.css">
      <!-- <Bootsrap cdn link> -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- Jquery cdn link -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

       <title>Document</title>
  </head>
 <html>
  <!-- header section starts -->
  
  <header>
  <nav class="navbar navbar-expand-lg navbar-light  mt-1 p-3 ">
          <div class="container-fluid">
            <a href="<?php echo SITEURL;?>index.php" class="logo navbar-brand"><i class="fas fa-utensils"></i>food Order</a>  
                           
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarContent">
                      <ul class="navbar-nav  ms-auto fs-5">
                      <li class="nav-item">
                             <a class="nav-link active" href="<?php echo SITEURL;?>index.php">Home</a>
                          </li>
                          <!-- <li class="nav-item">
                             <a class="nav-link" aria-current="page" href="<?php echo SITEURL;?>category.php">Categories</a>  
                          </li> -->
                          <li class="nav-item">
                             <a  class="nav-link" href="<?php echo SITEURL;?>FOODMenu.php">Menu</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modal-login">login</a>
                          </li>
                      </ul>
                      
                  </div>
                  
              </div>
      </nav>
   

           

  </header>
  

  <div class="modal" id="modal-login" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">User Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
           </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





<div class="cart_icon"> 

     <span data-bs-toggle="modal" data-bs-target="#modal-cart"><i class="fas fa-shopping-cart"></i>Shopping Cart</span>
</div>

<div class="modal fade" id="modal-cart" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h1 class="fw-bold">Shopping Cart</h1>
                  <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
              </div> 
              <div class="modal-body">
               <span id="cart_details"></span>
              <div>
				    	<a href="#" class="btn btn-primary" id="check_out_cart">
				      	<span class="glyphicon glyphicon-shopping-cart"></span> Check out
				      	</a>
					    <a href="#" class="btn btn-default" id="clear_cart">
				    	<span class="glyphicon glyphicon-trash"></span> Clear
				    	</a>
			      	</div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
     </div>
       

  <!-- header section ends -->


  