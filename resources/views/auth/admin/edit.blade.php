@extends('backend.layouts.master')
@section('title')
    | Edit
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
                                <h2>Admin Create</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.list') }}" class="btn btn-info m-2">Admin List</a>
                            </div>
                        </div>
                        <hr>
                        @include('global.msg')
                        <div class="container">
                            <!-- Horizontal material form -->
                            <form method="post" action="{{ route('admin.update',$admin->id) }}" enctype="multipart/form-data" >
                            @csrf
                            <!-- Grid row -->
                                <div class="form-group row">
                                    <!-- Material input -->
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <div class="md-form mt-0">
                                            <input type="text" class="form-control" id="name" value="{{ $admin->name }}" name="name">
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="form-group row">
                                    <!-- Material input -->
                                    <label for="username" class="col-sm-2 col-form-label">User-Name</label>
                                    <div class="col-sm-10">
                                        <div class="md-form mt-0">
                                            <input type="text" class="form-control" id="username" value="{{ $admin->username }}" name="username">
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="form-group row">
                                    <!-- Material input -->
                                    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <div class="md-form mt-0">
                                            <input type="number" class="form-control" id="phone" value="{{ $admin->phone }}" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="form-group row">
                                    <!-- Material input -->
                                    <label for="image" class="col-sm-2 col-form-label">Currenr Image</label>
                                    <div class="col-sm-10">
                                        <div class="md-form mt-0">
                                            <img src="{{ asset('images/admins/'.$admin->image) }}" width="150px;" height="130px">
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="form-group row">
                                    <!-- Material input -->
                                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <div class="md-form mt-0">
                                            <input type="file" class="form-control" id="image" placeholder="Name" name="image">
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary btn-md">Update Profile</button>
                                    </div>
                                </div>
                                <!-- Grid row -->
                            </form>
                            <!-- Horizontal material form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
