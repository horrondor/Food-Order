<?php 
session_start();
$total_price = 0;
$total_item = 0;
$output ='
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
    <tr>
      <th>Product_name</th>
      <th>Product_price</th>
      <th>Product_quantity</th>
      <th>Total</th>
      <th>Action</th>
    </tr>

';
if(!empty($_SESSION["shopping_cart"]))
{
          
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
        $output .='

          <tr>
            
              <td>'.$values["product_title"].'</td>
              <td>'.$values["product_price"].'</td>
              <td>'.$values["product_quantity"].'</td>
              <td align="right">$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
              <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button></td>
        </tr>

        ';
                $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
            $total_item = $total_item + 1;
        }
        $output .= '
          <tr>  
                <td colspan="3" align="right">Total</td>  
                <td align="right">$ '.number_format($total_price, 2).'</td>  
                <td></td>  
            </tr>
          ';
        }
else
{
 $output .='
 <tr>
  <td colspan="5" align="center">
    Your Cart is Empty!
  </td>

 </tr>

 ';
}
$output .= '</table></div>';
$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	'$' . number_format($total_price, 2),
	'total_item'		=>	$total_item
);	

echo json_encode($data);
   

?>