
<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Crypt;
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
                           <a class="nav-item nav-link" href="contact">User: {{Session::get('user')['username']}}</a>

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
    <div class="collection_text">Change Profile Setting</div>
    <div class="layout_padding contact_section">

    	<div class="container-fluid ram">
    		<div class="row">
    			<div class="col-md-10" >

    		</div>
    			</div>
                <br>
    			<div class="collectipn_section_3 layuot_padding">
                    @if(Session::has('user'))


                    <table border="2">
                    <tr style="text-align: center;">
                        <td>Name</td>
                        <td>Email address</td>
                        <td>Gender</td>
                        <td>Password</td>
                        <td>Confirm password</td>

                        <td>Update Account</td>
                        <td>Delete Account</td>

                    </tr>

                    @foreach ($lists as $item)
                    <tr>


                        <td style="text-align: center">{{$item['username']}}</td>
                        <td style="text-align: center">{{$item['email']}}</td>
                        <td style="text-align: center">{{$item['gender']}}</td>
                        <td style="text-align: center">{{base64_decode($item->password)}}</td>



                        <td style="text-align: center">{{base64_decode($item->confirm_password)}}</td>


                        <td style="text-align: center"><button class="btn btn-success"><a  style="color: white;" href={{"profile/". Session::get('user')['id']}}>Edit</a></button></td>
                        <td style="text-align: center"><button class="btn btn-danger"><a  style="color: white;" href={{"delete/". Session::get('user')['id']}}>Delete</a></button></td>

                    </tr>
                    @endforeach

                    </table>

                    @else {{''}}
                    @endif
          </div>
          <br><br><br><br><br>
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
