@extends('frontend.layouts.master')

@section('title')
    Batch | Students
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

        .course.course-single {
            margin-top: 15px;
            margin-bottom: 15px;
            -webkit-transition: 0.3s all;
            transition: 0.3s all;
        }

        .course.course-single:hover {
            -webkit-box-shadow: 0px 6px 10px -6px rgba(0, 0, 0, 0.175);
            box-shadow: 0px 6px 10px -6px rgba(0, 0, 0, 0.175);
            -webkit-transform: translateY(-4px);
            -ms-transform: translateY(-4px);
            transform: translateY(-4px);
        }

        .course.course-single .course-thumb {
            position: relative;
            margin-bottom: 15px;
        }

        .course.course-single .course-thumb>img {
            width: 100%;
        }

        .course.course-single .course-thumb:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #FFF;
            opacity: 0;
            visibility: hidden;
            z-index: 0;
            -webkit-transition: 0.3s all;
            transition: 0.3s all;
        }

        .course.course-single:hover .course-thumb:after {
            opacity: 0.7;
            visibility: visible;
        }

        .course.course-single .quick-view {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            opacity: 0;
            visibility: hidden;
            z-index: 20;
        }

        .course.course-single:hover .quick-view {
            opacity: 1;
            visibility: visible;
        }

        .course.course-single .course-label {
            position: absolute;
            left: 0;
            top: 0;
        }

        .course.course-single .course-label>span {
            display: block;
        }

        .course.course-single .course-countdown {
            position: absolute;
            left: 0;
            bottom: 0;
            right: 0;
            text-align: center;
        }

        .course.course-single .course-body {
            padding: 15px;
        }

        .course.course-single .course-price {
            display: inline-block;
        }

        .course.course-single .course-rating {
            float: right;
            margin-top: 5px;
        }

        .course.course-single .course-name {
            font-size: 16px;
        }

        .course.course-single .course-btns {
            margin-top: 20px;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: 0.3s all;
            transition: 0.3s all;
        }

        .course.course-single:hover .course-btns {
            opacity: 1;
            visibility: visible;
        }

        /*-- hot course --*/

        .course.course-single.course-hot {
            border: 2px solid #F8694A;
        }

        .course.course-single.course-hot .course-btns {
            opacity: 1;
            visibility: visible;
        }

        .course.course-single .course-label {
            position: absolute;
            left: 0;
            top: 0;
        }

        .course.course-single .course-label>span {
            display: block;
        }

        .course.course-widget .course-thumb {
            position: absolute;
            left: 0;
            top: 0;
            width: 60px;
        }

        .course.course-widget .course-thumb>img {
            width: 100%;
        }

        .course .course-label>span {
            position: relative;
            display: inline-block;
            padding: 5px 15px;
            font-weight: 700;
            color: #FFF;
            background-color: #30323A;
            z-index: 22;
        }

        .course .course-label>span.sale {
            background-color: #377FB0;
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
                    <h1>Batch</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('batch') }}">Batch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Course Area =================-->
    <section class="section_gap portfolio_area gray-bg pb-0" id="service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1><span style="color:#377FB0;">{{ $batch->name }}</span>  Students</h1>
                        <p>This is all of our students list of this batch</p>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Student Id</th>
                        <th scope="col">Course Name</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(App\Models\Student::where('batch_id',$batch->id)->get() as $student)

                        <tr>
                            <th><img src="{{ asset('images/student/'.$student->image) }}" height="40px" alt="BarisalGeek"></th>
                            <td>{{ $student->first_name . ' ' .$student->last_name }}</td>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->course->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </section>
    <!--================ End Course Area =================-->

    <!--================ Start Testimonial Area =================-->
    <section class="section_gap gallery_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1><span style="color:#377FB0;">{{ $batch->name }}</span> Success</h1>
                        <p>Hei You can see here our students success story of this batch.</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="container" id="gallery-img">
            <div class="row my-5">
                @foreach(App\Models\Success::orderBy('id','desc')->where('batch_id',$batch->id)->get() as $success)
                    <div class="col-md-4 my-3">
                        <figure class="figure m-0">
                            <img src="{{ asset('images/success/'.$success->image) }}" alt="BarisalGeek" class="figure-img  rounded m-0 p-0" height="235px" width="360px">
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
    </section>

    <!--================ End Testimonial Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area ">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection