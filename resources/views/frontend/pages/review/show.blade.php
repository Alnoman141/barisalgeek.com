@extends('frontend.layouts.master')

@section('title')
    Reviews
@endsection
@section('style')
    <style>
        #review-img{
            border: 1px solid #ddd;
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
                    <h1>Review Details</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('review') }}">Review</a>
                        <a href="#">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Gallery Area =================-->
    <section class="section_gap gallery_area" style="background: #ddd">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Review Detail's</h1>
                    </div>
                </div>
            </div>
            <div class="row" id="review">
                <div style="width: 800px;margin: 0 auto;height: auto">
                    <!-- Rotating card -->
                    <div class="card-wrapper ">
                        <div id="card-1" class="card card-rotating">

                            <!-- Front Side -->
                            <div class="face front pt-3">

                                <!-- Avatar -->
                                <div class="avatar mx-auto white text-center">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach(App\Models\TestimonialImage::where('testimonial_id',$testimonial->id)->get() as $image)
                                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->index == 0?'active':'' }}"></li>
                                            @endforeach
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach(App\Models\TestimonialImage::where('testimonial_id',$testimonial->id)->get() as $image)
                                                <div class="carousel-item {{ $loop->index == 0?'active':'' }}">
                                                    <img src="{{ asset('images/testimonial/'.$image->image) }}" class="d-block w-100" alt="BarisalGeek" height="350px" width="150px">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <hr>

                                <!-- Content -->
                                <div class="card-body pt-3">
                                    <h2>Project Information </h2>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Project Category :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$testimonial->category->name}}</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Market Place :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <img src="{{ asset('images/testimonial/sitelogo/'.$testimonial->site_logo) }}" alt="BarisalGeek" height="80px">
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row" >
                                        <div class="col-md-5">
                                            <h4>Testimonial Image:</h4>
                                        </div>
                                        <div class="col-md-7" id="review-img">
                                            <figure class="figure m-0">
                                                <img src="{{ asset('images/testimonial/review/'.$testimonial->image) }}" class="figure-img  rounded m-0 p-0" alt="BarisalGeek" height="235px" width="360px">
                                                <figcaption class="figure-caption">
                                                    <a class="example-image-link" href="{{ asset('images/testimonial/review/'.$testimonial->image) }}" data-lightbox="example-1"><i class="fa fa-search-plus fa-2x"></i></a>
                                                </figcaption>
                                            </figure>
                                            <img src="" height="180px">
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Project Details :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$testimonial->details}}</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Project Done At :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$testimonial->done_at}}</h4>
                                        </div>
                                    </div>
                                    <hr>

                                </div>

                            </div>
                            <!-- Front Side -->
                        </div>
                    </div>
                    <!-- Rotating card -->
                    <a class="btn btn-sm btn-info" href="{{ route('review') }}" style="float: right">Go Back</a>
                </div>
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