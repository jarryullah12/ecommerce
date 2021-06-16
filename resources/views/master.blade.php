<!DOCTYPE html>
<html lang="en">








<body>
    {{ View::make('header')}}


    @yield('content')
    {{ View::make('footer')}}

</body>

<script src="{{asset('nowcommercestyle/contentstyle/js/jquery.min.js')}}"></script>
  <script src="{{asset('nowcommercestyle/contentstyle/js/popper.min.js')}}"></script>
  <script src="{{asset('nowcommercestyle/contentstyle/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('nowcommercestyle/contentstyle/js/jquery-3.0.0.min.js')}}"></script>
  <script src="{{asset('nowcommercestyle/contentstyle/js/plugin.js')}}"></script>
  <!-- sidebar -->
  <script src="{{asset('nowcommercestyle/contentstyle/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script src="{{asset('nowcommercestyle/contentstyle/js/custom.js')}}"></script>
  <!-- javascript -->
  <script src="{{asset('nowcommercestyle/contentstyle/js/owl.carousel.js')}}"></script>
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
</html>
