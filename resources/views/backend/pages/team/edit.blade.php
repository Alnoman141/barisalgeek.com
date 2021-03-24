@extends('backend.layouts.master')

@section('title')
    Team | Update
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
                    <div class="container">
                        <div class="row my-3">
                            <div class="col-md-6">
                                <h2>Update Team</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.team.index') }}" class="btn btn-info m-2">Team List</a>
                            </div>
                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.team.update',$team->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Team Member Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="designation" class="col-sm-3 col-form-label">Team Member Designation <span class="text-danger">*</span></label>
                                <div class="col-sm-0">
                                    <input type="text" class="form-control" id="designation" name="designation" value="{{ $team->designation }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Current Image </label>
                                <div class="col-sm-9">
                                    <img src="{{ asset('images/about/team/'.$team->image) }}" height="200px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Team Member Image <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="file" id="image" name="image" placeholder="Enter Service Icon">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Add Team Member</button>
                                </div>
                            </div>
                        </form>
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

