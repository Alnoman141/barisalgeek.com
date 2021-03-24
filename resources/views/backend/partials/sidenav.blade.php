<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image"> <img src="{{ asset('images/admins/'.Auth::user()->image) }}" alt="image"/> <span class="online-status online"></span> </div>
                <div class="profile-name">
                    <p class="name">{{ Auth::user()->username }}</p>
                    <p class="designation">{{ Auth::user()->role }}</p>
                    <div class="badge badge-teal mx-auto mt-3">Online</div>
                </div>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}"><img class="menu-icon" src="{{ asset('img/menu-icon/01.png') }}" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{ asset('img/menu-icon/08.png') }}" alt="menu icon"> <span class="menu-title">General Pages</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">

                    @php
                       if (Auth::user()->role == 'Super-Admin'){

                       $logo = App\Models\Logo::first();
                       $about = App\Models\About::first();
                       $contact = App\Models\ContactInfo::first();
                       $social = App\Models\SocialLink::first();
                       $privacy = App\Models\Privacy::first();
                       $condition = App\Models\Condition::first();
                       $common = App\Models\CommonBanner::first();
                       $bg = App\Models\BgImages::first();
                       }elseif (Auth::user()->role == 'Admin'){
                       $privacy = App\Models\Privacy::first();
                       $condition = App\Models\Condition::first();
                       $common = App\Models\CommonBanner::first();
                       $bg = App\Models\BgImages::first();
                    }elseif( Auth::user()->role == 'Author'){
                       $condition = App\Models\Condition::first();
                    }
                    @endphp
                    @if(Auth::user()->role == 'Super-Admin')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.logo.edit',$logo->id) }}">Update Logo</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.about.edit',$about->id) }}">Update About Page</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.social.edit',$social->id) }}">Update Social Links</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.contactinfo.edit',$social->id) }}">Update Contact Info</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.privacy.edit',$privacy->id) }}">Update Privacy Page</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.condition.edit',$condition->id) }}">Update Terms & Conditions Page</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.common_banner.edit',$common->id) }}">Update Common Banner</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.bg.edit',$bg->id) }}">Update Background Images</a></li>
                    @elseif( Auth::user()->role == 'Admin')

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.privacy.edit',$privacy->id) }}">Update Privacy Page</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.condition.edit',$condition->id) }}">Update Terms & Conditions Page</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.common_banner.edit',$common->id) }}">Update Common Banner</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.bg.edit',$bg->id) }}">Update Background Images</a></li>

                    @elseif( Auth::user()->role == 'Author')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.condition.edit',$condition->id) }}">Update Terms & Conditions Page</a></li>
                    @endif

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageAdmin" aria-expanded="false" aria-controls="manageAdmin"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Admins</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageAdmin">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.list') }}">Admin List</a></li>

                    @if(Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin')
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.register.form') }}">Admin Create</a></li>
                    @endif
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageService" aria-expanded="false" aria-controls="manageService"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Service</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageService">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.service.index') }}">Service List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.service.create') }}">Service Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#managePortfolio" aria-expanded="false" aria-controls="managePortfolio"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Portfolio</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="managePortfolio">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.portfolio.index') }}">Portfolio List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.portfolio.create') }}">Portfolio Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageCategory" aria-expanded="false" aria-controls="manageCategory"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Category</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageCategory">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.index') }}">Category List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create') }}">Category Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageTestimonial" aria-expanded="false" aria-controls="manageTestimonial"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Testimonial</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageTestimonial">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.testimonial.index') }}">Testimonial List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.testimonial.create') }}">Testimonial Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageBanner" aria-expanded="false" aria-controls="manageBanner"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Banner</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageBanner">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.banner.index') }}">Banner List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.banner.create') }}">Banner Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageBatch" aria-expanded="false" aria-controls="manageGallery"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Batch</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageBatch">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.batch.index') }}">Batch List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.batch.create') }}">Batch Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageCourse" aria-expanded="false" aria-controls="manageCourse"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Course</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageCourse">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.course.index') }}">Course List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.course.create') }}">Course Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageStudent" aria-expanded="false" aria-controls="manageStudent"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Student</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageStudent">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.student.index') }}">Student List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.student.create') }}">Student Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageStudentSuccess" aria-expanded="false" aria-controls="manageStudentSuccess"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage  Success</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageStudentSuccess">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.success.index') }}">Success List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.success.create') }}">Success Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageGallery" aria-expanded="false" aria-controls="manageGallery"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Gallery</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageGallery">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.gallery.index') }}">Gallery List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.gallery.create') }}">Gallery Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageTeam" aria-expanded="false" aria-controls="manageTeam"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage Team</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageTeam">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.team.index') }}">Team List</a></li>
                    @if (Auth::user()->role != 'Editor')
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.team.create') }}">Team Create</a></li>
                    @endif
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageFFQ" aria-expanded="false" aria-controls="manageBanner"> <img class="menu-icon" src="{{asset('img/menu-icon/04.png')}}" alt="menu icon"> <span class="menu-title">Manage FFQ</span><i class="fas fa-angle-double-down ml-auto"></i></a>
            <div class="collapse" id="manageFFQ">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.ffq.index') }}">FFQ List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.ffq.create') }}">FFQ Create</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item"><a class="nav-link" href="{{ route('admin.subscriber.index') }}"><img class="menu-icon" src="{{ asset('img/menu-icon/02.png') }}" alt="menu icon"><span class="menu-title">Subscribers List</span></a></li>

        <li class="nav-item"><a class="nav-link" href="{{ route('admin.register.student.index') }}"><img class="menu-icon" src="{{ asset('img/menu-icon/02.png') }}" alt="menu icon"><span class="menu-title">Register Students List</span></a></li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <form action="{{ asset(route('admin.logout')) }}" class="form-inline" method="post">
                    @csrf
                    <input type="submit" value="Log Out" class="btn btn-danger btn-sm">
                </form>
            </a>
        </li>
    </ul>
</nav>