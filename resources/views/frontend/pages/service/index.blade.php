@extends('frontend.layouts.master')

@section('title')
    Services
@endsection

@section('style')
    <style>
        .col-md-4{
            margin: 15px 0px;
        }
    </style>
@endsection
@section('content')

    <!--================Header Menu Area =================-->
    <header class="header_area">
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
                    <h1>Services</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('service') }}">Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Service Area =================-->
    <section class="section_gap portfolio_area gray-bg pb-0" id="service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Our <span style="color:#377FB0;">Services</span></h1>
                        <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may
                            see some for as low as $.17 each.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card border-0">
                        <div class="card-body">
                            <img src="{{ asset('images/services/'.$service->icon) }}" height="100px;" class="d-flex justify-content-center ml-auto mr-auto" alt="BarisalGeek">
                            <h4 class="card-title text-center text-uppercase mt-3" >{{ $service->title }}</h4>
                            <p class="card-text">{!! str_limit($service->description,150) !!}</p>
                            <a href="{{ route('service.show',$service->slug) }}" class="btn btn-sm btn-info text-white">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Service Area =================-->

    <!--================ Start Testimonial Area =================-->
    <div class="section_gap testimonial_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-left">
                    <div class="active_testimonial owl-carousel" data-slider-id="1">
                        <!-- single testimonial -->
                        <div class="single_testimonial">
                            <div class="testimonial_head">
                                <img src="img/quote.png" alt="">
                                <h4>Fanny Spencer</h4>
                                <div class="review">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about
                                    it, you travel across her face</p>
                            </div>
                        </div>

                        <div class="single_testimonial">
                            <div class="testimonial_head">
                                <img src="img/quote.png" alt="">
                                <h4>Fanny Spencer</h4>
                                <div class="review">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about
                                    it, you travel across her face</p>
                            </div>
                        </div>

                        <div class="single_testimonial">
                            <div class="testimonial_head">
                                <img src="img/quote.png" alt="">
                                <h4>Fanny Spencer</h4>
                                <div class="review">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about
                                    it, you travel across her face</p>
                            </div>
                        </div>

                        <div class="single_testimonial">
                            <div class="testimonial_head">
                                <img src="img/quote.png" alt="">
                                <h4>Fanny Spencer</h4>
                                <div class="review">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about
                                    it, you travel across her face</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="testimonial_logos">
                        <div class="top_logos">
                            <img src="img/brands/logo1.png" alt="">
                            <img src="img/brands/logo2.png" alt="">
                        </div>
                        <div class="mid_logo">
                            <img src="img/brands/logo3.png" alt="">
                        </div>
                        <div class="bottom_logos jus">
                            <img src="img/brands/logo4.png" alt="">
                            <img src="img/brands/logo5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ End Testimonial Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area ">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection