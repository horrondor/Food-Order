<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login" id="#login-btn">
            <a href="#" onclick="login()"><i class="fas fa-user"></i> Login</a>        
          </div>


    <!--loginform-->
<div class="form-popup">
  <span id="close-login-form" onclick="closebtn()">X</span>
  <form action="">
    <h3>User login</h3>
    <input type="text" name="username" placeholder="Username."required>
     <input type="password" name="password" placeholder="Password"required>
     <!-- <p>forget your password<a href="#">Click here</a></p> -->
     <input type="submit" name="submit" value="Login">
      <p>or login with</p>
      <div class="buttons">
           <a href="#" >Facebook</a>
            <a href="#" class="btn">Google</a>
          </div>
          <p>Don't have an account <a href="#"onclick="signup()">create one</a></p>
    </form>
    
</div> 

<!-- signup form -->
<div class="form-signup">
  <span id="close-signup-form" onclick="closesignup()">X</span>
  <form action="">
    <h3>Sign Up</h3>
    <input type="text" name="fullname" placeholder="Fullname"required>
    <input type="email"  placeholder="Email Address"required>
    <input type="text" placeholder="Address"required>
    <input type="tel" placeholder="Contact Number"required> 
    <input type="password" name="password" placeholder="Password"required>
     <!-- <p>forget your password<a href="#">Click here</a></p> -->
     <input type="submit" name="submit" value="signup">
      <!-- <p>or login with</p> -->
      <!-- <div class="buttons">
           <a href="#" >Facebook</a>
            <a href="#" class="btn">Google</a>
          </div> -->
          <!-- <p>Don't have an account <a href="#">create one</a></p> -->
    </form>
</div> 
</body>
<script>
    // login form
function login(){
  document.querySelector('.form-popup').classList.toggle('active');
}

function closebtn(){
  document.querySelector('.form-popup').classList.remove('active');
}

// signup from
function signup(){
  
  document.querySelector('.form-signup').classList.toggle('active');
  closebtn();
}
function closesignup(){
  document.querySelector('.form-signup').classList.remove('active');
}
</script>
</html>
