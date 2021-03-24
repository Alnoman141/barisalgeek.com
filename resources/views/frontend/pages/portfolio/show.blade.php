@extends('frontend.layouts.master')

@section('title')
    Portfolio
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
                    <h1>Portfolio Details</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('portfolio') }}">Portfolio</a>
                        <a href="#">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Portfolio Area =================-->
    <section class="portfolio_details_area section_gap">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <div class="col-md-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach(App\Models\PortfolioImage::where('portfolio_id',$portfolio->id)->get() as $image)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->index == 0?'active':'' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach(App\Models\PortfolioImage::where('portfolio_id',$portfolio->id)->get() as $image)
                                    <div class="carousel-item {{ $loop->index == 0?'active':'' }}">
                                        <img src="{{ asset('images/portfolio/'.$image->image) }}" class="d-block w-100" alt="BarisalGeek" height="350px" width="150px">
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
                    <div class="offset-md-1 col-md-5">
                        <div class="portfolio_right_text mt-30">
                            <h4>{{ $portfolio->title }}</h4>
                            
                            <ul class="list">
                                <li><span>Rating :</span>
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
                                </li>
                                <li><span>Marketplace</span>: <span> {{$portfolio->website }}</span></li>
                                <li><span>Type</span>: <span> {{$portfolio->project_type }}</span></li>
                                <li><span>Completed</span>: {{$portfolio->completed}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                {!! $portfolio->description !!}
            </div>
        </div>
    </section>
    <!--================ End Portfolio Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection