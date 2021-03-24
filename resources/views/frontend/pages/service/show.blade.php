@extends('frontend.layouts.master')

@section('title')
    Service | Show
@endsection

@section('style')
    <style>
        .about-area h1{
            text-align: center;
            margin-bottom: 20px;
            color: #377FB0;
        }
    </style>
@endsection

@section('content')

    <!--================Header Menu Area =================-->
    <header class="header_area" style="background-color: #272F39;position: fixed">
        @include('frontend.partials.nav')
    </header>
    <!--================Header Menu Area =================-->

    @php
        $common_banner = App\Models\CommonBanner::first();
    @endphp
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center" style="background-image: url({{ asset('images/banners/common-banner/'.$common_banner->image) }});">
            <div class="container">
                <div class="banner_content text-right">
                    <h1>Services Details</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('service') }}">Services</a>
                        <a href="#">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================ Start About Area =================-->
    <section class="about-area section_gap gray-bg mt-5">
        <div class="container">
            <h1 style="margin-bottom: 50px">Service Details</h1>
            <hr>
            <div class="row align-items-center justify-content-between mt-5">
                <div class="col-lg-3 about-left">
                    <img class="img-fluid" src="{{ asset('images/services/'.$service->icon) }}" alt="BarisalGeek">
                </div>
                <div class="col-lg-9 col-md-12 about-right">
                    <div class="main-title text-left">

                        <h3>{{ $service->title }}</h3>
                    </div>
                    <div class="mb-50 wow fadeIn" data-wow-duration=".8s">
                        {!! $service->description !!}
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