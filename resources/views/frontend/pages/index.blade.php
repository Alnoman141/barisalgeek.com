@extends('frontend.layouts.master')

@section('title')
    Home
@endsection

@section('style')
    <style>
        .parallax-window {
            min-height: 400px;
            background: transparent;
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

    @include('frontend.partials.banner')

    <!--================End Home Banner Area =================-->

    <!--================ Start Service Area =================-->

    <section class="section_gap portfolio_area gray-bg" id="service">
        @php
            $services = App\Models\Service::orderBy('id','desc')->get();
            $services_row = count($services);

        @endphp
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Our <span style="color:#377FB0;">Services</span></h1>
                        <p>We are providing all of this services and supports.Please contact with us if you need any of them.</p>
                    </div>
                </div>
            </div>

            <div class="{{ $services_row > 3?'owl-carousel owl-theme':'row' }}">

                @foreach($services as $service)
                    <div class="{{ $services_row < 3?'col-md-4':'' }}">
                        <div class="card border-0">
                            <div class="card-body">
                                <img src="{{ asset('images/services/'.$service->icon) }}" height="100px;" class="d-flex justify-content-center ml-auto mr-auto" alt="BarisalGeek">
                                <h4 class="card-title text-center text-uppercase mt-3">{{ $service->title }}</h4>
                                <p class="card-text">{!! str_limit($service->description,150) !!}</p>
                                <a href="{{ route('service.show',$service->slug) }}" class="btn btn-sm btn-info text-white">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!--================ End Service Area =================-->

    <!--================ Start Portfolio Area =================-->
    <section class="section_gap portfolio_area" id="work" style="background:#e7e7e7" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Latest <span style="color:#377FB0;">Works</span></h1>
                        <p>Here you can see all of my works which projects I have done in various marketplace.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="projects_fillter">
                        <ul class="filter list" id="filters">
                            <li class="active" data-filter="*">All Categories</li>
                            @foreach(App\Models\Category::orderBy('name','asc')->get() as $category)
                                <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="projects_inner row grid" >
                <div class="grid-sizer"></div>
                @foreach($portfolios as $portfolio)
                    <div class="col-md-3 col-sm-12 {{ $portfolio->category->slug }} element-item transition" id="portfolio_card" data-category="transition">
                        <div class="projects_item">
                            <img class="img-fluid w-100 p-3" src="{{ asset('images/portfolio/'.$portfolio->images->first()->image) }}" alt="{{ $portfolio->title }}">
                            <div class="projects_text">
                                <a href="{{ route('portfolio.show',$portfolio->id) }}">
                                    <h4>{{ $portfolio->category->name }}</h4>
                                </a>
                                <p>{{ $portfolio->project_type }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Portfolio Area =================-->

    <!--================ Start About Area =================-->
    @php
     $about = App\Models\About::first();
    @endphp
    <section class="about-area section_gap gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 about-left">
                    <img class="img-fluid" src="{{ asset('images/about/'.$about->image) }}" alt="About-Me-Image">
                    <span>Founder</span>
                </div>
                <div class="col-lg-6 col-md-12 about-right">
                    <div class="main-title text-left">
                        <h1>about <span style="color:#377FB0;">myself</span></h1>
                    </div>
                    <div class="mb-50 wow fadeIn" data-wow-duration=".8s">
                        {!! str_limit($about->page_content,1000) !!}
                    </div>
                    <a href="{{ route('about.show',$about->id) }}" class="primary-btn">More Info</a>
                </div>
            </div>
        </div>
    </section>
    <!--================ End About Area =================-->

    <!--================ Start Testimonial Area =================-->
    @foreach(App\Models\BgImages::first()->get() as $bg)
    <div class="section_gap testimonial_area parallax-window"  data-parallax="scroll"  data-image-src='{{ asset('images/bg/'.$bg->portfolio_bg) }}'>
    @endforeach
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1 style="color: #fff;">What Client <span style="color:#377FB0;">Says</span></h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 text-left">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">

                        <div class="carousel-inner">
                            @foreach(App\Models\Testimonial::orderBy('id','desc')->where('status',1)->get() as $review)
                            <div class="carousel-item {{ $loop->index == 0?'active':'' }}">
                                <img src="{{ asset('images/testimonial/review/'.$review->picture) }}" class="d-block w-100" alt="BarisalGeek" height="420px">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="testimonial_logos">
                        <div class="top_logos">
                            <img src="{{ asset('images/Brand-Logo/99design.png') }}" alt="BarisalGeek" data-toggle="tooltip" data-placement="top" title="99 Design Profile">
                            <img src="{{ asset('images/Brand-Logo/fiverr.png') }}" alt="BarisalGeek" height="24px" alt="" data-toggle="tooltip" data-placement="top" title="Fiverr Profile">
                        </div>
                        <div class="mid_logo">
                            <img src="{{ asset('images/Brand-Logo/upwork.svg') }}" alt="BarisalGeek" height="40px" data-toggle="tooltip" data-placement="top" title="Upwork Profile">
                        </div>
                        <div class="bottom_logos jus">
                            <img src="{{ asset('images/Brand-Logo/designcrowd.svg') }}" alt="BarisalGeek" height="20px" data-toggle="tooltip" data-placement="top" title="Design Crowd Profile" width="82px">
                            <img src="{{ asset('images/Brand-Logo/behance.png') }}" alt="BarisalGeek" data-toggle="tooltip" data-placement="top" title="Behance Profile" height="20px" width="82px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ End Testimonial Area =================-->

    <!--================ Start Newsletter Area =================-->
    @foreach(App\Models\BgImages::first()->get() as $bg)
    <section class="section_gap newsletter-area" style="background-image: url({{ asset('images/bg/'.$bg->subscribe_bg) }})">
    @endforeach
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Stay <span style="color:#377FB0;">With Us</span></h1>
                        <p>Please subscribe to know about our various activities and get all updates.</p>
                    </div>
                </div>
            </div>
            <div class="row newsletter_form justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="d-flex flex-row" id="">
                        {{--@include('global.msg')--}}
                        <form class="w-100" action="{{ route('subscriber.store') }}" method="post" id="form">
                            @csrf
                            <div class="navbar-form">
                                <div class="input-group add-on">
                                    <input class="form-control" name="email" placeholder="Your email address"  type="email">

                                    <div class="input-group-btn">
                                        <button class="genric-btn text-uppercase">
                                            Subscribe
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="info mt-20"></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Newsletter Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection

@section('script')
    <script>
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows',
            getSortData: {
                name: '.name',
                symbol: '.symbol',
                number: '.number parseInt',
                category: '[data-category]',
                weight: function( itemElem ) {
                    var weight = $( itemElem ).find('.weight').text();
                    return parseFloat( weight.replace( /[\(\)]/g, '') );
                }
            }
        });
        // filter functions
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt( number, 10 ) > 50;
            },
            // show if name ends with -ium
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match( /ium$/ );
            }
        };

        // bind filter button click
        $('#filters').on( 'click', 'li', function() {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
        });

        // bind sort button click
        $('#sorts').on( 'click', 'li', function() {
            var sortByValue = $(this).attr('data-sort-by');
            $grid.isotope({ sortBy: sortByValue });
        });

        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <script>
        $('.parallax-window').parallax({
            naturalWidth: 600,
            naturalHeight: 400
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

@endsection