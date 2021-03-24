@extends('backend.layouts.master')
@section('title')
    | Show
@endsection
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
@endsection
@section('content')
    <div class="container-scroller">
        @include('backend.partials.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.partials.sidenav')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Profile Of {{ $admin['name'] }}</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                @if($admin['id'] == Auth::user()->id)
                                    <a  class="btn btn-success m-2" href="{{ route('admin.edit',$admin->id) }}">Edit Profile</a>
                                @endif
                                <a href="{{ route('admin.list') }}" class="btn btn-info m-2">Admin List</a>
                            </div>
                        </div>
                        <hr>
                        @include('global.msg')
                        <div style="width: 500px;margin: 0 auto;height: 600px">
                            <!-- Rotating card -->
                            <div class="card-wrapper">
                                <div id="card-1" class="card card-rotating text-center">

                                    <!-- Front Side -->
                                    <div class="face front">

                                        <!-- Avatar -->
                                        <div class="avatar mx-auto white"><img src="{{ asset('images/admins/'.$admin['image']) }}" class="rounded-circle"
                                                                               alt="{{ $admin['name'] }}" width="150px" height="150">
                                        </div>

                                        <!-- Content -->
                                        <div class="card-body">
                                            <h4 class="font-weight-bold mb-3">Name : {{$admin['name']}}</h4>
                                            <p class="font-weight-bold blue-text">User-Name : {{$admin['username']}}</p>
                                            <p class="font-weight-bold blue-text">Admin Type : {{$admin['role']}}</p>
                                            <p class="font-weight-bold blue-text">Admin Email : {{$admin['email']}}</p>
                                            <p class="font-weight-bold blue-text">Phone Number : {{$admin['phone']}}</p>
                                            <p class="font-weight-bold blue-text">Admin Status : {{$admin['status'] == 1? 'Active':'Blocked'}}</p>
                                        </div>

                                    </div>
                                    <!-- Front Side -->

                                </div>
                            </div>
                            <!-- Rotating card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.footer')
@endsection
