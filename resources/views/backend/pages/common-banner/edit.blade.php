@extends('backend.layouts.master')

@section('title')
    Common-Banner | Edit
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
                                <h2>Update Common-Banner</h2>
                            </div>
                        </div>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.common_banner.update',$banner->id) }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Current Image</label>
                                <div class="col-sm-9">
                                    <img src="{{ asset('images/banners/common-banner/'.$banner->image) }}" height="100px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Banner Image <span class="text-danger">*</span><h6 style="color: red;font-size: 10px">upload 1920*450 image for better view</h6></label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Banner Image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Update Banner</button>
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
