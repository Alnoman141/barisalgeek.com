@extends('backend.layouts.master')

@section('title')
    Course | Create
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
                                <h2>Create Course</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.course.index') }}" class="btn btn-info m-2">Course List</a>
                            </div>
                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <h6><span class="text-danger">**</span> Fields Are Required & Unique</h6>
                        <hr>
                        @include('global.msg')
                        <form action="{{ route('admin.course.store') }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Course Name <span class="text-danger">**</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Batch Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="course_topic" class="col-sm-3 col-form-label">Course Topic <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="course_topic" name="course_topic" placeholder="Enter Course Topic">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="outline" class="col-sm-3 col-form-label">Course Outline  <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea type="text" id="outline" name="outline"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class_number" class="col-sm-3 col-form-label">Course Class Number</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="class_number" name="class_number" placeholder="Enter Course Class Number">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration" class="col-sm-3 col-form-label">Course Duration <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="duration" name="duration" placeholder="Enter Course Duration">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Course Description  <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea type="text" id="description" name="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">Course Price <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Course Price">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="offer_price" class="col-sm-3 col-form-label">Course Offer Price</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="offer_price" name="offer_price" placeholder="Enter Course Offer Price">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class_day" class="col-sm-3 col-form-label">Class Days</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="class_day" name="class_day" placeholder="Enter Class Days">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class_time" class="col-sm-3 col-form-label">Class Time</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="class_time" name="class_time" placeholder="Enter Class Time">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class_duration" class="col-sm-3 col-form-label">Class Duration</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="class_duration" name="class_duration" placeholder="Enter Class Time">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="seats" class="col-sm-3 col-form-label">Total Seats</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="seats" name="seats" placeholder="Enter Total Seats">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class_starts" class="col-sm-3 col-form-label">Class Starts At</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="class_starts" name="class_starts" placeholder="Enter Class Starts">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class_ends" class="col-sm-3 col-form-label">Class Ends At</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="class_ends" name="class_ends" placeholder="Enter Class Ends">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Course Banner <span class="text-danger">*</span><h6 style="color: red;font-size: 10px">upload 350*210 image for better view</h6></label>
                                <div class="col-sm-9">
                                    <input type="file" class="" id="image" name="image" placeholder="Enter Banner Image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Add Course</button>
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

    <script>
        CKEDITOR.replace( 'outline' );
    </script>
@endsection