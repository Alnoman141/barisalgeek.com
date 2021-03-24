<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background: #272F39">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        @foreach(App\Models\Logo::first()->get() as $logo)
        <a class="navbar-brand brand-logo" href="{{ route('admin.index') }}"><img src="{{ asset('images/logo/'.$logo->image) }}" alt="BarisalGeek"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('admin.index') }}"><img src="{{ asset('images/logo/'.$logo->image) }}" alt="BarisalGeek"/></a>
        @endforeach
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

            <li class="nav-item {{ Route::currentRouteName() == 'admin.messages' ? 'active' : ''}}">
                <a href="{{ route('admin.messages') }}" class="nav-link"><i class="fas fa-envelope"></i>Inbox</a>
            </li>

            <li class="nav-item {{ Route::currentRouteName() == 'admin.privilege' ? 'active' : ''}}">
                <a href="{{ route('admin.privilege') }}" class="nav-link"><i class="fas fa-users-cog"></i>Privileges</a>
            </li>

        </ul>
        @php
            $sum = 0;
            $register = App\Models\RegisterStudent::orderBy('id','desc')->where('status',0)->count();
            $subscriptions = App\Models\Subscriber::orderBy('id','desc')->where('status',0)->count();
            $sum = $register + $subscriptions;
        @endphp
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                    <span class="count {{ $sum ==0?'d-none':'' }}">{{ $sum }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list {{ $sum ==0?'d-none':'' }} " aria-labelledby="notificationDropdown" style="overflow-y: auto">
                    <a class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left">You have {{ $sum }} new notifications</p>
                    </a>

                    @foreach(App\Models\RegisterStudent::orderBy('id','desc')->where('status',0)->get() as $register)
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.register.student.index') }}" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="fas fa-user-ninja mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium">New Student Register</h6>
                                <p class="font-weight-light small-text">{{ $register->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @endforeach
                    @foreach(App\Models\Subscriber::orderBy('id','desc')->where('status',0)->get() as $subscribers)
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.subscriber.index') }}" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="fas fa-user-tie mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium">New Subscriber</h6>
                                <p class="font-weight-light small-text">{{ $subscribers->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-envelope"></i>
                    <span class="count {{ App\Models\Contact::orderBy('id','desc')->where('status',0)->count() == 0?'d-none':'' }}">{{ App\Models\Contact::orderBy('id','desc')->where('status',0)->count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list {{ App\Models\Contact::orderBy('id','desc')->where('status',0)->count() == 0?'d-none':'' }}" aria-labelledby="messageDropdown" style="overflow-y:auto;">
                    <div class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left ">You have {{ App\Models\Contact::orderBy('id','desc')->where('status',0)->count() }} unread Message</p>
                        <a href="{{ route('admin.messages') }}" class="badge badge-info badge-pill float-right">View all</a>
                    </div>

                    @foreach( App\Models\Contact::orderBy('id','desc')->where('status',0)->get() as $message )
                        <div  class="dropdown-divider"></div>
                        <a href="{{ route('admin.message.show',$message->id) }}" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{ asset('images/demo/user.png') }}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow" style="width: 350px;">
                                <h6 class="preview-subject ellipsis font-weight-medium">{{ $message->name }}<span class="float-right font-weight-light small-text">{{ $message->created_at->diffForHumans() }}</span></h6>
                                <p class="font-weight-light small-text">{{ str_limit($message->message,50) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link" href="#">
                    <img class="img-xs rounded-circle" src="{{ asset('images/admins/'.Auth::user()->image) }}" alt="">
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>