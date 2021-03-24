@extends('backend.layouts.master')

@section('title')
    Batch | Create
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
                                <h2>Create Batch</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.batch.index') }}" class="btn btn-info m-2">Batch List</a>
                            </div>
                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <h6><span class="text-danger">**</span> Fields Are Required & Unique</h6>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.batch.store') }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Batch Name <span class="text-danger">**</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Batch Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Batch Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Banner Sub-Title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="total_students" class="col-sm-3 col-form-label">Batch Total Student</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="total_students" name="total_students" placeholder="Enter Total Student">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-sm-3 col-form-label">Batch Type <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="col-sm-9">
                                        <select class="custom-select form-control" name="type">
                                            <option selected disabled>Select One---</option>
                                            <option value="1">Running Batch</option>
                                            <option value="2">Upcoming Batch</option>
                                            <option value="3">Previous Batch</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Batch Image <span class="text-danger">*</span><h6 style="color: red;font-size: 10px">upload 350*210 image for better view</h6></label>
                                <div class="col-sm-9">
                                    <input type="file" class="" id="image" name="image" placeholder="Enter Banner Image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Add Batch</button>
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