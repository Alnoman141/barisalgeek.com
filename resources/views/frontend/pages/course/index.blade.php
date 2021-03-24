@extends('frontend.layouts.master')

@section('title')
    Course
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
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
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
                    <h1>Courses</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('course') }}">Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->


    {{--<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">--}}
        {{--<div class="toast-header">--}}
        {{--</div>--}}
        {{--<div class="toast-body">--}}
            {{--@include('global.msg')--}}
        {{--</div>--}}
    {{--</div>--}}


    <!--================ Start Course Area =================-->
    <section class="section_gap portfolio_area gray-bg pb-0" id="service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Our Courses</h1>
                        <p>You can see here all of our courses that you provide in offline.You can register for any course from here.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- course Single -->
                @foreach($courses as $course)
                    @php
                        $sum = $course->price-$course->offer_price;
                        $discount = ($sum * 100)/ $course->price;
                    @endphp
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="course course-single">
                        <div class="course-thumb">
                            <div class="course-label">
                                @if(!is_null($course->offer_price))
                                <span class="sale">{{number_format($discount) }}% OFF</span>
                                @endif
                            </div>
                            <a href="{{ route('course.show',$course->slug) }}" class="main-btn quick-view btn btn-info"><i class="fa fa-search-plus"></i> Quick view</a>
                            <img src="{{ asset('images/course/'.$course->image) }}" alt="BarisalGeek" height="210px" width="350px" class="p-3">
                        </div>
                        <div class="course-body">
                            @if(!is_null($course->offer_price))
                            <h3 class="course-price">{{ $course->offer_price }} Tk<del class="course-old-price text-danger">{{ $course->price }}Tk</del></h3>
                            @else
                            <h3 class="course-price">{{ $course->price }} Tk</h3>
                            @endif
                            <h2 class="course-name"><a href="#">{{ $course->name }}</a></h2>
                            <div class="course-btns">
                                <a href="#exampleModal{{ $course->id }}" data-toggle="modal" data-target="#exampleModal{{ $course->id }}"  class="primary-btn add-to-cart btn-sm"><i class="fas fa-user-plus mr-2"></i> Register Course</a>
                            </div>
                        </div>
                    </div>
                </div>
                    {{--Modal Form--}}
                    <div class="modal fade" id="exampleModal{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 80px">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Register Course</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('register.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Full Name: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email : <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone" class="col-form-label">Phone Number : <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="phone" name="phone" required>
                                        </div>
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" >Register</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- /course Single -->
                <div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>
            </div>
        </div>
    </section>
    <!--================ End Course Area =================-->


    <!--================ Start Footer Area =================-->
    <footer class="footer_area ">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>

        @if ($errors->any())

           @foreach ($errors->all() as $error)
                 toastr.error("{{ $error }}");
            @endforeach

         @endif

        @if(Session::has('message'))
        var type="{{Session::get('alert-type','success')}}"


        switch(type){
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    <script>
        $('.toast').toast(option)
    </script>

@endsection