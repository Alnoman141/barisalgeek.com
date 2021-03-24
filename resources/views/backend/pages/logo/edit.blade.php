@extends('backend.layouts.master')

@section('title')
    Logo | Edit
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
                                <h2>Update Logo</h2>
                            </div>
                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <hr>


                        @include('global.msg')
                        <form action="{{ route('admin.logo.update',$logo->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Current logo </label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('images/logo/'.$logo->image) }}" height="100px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Logo Image <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" id="image" name="image" placeholder="Enter Banner Image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info btn-sm"  >Update Logo</button>
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