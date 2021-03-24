@extends('frontend.layouts.master')

@section('title')
    Portfolio
@endsection

@section('content')

    <!--================Header Menu Area =================-->
    <header class="header_area" style="background-color: #272F39;position: fixed">
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
                    <h1>FFQ</h1>
                    <div class="page_link">
                        <a href="{{ route('index') }}">Home</a>
                        <a href="{{ route('ffq') }}">FFQ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Portfolio Area =================-->
   <section class="mt-5 section_gap">
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-lg-6 text-center">
                   <div class="main-title">
                       <h1>FFQ</h1>
                       <p>Hei here is some frequently asking questions for you.Please check those questions and get your answers</p>
                   </div>
               </div>
           </div>

           <div class="accordion" id="accordionExample">

               @foreach($ffqs as $ffq)
               <div class="card">
                   <div class="card-header" id="headingThree">
                       <h2 class="mb-0">
                           <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $loop->index+1 }}" aria-expanded="false" aria-controls="collapseThree">
                               Q - {{ $loop->index+1 }} : {{ $ffq->question }}
                           </button>
                       </h2>
                   </div>
                   <div id="collapse{{ $loop->index+1 }}" class="collapse" aria-labelledby="heading{{ $loop->index+1 }}" data-parent="#accordionExample">
                       <div class="card-body ml-5 pl-5">
                           {!! $ffq->answer !!}
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