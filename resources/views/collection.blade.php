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
      <title>NowCommere</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
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
                    <div class="logo"><a href="/"><img src="{{asset('nowcommercestyle/contentstyle/images/logo.png')}}"></a></div>
                </div>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                           <a class="nav-item nav-link" href="/">Home</a>


                           <a class="nav-item nav-link" href="about">Why NowCommerce</a>

                           <a class="nav-item nav-link" href="/myorder">Orders</a>

                           <div class="dropdown">
                              <a class="nav-item nav-link" >Products</a>
                              <div class="dropdown-content">
                              <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="shoes">Shoes</a>
                              <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="collection">Collection</a>



                              </div>
                            </div>
                           <a class="nav-item nav-link" href="contact">Contact us</a>


                           <div class="dropdown">
                            <a class="nav-item nav-link" >My Account</a>
                            <div class="dropdown-content">
                              @if(Session::has('user'))
                              {{Session::get('user')['name']}}
                              <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="registrationform/profile.html">My Profile </a>
                              <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="/logout">Sign out</a>
                              @else
                              <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="login">Sign in</a>
                              <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="register">Register</a>


                            </div>
                          </div>
                          <a class="nav-item nav-link last" href="/cartlist"><img src="{{asset('nowcommercestyle/contentstyle/images/shop_icon.png')}}"><span style="color:red;">{{$total}}</span></a>

                          {{-- <a class="nav-item nav-link last" href="contact.html"><img src="images/search_icon.png"></a> --}}
                        </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>

	<!-- New Arrivals section start -->
  <div class="collection_text">Collection</div>
    <div class="collection_section layout_padding">
    	<div class="container">
    		<h1 class="new_text"><strong>New Collections</strong></h1>
    	    <p class="consectetur_text">Sports shoes are ideally designed to help support athletic activities, but can also be worn to up the style quotient. Shop for men’s running shoes online at NowCommerce, to get a wide range of athletic shoes.</p>
    	</div>
    </div>

    			<!-- New Arrivals section start -->
<div class="layout_padding gallery_section">
    <div class="container">
        <div class="row">
            @foreach ($products as $pro)
            <div class="col-sm-4">
                <div class="best_shoes">
                    <a href="detail/{{$pro['id']}}">
                    <p class="best_text">{{$pro['name']}} </p>
                    <div class="shoes_icon"><img style="height: 210px;" src="storage/images/{{$pro->gallery}}" alt="Chania"></div>
                    <div class="star_text">
                        <div class="left_part">
                        </a>

                                <button style="background-color: #0a0506; width:110px" class="more_bt">Add to cart</button>

                        </div>
                        <div class="right_part">
                            <div class="shoes_price">$ <span style="color: #ff4e5b;">{{$pro['price']}}</span></div>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach
            <div>





        </div>

    </div>


        <div style="text-align: center;">

            {{$products->links()}}
        </div>
            <style>
            .w-5{

                display:none;

            }
            </style>

    </div>

    </div>
</div>
   	<!-- New Arrivals section end -->

	<!-- section footer end -->
	<div class="shoes-copyright">© Copyright 2021 NowCommerce - All Rights Reserved</div>


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
   </body>
</html>
