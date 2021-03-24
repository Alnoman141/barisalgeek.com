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
                    <h1>My Portfolio</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('portfolio') }}">Portfolio</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
   
    <!--================ Start Portfolio Area =================-->
    <section class="section_gap portfolio_area" id="work">
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
            <div class="projects_inner row grid">
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
@endsection