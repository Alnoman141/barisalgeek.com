<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('js/frontend/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/frontend/popper.js') }}"></script>
<script src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/frontend/stellar.js') }}"></script>
<script src="{{ asset('js/frontend/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/frontend/lightbox-plus-jquery.min.js') }}"></script>
<script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>

<!--gmaps Js-->
<script src="{{ asset('js/frontend/gmaps.min.js') }}"></script>
<script src="{{ asset('js/frontend/theme.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel();
    });
</script>

<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:3,
                nav:true,
                loop:true
            }
        }
    })
</script>
<script>
    // MDB Lightbox Init
    $(function () {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });
</script>


<script type="text/javascript">
      /***
          Preloader
      ***/
      $('body').addClass('preloader-active');
      
      $(window).on('load', function() { 
          $('.preloader').fadeOut();
          $('.preloader-spinner').delay(350).fadeOut('slow');
          $('body').removeClass('preloader-active');
      });
  </script>
@yield('script')