@extends('frontend.layouts.master')

@section('title')
    Course | Details
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
                    <h1>Course Details</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('course') }}">Course</a>
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
                        <h1>Course Detail's</h1>
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
                                    <img src="{{ asset('images/course/'.$course->image) }}" alt="BarisalGeek" height="200px">
                                </div>
                                <hr>

                                <!-- Content -->
                                <div class="card-body pt-3">
                                    <h2>Course Information </h2>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Name :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->name }}</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Topic :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->course_topic}}</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Outline :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {!! $course->outline !!}</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Duration :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->duration}} Hours</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Total Classes :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->class_number}} Classes</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Price :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->price}} Tk</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Offer Price :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->offer_price}} Tk</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Class Days :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->class_day}} </h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Time :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->class_time}} </h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Durations :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->class_duration}} Hours</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Seats :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <h4> {{$course->seats}} Hours</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Course Description :</h4>
                                        </div>
                                        <div class="col-md-7">
                                            {!! $course->description !!}
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Class Starts From:</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <span> {{$course->class_starts }}</span>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <h4>Class Ends At:</h4>
                                        </div>
                                        <div class="col-md-7">
                                            <span> {{$course->class_ends }}</span>
                                        </div>
                                    </div>
                                    <hr>

                                </div>

                            </div>
                            <!-- Front Side -->
                        </div>
                    </div>
                    <!-- Rotating card -->
                    <a class="btn btn-sm btn-info" href="{{ route('course') }}" style="float: right">Go Back</a>
                </div>
            </div>
        </div>
    </section>
    <!--================Course Area =================-->

    <!--================ Start Testimonial Area =================-->
    <section class="section_gap gallery_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1><span style="color:#377FB0;">{{ $course->name }}</span> Success</h1>
                        <div class="">
                            <p>Hei You can see here our image gallery.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" id="gallery-img">
                <div class="row my-5">
                    @foreach(App\Models\Success::orderBy('id','desc')->where('course_id',$course->id)->get() as $success)
                        <div class="col-md-4 ">
                            <figure class="figure m-0">
                                <img src="{{ asset('images/success/'.$success->image) }}" class="figure-img  rounded m-0 p-0" alt="BarisalGeek" height="235px" width="360px">
                                <figcaption class="figure-caption">
                                    <a class="example-image-link" href="{{ asset('images/success/'.$success->image) }}" data-lightbox="example-1"><i class="fa fa-search-plus fa-2x"></i></a>
                                </figcaption>
                            </figure>
                            <span class="caption" style="display: flex;align-items: center">
                                <img src="{{ asset('images/student/'.$success->student->image) }}" alt="BarisalGeek" class="mt-3" width="30px" style="border-radius: 50%">
                                <span class="m-3 mt-4"> {{ $success->student->first_name .' '.$success->student->last_name }}</span>
                        </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!--================ End Testimonial Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection