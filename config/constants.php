<?php
 //session start
 session_start();

// creating constants to store non repeating values
define('SITEURL', 'http://localhost/phpproject/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME', 'food-order');


// $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //database connection
// $select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //selecting database
try{
$conn = new PDO("mysql:host=localhost;dbname=food-order","root","");
        // echo "connected successfully";  
}
catch(PDOException $e){
    echo "failed to connect".$e->getMessage();
}

?>

