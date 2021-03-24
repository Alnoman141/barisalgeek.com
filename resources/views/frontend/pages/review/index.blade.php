@extends('frontend.layouts.master')

@section('title')
    Reviews
@endsection

@section('style')
    <style>
        #review-img{
            padding: 10px;
        }
        #review-img .figure{
            position: relative;
            top: 0;
            left: 0;
        }
        #review-img .figure .figure-caption{
            position: absolute;
            top: 50%;
            left: 50%;
            height: 100%;
            width: 100%;
            background-color: rgba(0,0,0,0.5);
            transform: translate(-50%,-50%);
            display: none;
        }

        #review-img .figure .figure-caption i{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: #fff;
        }

        #review-img .figure:hover .figure-caption{
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
                    <h1>Reviews</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('review') }}">Review</a>
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
                        <h1>All <span style="color:#377FB0;">Review</span></h1>
                        <p>Hei You can see of my review where I get in various marketplace.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="review-img">
            <div class="row my-5">
                @foreach($reviews as $review)
                    <div class="col-md-4">
                        <figure class="figure m-0">
                            <img src="{{ asset('images/testimonial/review/'.$review->picture) }}" class="figure-img  rounded m-0 p-0" alt="BarisalGeek" height="235px" width="360px">
                            <figcaption class="figure-caption">
                                <a class="example-image-link" href="{{ asset('images/testimonial/review/'.$review->picture) }}" data-lightbox="example-1"><i class="fa fa-search-plus fa-2x"></i></a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-center"><a class="btn btn-info btn-sm my-3 text-center" href="{{ route('review.show',$review->id) }}">Viw Details</a></div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {{ $reviews->links() }}
        </div>
    </section>
    <!--================Gallery Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area ">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection