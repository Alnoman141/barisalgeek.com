@extends('frontend.layouts.master')

@section('title')
    Contact
@endsection

@section('style')
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
                    <h1>Contact</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Write To<span style="color:#377FB0;"> Us</span></h1>
                        <p>Let us know any questions, complaints or opinions</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @foreach(App\Models\ContactInfo::first()->get() as $contact)
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>{{ $contact->city }}, {{ $contact->country }}</h6>
                            <p>{{ $contact->street_address }}</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">{{ $contact->phone }}</a></h6>
                            <p>Call me </p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">{{ $contact->email }}</a></h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-9">

                    <form class="row contact_form" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" required  placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" required placeholder="Enter Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="primary-btn"><span>Send Message</span></button>
                        </div>
                    </form>
                </div>
            </div>

            {{--<div id="map" class="mapBox" ></div>--}}
        </div>


    </section>
    <!--================Contact Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer_area">
        @include('frontend.partials.footer')
    </footer>
    <!--================End Footer Area =================-->
@endsection
@section('script')
    {{--<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyDTFAh4J8Z6uE66DlQtFqJGBn1vFMLhSss" async="" defer="defer" type="text/javascript"></script>
    {{--<script>--}}
        {{--CKEDITOR.replace( 'message' );--}}
    {{--</script>--}}

    <script type="text/javascript">
        var map;
        $(document).ready(function(){
            var map = new GMaps({
                el: '#map',
                lat: 22.7081406,
                lng: 90.3620451
            });

            GMaps.geolocate({
                success: function(position){
                    map.setCenter(position.coords.latitude, position.coords.longitude);
                },
                error: function(error){
                    alert('Geolocation failed: '+error.message);
                },
                not_supported: function(){
                    alert("Your browser does not support geolocation");
                },
                always: function(){
                    alert("Done!");
                }
            });
        });
    </script>

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