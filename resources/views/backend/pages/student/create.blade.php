@extends('backend.layouts.master')

@section('title')
    Student | Create
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
                                <h2>Create Student</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.student.index') }}" class="btn btn-info m-2">Student List</a>
                            </div>
                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <h6><span class="text-danger">**</span> Fields IS Required & Unique</h6>
                        <hr>
                        @include('global.msg')
                        <form action="{{ route('admin.student.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-sm-2 col-form-label">Last Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="student_id" class="col-sm-2 col-form-label">Student Unique ID <span class="text-danger">**</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter A Unique Student ID">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="batch_id" class="col-sm-2 col-form-label">Select Batch Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="batch_id">
                                        <option selected disabled>Select One---</option>
                                        @foreach(App\Models\Batch::orderBy('id','desc')->get() as $batch)
                                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="course_id" class="col-sm-2 col-form-label">Select Course Name</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="course_id">
                                        <option selected disabled>Select One---</option>
                                        @foreach(App\Models\Course::orderBy('id','desc')->get() as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Student Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="" id="image" name="image" placeholder="Enter Banner Image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info btn-sm"  >Add Students</button>
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