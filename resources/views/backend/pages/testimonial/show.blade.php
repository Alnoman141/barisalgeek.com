@extends('backend.layouts.master')
@section('title')
    | Testimonial | Show
@endsection
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
    <style>
        .carousel-control-prev-icon, .carousel-control-next-icon{
            background-color: #000;
        }
        .fa-star{
            color: #ffc000;
        }
    </style>
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
                                <h2>Testimonial Details </h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-info m-2">Testimonial List</a>
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
                                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @foreach(App\Models\TestimonialImage::where('testimonial_id',$testimonial->id)->get() as $image)
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->index == 0?'active':'' }}"></li>
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner">
                                                    @foreach(App\Models\TestimonialImage::where('testimonial_id',$testimonial->id)->get() as $image)
                                                        <div class="carousel-item {{ $loop->index == 0?'active':'' }}">
                                                            <img src="{{ asset('images/testimonial/'.$image->image) }}" class="d-block w-100" alt="{{ $image->image }}" height="350px" width="150px">
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
                                            <h2>Basic Information </h2>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Testimonial Category :</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4> {{$testimonial->category->name}}</h4>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Testimonial Market:</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <img src="{{ asset('images/testimonial/sitelogo/'.$testimonial->site_logo) }}" height="80px">
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Testimonial Image:</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <img src="{{ asset('images/testimonial/review/'.$testimonial->picture) }}" height="180px">
                                                </div>
                                            </div>
                                            <hr>


                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Testimonial Details:</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4>{!! $testimonial->details !!}</h4>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Project Done At:</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4>{{ $testimonial->done_at }}</h4>
                                                </div>
                                            </div>
                                            <hr>


                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Testimonial Added BY :</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4> {{$testimonial->admin->username}}</h4>
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
