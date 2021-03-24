<!doctype html>
<html lang="en">

<head>

    @include('frontend.partials.meta')

    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <title>BrisalGeek | @yield('title')</title>
    @include('frontend.partials.css')
</head>

<body>
 <div class="preloader">
    <!--Background Image Add in preloader-spinner Class -->
    <div class="preloader-spinner"></div>
</div>
 @php
//set headers to NOT cache a page
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
// Date in the past
//or, if you DO want a file to cache, use:
header("Cache-Control: max-age=2592000");
//30days (60sec * 60min * 24hours * 30days)
@endphp
@yield('content')

@include('frontend.partials.js')
</body>

</html>