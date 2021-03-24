@extends('backend.layouts.master')
@if(Auth::user()->role == 'Super-Admin')
@section('title')
    About | Edit
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
                                <h2>Update About Page</h2>
                            </div>

                        </div>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.about.update',$about->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Page Content <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="page_content">
                                        {!! $about->page_content !!}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row my-5">
                                <label for="name" class="col-sm-3 col-form-label">Current Image</label>
                                <div class="col-sm-9">
                                    <img src="{{ asset('images/about/'.$about->image) }}" height="200px">
                                </div>
                            </div>

                            <div class="form-group row mt-5">
                                <label for="name" class="col-sm-3 col-form-label">Update Image <h6 style="color: red;font-size: 10px">upload 1280*1920 image for better view</h6></label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Update About Page</button>
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
        CKEDITOR.replace( 'page_content' );
    </script>
@endsection
@endif