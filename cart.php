<?php 
require_once('partials-front/menu.php'); 
session_start();

$trash ='
<div id="cart" class="table-responsive">
   <!-- cart section starts -->
    <div class="cart">
        <div class="cart-container">
             
          <div class="cart-header">
            <h3 class="cart-heading">Cart</h3>
            <a href="#" class="text-decoration-none"><h5 class="action ">Remove all</h5></a> 
          </div>   
            <div class="cart-items">
              <div class="cart-image">
                <img src=""> 
              </div>
                <div class="cart-about">                        
                  <h1 class="cart-title"></h1>                                                                         
                </div>                      
                  <div class="cart-qty">                              
                  </div>
                    <div class="cart-prices">
                      <div class="cart-amount">
                        <p>Rs  </p> 
                                                      
                      </div>     
                        <a href="#" class="text-decoration-none"> <div class="cart-remove"><u>Remove</u></div></a> 
                    </div>
            </div>  
            <div class="cart-checkout mb-3">
            <div class="cart-total">
              <span>Total:</span>                  
              <div>
                <div class="shipping">
                  <span>Shipping: Free</span> 
                </div>
                  <div class="cart-Subtotal">
                    <span>Grand-Total:</span>                 
                  </div>              
              </div>
            </div>
              <a href=""><button class="checkout-button">Checkout</button></a>
          </div>                    
        </div>   
    </div>
 </div>
';





?> 
     

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="script.js"></script>
<!-- <script>
    	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Are you sure you want to remove this product?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
				
					alert("Item has been removed from Cart");
				}
			})
		}
		else
		{
			return false;
		}
	});
</script> -->
</html>