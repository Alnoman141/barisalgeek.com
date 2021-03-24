<!-- css -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/backend/style.css') }}">
<!-- endcss -->
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
