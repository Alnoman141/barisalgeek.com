<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BarisalGeek - Admin - @yield('title')</title>

    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

    @include('backend.partials.css')

</head>

<body>
<div class="preloader">
    <!--Background Image Add in preloader-spinner Class -->
    <div class="preloader-spinner"></div>
</div>
@yield('content')
<!-- container-scroller -->

@include('backend.partials.js')
</body>

</html>