@extends('frontend.layouts.master')

@section('title')
    About
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
                    <h1>About Myself</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('about') }}">About</a>
                        <a href="#">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <!--================ Start About Area =================-->
    <section class="about-area section_gap gray-bg mt-5" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 about-left">
                    <img class="img-fluid" src="{{ asset('images/about/'.$about->image) }}" alt="BarisalGeek-Al-Imran">
                    <span>Founder</span>
                </div>
                <div class="col-lg-6 col-md-12 about-right">
                    <div class="main-title text-left">
                        <h1>about myselt</h1>
                    </div>
                    <div class="mb-50 wow fadeIn" data-wow-duration=".8s">
                        {!! $about->page_content,1000 !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End About Area =================-->


    <!--================ Start Footer Area =================-->
    <footer class="footer_area ">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection