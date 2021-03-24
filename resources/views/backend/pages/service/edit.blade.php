@extends('backend.layouts.master')

@section('title')
    Service | Edit
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
                                <h2>Upadte Service</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.service.index') }}" class="btn btn-info m-2">Service List</a>
                            </div>
                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <h6><span class="text-danger">**</span> Fields IS Required & Unique</h6>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.service.update',$service->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Service Title <span class="text-danger">**</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">description <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="description" name="description">
                                        {{ $service->description }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="icon" class="col-sm-3 col-form-label">Current Icon</label>
                                <div class="col-sm-9">
                                    <img src="{{ asset('images/services/'.$service->icon) }}" height="100px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="icon" class="col-sm-3 col-form-label">Service Icon <span class="text-danger">*</span> <h6 style="color: red;font-size: 10px">upload 100*100 image for better view</h6></label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="icon" name="icon" placeholder="Enter Service Icon">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Add Service</button>
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