<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{
  $total=ProductController::cartItem();
}
?>
<?php

if(Session::has('user'))
{ ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Shoesly</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
       <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('nowcommercestyle/contentstyle/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('nowcommercestyle/contentstyle/images/fevicon.png')}}" type="{{asset('nowcommercestyle/contentstyle/image/logo.png')}}" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

   </head>
   <!-- body -->
   <body class="main-layout">
    <!-- header section start -->
    <div class="header_section  header_main">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo"><a href="/"><img style="height: 60px" src="{{asset('nowcommercestyle/contentstyle/images/logo.png')}}"></a></div>
                </div>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                           <a class="nav-item nav-link" href="/">Home</a>


                           <a class="nav-item nav-link" href="about">Why Shoesly</a>

                           <a class="nav-item nav-link" href="/myorder">Orders</a>

                              <a class="nav-item nav-link" href="shoes">Shoes</a>

                              <a class="nav-item nav-link" href="contact">Contact us</a>





                            <div class="dropdown">

                             <a class="nav-item nav-link" >My Account</a>

                             <div class="dropdown-content">
                               @if(Session::has('user'))
                               <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="listupdate">My Profile </a>
                               <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="/logout">Sign out</a>
                               @else
                               <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="/login">Sign in</a>
                               <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="/register">Register</a>

                               @endif
                             </div>
                           </div>



                           <a class="nav-item nav-link last" href="/cartlist"><img src="{{asset('nowcommercestyle/contentstyle/images/shop_icon.png')}}"><span style="color:red;">{{$total}}</span></a>

                           @if(Session::has('user'))
                           <a class="nav-item nav-link" >User: {{Session::get('user')['username']}}</a>

                           @else {{''}}
                           @endif
                       </div>

                       </div>

                           {{-- <a class="nav-item nav-link last" href="contact.html"><img src="images/search_icon.png"></a> --}}
                         </div>
                       </div>
                     </div>

  <!-- header section end -->
   	<!-- contact section start -->
    <div class="collection_text">Order Now</div>
    <div class="layout_padding contact_section">

    	<div class="container-fluid ram">
    		<div class="row">
    			<div class="col-md-8">

    		</div>
    			</div>
    			<div class="collectipn_section_3 layuot_padding">
            <div class="container">
              <div class="racing_shoes" style="background-color: white;">
                <div class="custom-product">
                    <div class="col-sm-8">

                        @foreach ($products as $item)

                            @endforeach


                      <table class="table table-striped">
                          <tbody>
                            <tr>
                                <td >

                                  <form action="/add_in_cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$item->id}}">
                                    <select name="product_price" style="display: none;">

                                            <option value="" disabled selected>Select Quantity</option>

                                            <option value="{{$item->price}}">1</option>
                                            <option value="{{$item->price + $item->price}}" >2</option>
                                            <option value="{{$item->price + $item->price + $item->price}}">3</option>


                                    </select>
                                   <td>


                                        <button type="submit" style="background-color:rgb(202, 61, 61); border-color:rgb(202, 61, 61);" class="btn btn-primary">Select Products</button>
                                   </td>
                                    </form>


                                </td>
                            </tr>
                            <tr>
                              <td>Price</td>
                              <td>{{$item->product_price}}</td>
                            </tr>

                            <tr>
                              <td>Delivery Charges</td>
                              <td>100 Rs</td>

                            </tr>
                            <tr>
                              <td>Total Amount</td>
                              <td>{{$item->product_price+100}} Rs</td>
                            </tr>
                          </tbody>
                        </table>

                        <form method="POST" action="orderplace">
                          @csrf
                          <div class="form-group">
                              <label>Home Address</label>
                            <textarea placeholder="enter your address"  name="address" class="form-control" > </textarea>
                          </div>
                          <div class="form-group">
                              <label for="">Payment Method</label>
                              <p><input type="radio"  value="cash" name="payment"> <span>Online Payment</span>  </p>
                              <p><input type="radio"  value="cash"  name="payment"> <span>EMI Payment</span>  </p>
                              <p><input type="radio" value="cash"  name="payment"> <span>Payment on Delivery</span>  </p>

                          </div>
                          <button type="submit" class='btn btn-primary' style="background-color: rgb(231, 104, 104); border-color:rgb(231, 104, 104);">Proceed to Checkout</button>
                        </form>
                    </div>
          </div>


              </div>
            </div>
          </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
   	<!-- contact section end -->
	<!-- section footer start -->

	<!-- section footer end -->
	<div class="shoes-copyright">© Copyright 2021 Shoesly - All Rights Reserved</div>



      <!-- Javascript files-->

      <script src="{{asset('nowcommercestyle/contentstyle/js/jquery.min.js')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/popper.min.js')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/bootstrap.bundle.min.js">')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('nowcommercestyle/contentstyle/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/custom.js')}}"></script>
      <!-- javascript -->
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

<script>

    $(document).ready(function () {

$('.increment-btn').click(function (e) {
    e.preventDefault();
    var incre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(incre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10){
        value++;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }

});

$('.decrement-btn').click(function (e) {
    e.preventDefault();
    var decre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(decre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }
});

});
// Update Cart Data
$(document).ready(function () {

$('.changeQuantity').click(function (e) {
    e.preventDefault();

    var quantity = $(this).closest(".cartpage").find('.qty-input').val();
    var product_id = $(this).closest(".cartpage").find('.product_id').val();

    var data = {
        '_token': $('input[name=_token]').val(),
        'quantity':quantity,
        'product_id':product_id,
    };

    $.ajax({
        url: '/update-to-cart',
        type: 'POST',
        data: data,
        success: function (response) {
            window.location.reload();
            alertify.set('notifier','position','top-right');
            alertify.success(response.status);
        }
    });
});

});

</script>
   </body>
</html>
<?php
         }else{

             echo "404";
         }
?>
