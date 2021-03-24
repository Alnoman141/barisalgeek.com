@extends('backend.layouts.master')

@section('title')
    Admin-Privilege
@endsection

@section('content')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    @include('backend.partials.nav')
    <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
        @include('backend.partials.sidenav')
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('global.msg')
                    <div class="container">
                        <div class="row mb-5" style="border-bottom: 1px solid lightblue;padding-bottom: 20px">
                            <h1>See Your Privileges</h1>
                        </div>
                        @if(Auth::user()->role == 'Super-Admin')
                        <div class="row"  style="background-color: #fff">
                            <div class="card"  style="background-color: #fff">
                                <div class="card-header"  style="background-color: #fff">
                                    Hello <strong style="color: #377FB0">{{ Auth::user()->username }}</strong> You Are A <strong style="color: #377FB0">{{ Auth::user()->role }}</strong>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-success">As a super admin you got all privileges</h5>
                                </div>
                            </div>
                        </div>

                        <div class="row my-5" style="border-bottom: 1px solid lightblue;padding-bottom: 20px">
                            <h2>Others Privileges</h2>
                        </div>
                        @endif
                        @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Super-Admin')
                        <div class="row"  style="background-color: #fff">
                            <div class="card"  style="background-color: #fff">
                                <div class="card-header"  style="background-color: #fff">
                                    @if(Auth::user()->role == 'Super-Admin')
                                        <strong style="color: #377FB0">Admin's Privileges </strong>
                                    @elseif(Auth::user()->role == 'Admin')
                                        Hello <strong style="color: #377FB0">{{ Auth::user()->username }}</strong> You Are A <strong style="color: #377FB0">{{ Auth::user()->role }}</strong>
                                    @endif

                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-danger"> an admin got all privileges except</h5>
                                    <ol>
                                        <li>Update Logo</li>
                                        <li>Update About Page</li>
                                        <li>Update Social Links</li>
                                        <li>Update Contact Information</li>
                                        <li>Delete Subscriber</li>
                                        <li>Delete Admin</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(Auth::user()->role == 'Author' || Auth::user()->role == 'Super-Admin')
                            <div class="row"  style="background-color: #fff">
                                <div class="card"  style="background-color: #fff">
                                    <div class="card-header"  style="background-color: #fff">
                                        @if(Auth::user()->role == 'Super-Admin')
                                            <strong style="color: #377FB0">Author's Privileges </strong>
                                        @elseif(Auth::user()->role == 'Author')
                                            Hello <strong style="color: #377FB0">{{ Auth::user()->username }}</strong> You Are A <strong style="color: #377FB0">{{ Auth::user()->role }}</strong>
                                        @endif

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-success"> an Author Can...</h5>
                                        <ol>
                                            <li> Create and update elements</li>
                                        </ol>
                                        <h6 class="text-danger">An Author Can't ...</h6>
                                        <ol>
                                            <li>Update Logo</li>
                                            <li>Update About Page</li>
                                            <li>Update Social Links</li>
                                            <li>Update Contact Information</li>
                                            <li>Update Background Images</li>
                                            <li>Update Background Common Banner</li>
                                            <li>Update Privacy Page</li>
                                            <li>Create Admin</li>
                                            <li>Block Admin's</li>
                                            <li>Unblock Admin's</li>
                                            <li>Delete Subscriber</li>
                                            <li>Delete Admin</li>
                                            <li>Delete Register Students</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(Auth::user()->role == 'Editor' || Auth::user()->role == 'Super-Admin')
                            <div class="row"  style="background-color: #fff">
                                <div class="card"  style="background-color: #fff">
                                    <div class="card-header"  style="background-color: #fff">
                                        @if(Auth::user()->role == 'Super-Admin')
                                            <strong style="color: #377FB0">Editor's Privileges </strong>
                                        @elseif(Auth::user()->role == 'Author')
                                            Hello <strong style="color: #377FB0">{{ Auth::user()->username }}</strong> You Are A <strong style="color: #377FB0">{{ Auth::user()->role }}</strong>
                                        @endif

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-success"> an Editor Can...</h5>
                                        <ol>
                                            <li> Create and update elements</li>
                                        </ol>
                                        <h6 class="text-danger">An Editor Can't ...</h6>
                                        <ol>
                                            <li>Update Logo</li>
                                            <li>Update About Page</li>
                                            <li>Update Social Links</li>
                                            <li>Update Contact Information</li>
                                            <li>Update Background Images</li>
                                            <li>Update Background Common Banner</li>
                                            <li>Update Privacy Page</li>
                                            <li>Add Team Member Page</li>
                                            <li>Delete Team Member Page</li>
                                            <li>Edit Team Member Page</li>
                                            <li>Block Admin's</li>
                                            <li>Unblock Admin's</li>
                                            <li>Delete Elements</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- content-wrapper ends -->
                @include('backend.partials.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection