let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');



// menu.onclick = () =>{
//     menu.classList.toggle('fa-times');
//     navbar.classList.toggle('active');
// }





var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 40,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },

  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

});
  
var swiper = new Swiper(".review-slider", {
  spaceBetween: 20,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },

  loop: true,
  breakpoints: {
    0: {
        slidesPerView: 1,
    },
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },

});


// Shopping Cart
$(document).ready(function(){
   
  load_cart_data();

 function load_cart_data()
 {
    $.ajax({
       url:"fetch_cart.php",
       method:"POST",
       dataType:"json",
       success:function(data)
       {
          $('#cart_details').html(data.cart_details);
          // $('.total_price').text(data.total_price);
          // $('.badge').text(data.total_item);
       }
    });
 }

$(document).on('click', '.Add_to_cart', function()
{
 var product_id = $(this).attr("id");
 var product_title = $('#title'+product_id+'').val();
 var product_price = $('#price'+product_id+'').val();
 var product_quantity = 1;
 var action= "add";
$.ajax({
 url:"action.php",
 method:"POST",
 data:{product_id:product_id,product_title:product_title,product_price:product_price,product_quantity:product_quantity,action:action},
 success:function(result)
 {
    load_cart_data();
   // alert("data send");
 }
});
 

 })

$(document).on('click', '.delete', function(){
var product_id = $(this).attr("id");
var action = 'remove';
if(confirm("Are you sure you want to remove this product?"))
{
 $.ajax({
   url:"action.php",
   method:"POST",
   data:{product_id:product_id, action:action},
   success:function(data)
   {
     load_cart_data();
     alert("Item has been removed from Cart");
   }
 })
}
else
{
 return false;
}
});


$(document).on('click', '#clear_cart', function(){
var action = 'empty';
$.ajax({
 url:"action.php",
 method:"POST",
 data:{action:action},
 success:function(result)
 {
   load_cart_data();
   
   alert("Your Cart has been clear");
 }
});
});
});
