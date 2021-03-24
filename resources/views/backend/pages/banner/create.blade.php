@extends('backend.layouts.master')

@section('title')
    Banner | Create
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
                                <h3>Create Banner</h3>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.banner.index') }}" class="btn btn-info m-3">Banner List</a>
                            </div>
                        </div>
                        <hr>
                        <h5><span class="text-danger">*</span> Fields Are Required</h5>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden"  name="admin_id" value="{{ Auth::user()->id }}">

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Banner Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Banner Title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sub_title" class="col-sm-3 col-form-label">Banner Sub-Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Enter Banner Sub-Title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="button_text" class="col-sm-3 col-form-label">Button Text</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="button_text" name="button_text" placeholder="Enter Button Text">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="button_link" class="col-sm-3 col-form-label">Button Link</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="button_link" name="button_link" placeholder="Enter Button Link">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Banner Image <span class="text-danger">*</span> <h6 style="color: red;font-size: 10px">upload 1920*900 image for better view</h6></label>
                                <div class="col-sm-9">
                                    <input type="file"  id="image" name="image" placeholder="Enter Banner Image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Add Banner</button>
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

@section('script')
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection