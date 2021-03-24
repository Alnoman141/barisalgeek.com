@extends('frontend.layouts.master')

@section('title')
    About
@endsection

@section('style')
    <style>
        .row.heading h2 {
            color: #fff;
            font-size: 52.52px;
            line-height: 95px;
            font-weight: 400;
            text-align: center;
            margin: 0 0 40px;
            padding-bottom: 20px;
            text-transform: uppercase;
        }
        ul{
            margin:0;
            padding:0;
            list-style:none;
        }
        .heading.heading-icon {
            display: block;
        }
        .padding-lg {
            display: block;
            padding-top: 60px;
            padding-bottom: 60px;
        }
        .practice-area.padding-lg {
            padding-bottom: 55px;
            padding-top: 55px;
        }
        .practice-area .inner{
            border:1px solid #999999;
            text-align:center;
            margin-bottom:28px;
            padding:40px 25px;
        }
        .our-webcoderskull .cnt-block:hover {
            box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
            border: 0;
        }
        .practice-area .inner h3{
            color:#3c3c3c;
            font-size:24px;
            font-weight:500;
            font-family: 'Poppins', sans-serif;
            padding: 10px 0;
        }
        .practice-area .inner p{
            font-size:14px;
            line-height:22px;
            font-weight:400;
        }
        .practice-area .inner img{
            display:inline-block;
        }


        /*.our-webcoderskull{*/
            /*background: #377FB0;*/

        /*}*/
        .our-webcoderskull .cnt-block{
            float:left;
            width:100%;
            background:#fff;
            padding:30px 20px;
            text-align:center;
            border:2px solid #d5d5d5;
            margin: 0 0 28px;
        }
        .our-webcoderskull .cnt-block figure{
            width:148px;
            height:148px;
            border-radius:100%;
            display:inline-block;
            margin-bottom: 15px;
        }
        .our-webcoderskull .cnt-block img{
            width:148px;
            height:148px;
            border-radius:100%;
        }
        .our-webcoderskull .cnt-block h3{
            color:#2a2a2a;
            font-size:20px;
            font-weight:500;
            padding:6px 0;
            text-transform:uppercase;
        }
        .our-webcoderskull .cnt-block h3 a{
            text-decoration:none;
            color:#2a2a2a;
        }
        .our-webcoderskull .cnt-block h3 a:hover{
            color:#337ab7;
        }
        .our-webcoderskull .cnt-block p{
            color:#2a2a2a;
            font-size:13px;
            line-height:20px;
            font-weight:400;
        }

        .owl-prev, .owl-next{
            display: none !important;
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
                    <h1>About Us</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('about') }}">About</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start About Area =================-->
    <section class="about-area section_gap gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 about-left">
                    <img class="img-fluid" src="{{ asset('images/about/'.$about->image) }}" alt="BarisalGeek-Al-Imran">
                    <span>Founder</span>
                </div>
                <div class="col-lg-6 col-md-12 about-right">
                    <div class="main-title text-left">
                        <h1>about <span style="color:#377FB0;">myself</span></h1>
                    </div>
                    <div class="mb-50 wow fadeIn" data-wow-duration=".8s">
                        {!! str_limit($about->page_content,1000) !!}
                    </div>
                    <a href="{{ route('about.show',$about->id) }}" class="primary-btn">More Info</a>
                </div>
            </div>
        </div>
    </section>
    <!--================ End About Area =================-->
    @foreach(App\Models\BgImages::first()->get() as $bg)
    <section class="our-webcoderskull padding-lg parallax-window" data-parallax="scroll"  data-image-src='{{ asset('images/bg/'.$bg->about_bg) }}'>
    @endforeach
        @php
            $teams = App\Models\Team::orderBy('id','desc')->get();
            $teams_row = count($teams);

        @endphp
        <div class="container">
            <div class="row heading heading-icon">
                <h2>My Creative <span style="color:#377FB0;">Team</span></h2>
            </div>
            <ul class="{{ $teams_row > 3?'owl-carousel owl-theme':'row' }}">
                @foreach(App\Models\Team::orderBy('id','desc')->get() as $team)
                <li class="{{ $teams_row < 3?'col-md-4':'' }}">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="{{ asset('images/about/team/'.$team->image) }}" class="img-responsive" alt="BarisalGeek-Team" ></figure>
                        <h3 style="color: #377FB0">{{ $team->name }} </h3>
                        <h4>{{ $team->	designation }}</h4>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!--================ Start Testimonial Area =================-->


    <!--================ Start Footer Area =================-->
    <footer class="footer_area ">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <script>
        $('.parallax-window').parallax({
            naturalWidth: 600,
            naturalHeight: 400
        });
    </script>
@endsection