@extends('frontend.layouts.master')

@section('title')
    Gallery
@endsection

@section('style')
    <style>
        #gallery-img .col-md-4{
            border: 1px solid #ddd;
            padding: 10px;
        }
        #gallery-img .figure{
            position: relative;
            top: 0;
            left: 0;
        }
        #gallery-img .figure .figure-caption{
            position: absolute;
            top: 50%;
            left: 50%;
            height: 100%;
            width: 100%;
            background-color: rgba(0,0,0,0.5);
            transform: translate(-50%,-50%);
            display: none;
        }

        #gallery-img .figure .figure-caption i{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: #fff;
        }

        #gallery-img .figure:hover .figure-caption{
            display: block;
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
                    <h1>Gallery</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('gallery') }}">Gallery</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Gallery Area =================-->
    <section class="section_gap gallery_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Image <span style="color:#377FB0;">Gallery</span></h1>
                        <p>Hei You can see here our image gallery.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="gallery-img">
            <div class="row my-5">
                @foreach($galleries as $gallery)
                <div class="col-md-4">
                    <figure class="figure m-0">
                        <img src="{{ asset('images/gallery/'.$gallery->image) }}" class="figure-img  rounded m-0 p-0" alt="BarisalGeek" height="235px" width="360px">
                        <figcaption class="figure-caption">
                            <a class="example-image-link" href="{{ asset('images/gallery/'.$gallery->image) }}" data-lightbox="example-1"><i class="fa fa-search-plus fa-2x"></i></a>
                        </figcaption>
                    </figure>
                    <span class="caption">{{ $gallery->caption }}</span>
                </div>
               @endforeach
            </div>
        </div>
    </section>
    <!--================Gallery Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection