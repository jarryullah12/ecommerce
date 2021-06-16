
<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{
  $total=ProductController::cartItem();
}
?>
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

                              <a  class="nav-item nav-link" href="shoes">Shoes</a>

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
    <div class="collection_text">Details for product</div>
    <div class="layout_padding contact_section">

    	<div class="container-fluid ram">
    		<div class="row">



                            <div class="col-sm-6" style="text-align: center;">
                                <div class="zoom">
                                <img style="height: 200px" src="{{ asset('storage/images/1/' . $product['gallery'] ) }}" style="width:410px;" >

                            </div>
                            <br>

                        	<div class="container-fluid ram" >

                                <div class="row">
                                    <div class="col-sm-12" style=" height:130px; width:200px; ">
                                        <div class="zoomsecond">
                                        <img  src="{{ asset('storage/images/1/' . $product['gallery2'] ) }}" style="height:80px; margin-bottom:200px;" >



                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                <img  src="{{ asset('storage/images/1/' . $product['gallery3'] ) }}" style="height:80px; margin-bottom:200px;" >

                                        </div></div></div></div>
                            </div>
                            <div class="col-sm-6">
                            <h2>Name : {{$product['name']}}</h2>
                            <h3>Price : Rs {{$product['price']}}</h3>
                            <h4>Category : {{$product['category']}}</h4>
                            <h4>Description : {{$product['description']}}</h4>
                            <br><br>
                            <form action="/add_to_cart" method="POST">
                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                            @csrf
                                <button style="background-color:rgb(202, 61, 61); border-color:rgb(202, 61, 61);" class="btn btn-primary">Add to Cart</button>
                            </form>
                            <br><br>
                            <br><br>

                            </div>




    		</div>
    	</div>
    </div>
   	<!-- contact section end -->
	<!-- section footer start -->

	<!-- section footer end -->
	<div class="shoes-copyright">© Copyright 2021 Shoesly - All Rights Reserved</div>



      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript -->
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });


$('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event){

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event){

                var yMove = event.originalEvent.touches[0].pageY;
                if( Math.floor(yClick - yMove) > 1 ){
                    $(".carousel").carousel('next');
                }
                else if( Math.floor(yClick - yMove) < -1 ){
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function(){
                $(this).off("touchmove");
            });
        });
      </script>
      <style>
* {
  box-sizing: border-box;
}

.zoom {
  padding: 50px;
  transition: transform .2s;
  background-color: rgb(245, 238, 238);
  width: 400px;
  height: 300px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5);
}
</style>
<style>
* {
  box-sizing: border-box;
}

.zoomsecond {
  padding: 50px;
  transition: transform .2s;
  background-color: rgb(245, 238, 238);
  width: 400px;
  height: 200px;
  margin: 0 auto;
}

.zoomsecond:hover {
  -ms-transform: scale(1.0); /* IE 9 */
  -webkit-transform: scale(1.0); /* Safari 3-8 */
  transform: scale(1.0);
}
</style>
   </body>
</html>
