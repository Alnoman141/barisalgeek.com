<section class="banner-area owl-carousel" id="home">
    @foreach(App\Models\Banner::orderBy('id','desc')->get() as $banner)
    <div class="single_slide_banner slide_bg1" style="background: url('{{ asset('images/banners/'.$banner->image) }}')">
        <div class="container">
            <div class="row fullscreen d-flex align-items-center">
                <div class="banner-content col-lg-12 justify-content-center">
                    <h1>{{ $banner->title }}</h1>
                    <h3>{{ $banner->sub_title }}</h3>
                    <a href="{{ $banner->button_link }}" class="primary-btn">{{ $banner->button_text }}</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>