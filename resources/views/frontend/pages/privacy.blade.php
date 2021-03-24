@extends('frontend.layouts.master')

@section('title')
    Privacy & Policy
@endsection

@section('content')

    <!--================Header Menu Area =================-->
    <header class="header_area" style="background-color: #272F39;position: fixed">
        @include('frontend.partials.nav')
    </header>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    @php
        $common_banner = App\Models\CommonBanner::first();
    @endphp
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center" style="background-image: url({{ asset('images/banners/common-banner/'.$common_banner->image) }});">
            <div class="container">
                <div class="banner_content text-right">
                    <h1>Privacy & Policy</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('privacy') }}">Privacy & Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Portfolio Area =================-->
    <section class="mt-5 section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Privacy & Policy</h1>
                        <p>Hei here is some frequently asking questions for you.Please check those questions and get your answers</p>
                    </div>
                </div>
            </div>

            <div class="accordion" id="accordionExample">
                 {!! $privacy->page_content !!}
            </div>

        </div>
    </section>
    <!--================ End Portfolio Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection