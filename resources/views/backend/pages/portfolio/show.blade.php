@extends('backend.layouts.master')
@section('title')
    | Portfolio | Show
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
                                <h2>Portfolio Details </h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-info m-2">Portfolio List</a>
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
                                                    @foreach(App\Models\PortfolioImage::where('portfolio_id',$portfolio->id)->get() as $image)
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->index == 0?'active':'' }}"></li>
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner">
                                                    @foreach(App\Models\PortfolioImage::where('portfolio_id',$portfolio->id)->get() as $image)
                                                        <div class="carousel-item {{ $loop->index == 0?'active':'' }}">
                                                            <img src="{{ asset('images/portfolio/'.$image->image) }}" class="d-block w-100" alt="{{ $image->image }}" height="350px" width="150px">
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
                                                    <h4>Title :</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4> {{$portfolio->title }}</h4>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Portfolio Category :</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4> {{$portfolio->category->name}}</h4>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Portfolio Description :</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    {!! $portfolio->description !!}
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Portfolio Rating :</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    @if($portfolio->rating == 1)
                                                       <i class="fas fa-star"></i>
                                                    @elseif($portfolio->rating == 2)
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    @elseif($portfolio->rating == 3)
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    @elseif($portfolio->rating == 4)
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    @elseif($portfolio->rating == 5)
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                     @endif
                                                </div>
                                            </div>
                                            <hr>


                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Website Name:</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <span> {{$portfolio->website }}</span>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Website Name:</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <span> {{$portfolio->project_type }}</span>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Tags:</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    @foreach(explode(',',$portfolio->tags) as $tags)
                                                    <span class="badge badge-info">{!! $tags !!}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Project Completed At:</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4> {{$portfolio->completed}}</h4>
                                                </div>
                                            </div>
                                            <hr>


                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4>Portfolio Added BY :</h4>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4> {{$portfolio->admin->username}}</h4>
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
