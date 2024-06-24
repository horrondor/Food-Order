 <?php

session_start();
// unset($_SESSION["shopping_cart"]);
    if(isset($_POST["action"]))
    {
        
        if($_POST["action"] == "add")
        {
            
            if(isset($_SESSION["shopping_cart"]))
            {
                
                $is_available = 0;
               foreach($_SESSION["shopping_cart"] as $keys => $values)
               {
                    if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])
                    {
                        $is_available = $is_available +1;
                     global $is_available ;
	    				$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
                       
                            print_r($_SESSION["shopping_cart"]);
                          
                        echo "check";
					    echo $is_available;
                    }
                    
                   
                         
                }
                if($is_available == 0)
                    {
                       echo $is_available;
                        $item_array= array(
                            'product_id'=> $_POST["product_id"],
                            'product_title' => $_POST["product_title"],
                            'product_price' => $_POST["product_price"],
                            'product_quantity' => $_POST["product_quantity"]
                        );
                        $_SESSION["shopping_cart"][]= $item_array;
                        
                            print_r($_SESSION["shopping_cart"]);
                          
                        echo "new product";
                    }
            }  
          else
         {
           
                $item_array= array(
                    'product_id'=> $_POST["product_id"],
                    'product_title' => $_POST["product_title"],
                    'product_price' => $_POST["product_price"],
                    'product_quantity' => $_POST["product_quantity"]
                );
                $_SESSION["shopping_cart"][]= $item_array;
               

                    foreach($_SESSION["shopping_cart"] as $keys => $values){
                    print_r($_SESSION["shopping_cart"]);
                }

              
         }
            
        }
         
        if($_POST["action"]== 'remove' )
        {
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if($values["product_id"]== $_POST["product_id"])
                {
                    unset($_SESSION["shopping_cart"][$keys]);
                }
            }
        }
        if($_POST["action"]=='empty')
        {
            unset($_SESSION["shopping_cart"]);
        }
  }    
?>

