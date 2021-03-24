<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/lightbox.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/flaticon/flaticon.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!-- main css -->
<link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
<style type="text/css">
    /*
    Preloader
    */
    body.preloader-active {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999999999;
        overflow: hidden;
    }
    .preloader {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background: #fff;
        z-index: 9999999999;
    }
    .preloader-spinner {
        background: url('{{ asset('images/preloader/preloader1.gif') }}') no-repeat center center;
        width: 100px;
        height: 100px;
        left: 50%;
        top: 50%;
        margin-top: -50px;
        margin-left: -50px;
        position: absolute;
    }
  </style>
@yield('style')