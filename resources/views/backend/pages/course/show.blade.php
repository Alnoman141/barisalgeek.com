@extends('backend.layouts.master')
@section('title')
    | Course | Show
@endsection
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')

@endsection
@section('content')
    <div class="container-scroller">
        @include('backend.partials.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.partials.sidenav')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Course Details </h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.course.index') }}" class="btn btn-info m-2">Course List</a>
                            </div>
                        </div>
                        <hr>
                        @include('global.msg')
                        <div style="width: 800px;margin: 0 auto;height: auto">
                            <!-- Rotating card -->
                            <div class="card-wrapper ">
                                <div id="card-1" class="card card-rotating">

                                    <!-- Front Side -->
                                    <div class="face front pt-3">

                                        <!-- Avatar -->
                                        <div class="avatar mx-auto white text-center">
                                            <img src="{{ asset('images/course/'.$course->image) }}" height="250px">
                                        </div>
                                        <hr>

                                        <!-- Content -->
                                        <div class="card-body pt-3">
                                            <h2>Basic Information </h2>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.footer')
@endsection
