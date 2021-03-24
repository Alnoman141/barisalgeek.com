<!-- plugins:js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('js/backend/off-canvas.js') }}"></script>
<script src="{{ asset('js/backend/misc.js') }}"></script>
{{--<!-- endinject -->--}}
<!-- Custom js for this page-->
<script src="{{ asset('js/backend/dashboard.js') }}"></script>
<!-- End custom js for this page-->
<script type="text/javascript">
    /***
     Preloader
     ***/
    $('body').addClass('preloader-active');

    $(window).on('load', function() {
        jQuery('.preloader').fadeOut();
        $('.preloader-spinner').delay(350).fadeOut('slow');
        $('body').removeClass('preloader-active');
    });
</script>
@yield('script')