<div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            @foreach(App\Models\Logo::first()->get() as $logo)
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('images/logo/'.$logo->image) }}" alt="BarisalGeek" ></a>
            @endforeach
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav justify-content-end">
                    <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : ''}}"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                    <li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : ''}}"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item {{ Route::currentRouteName() == 'portfolio' ? 'active' : ''}}"><a class="nav-link" href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li class="nav-item {{ Route::currentRouteName() == 'review' ? 'active' : ''}}"><a class="nav-link" href="{{ route('review') }}">Review</a></li>
                    <li class="nav-item {{ Route::currentRouteName() == 'gallery' ? 'active' : ''}}"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                    <li class="nav-item {{ Route::currentRouteName() == 'course' ? 'active' : ''}}"><a class="nav-link" href="{{ route('course') }}">Courses</a>
                    <li class="nav-item {{ Route::currentRouteName() == 'batch' ? 'active' : ''}}"><a class="nav-link" href="{{ route('batch') }}">Batch</a></li>
                    <li class="nav-item {{ Route::currentRouteName() == 'contact' ? 'active' : ''}}"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>