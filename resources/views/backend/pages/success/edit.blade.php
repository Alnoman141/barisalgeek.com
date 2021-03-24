@extends('backend.layouts.master')

@section('title')
    Student-Success | Create
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
                                <h2>Student Success Student</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.success.index') }}" class="btn btn-info m-2">Student Success List</a>
                            </div>
                        </div>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.success.update',$success->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="batch_id" class="col-sm-2 col-form-label">Select Batch Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="batch_id" id="batch_id">
                                        <option selected disabled>Select One---</option>
                                        @foreach(App\Models\Batch::orderBy('id','desc')->get() as $batch)
                                            <option {{ $success->batch_id == $batch->id?'selected':'' }} value="{{ $batch->id }}">{{ $batch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="course_id" class="col-sm-2 col-form-label">Select Course Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="course_id">
                                        <option selected disabled>Select One---</option>
                                        @foreach(App\Models\Course::orderBy('id','desc')->get() as $course)
                                            <option {{ $success->course_id == $course->id?'selected':'' }} value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="batch_id" class="col-sm-2 col-form-label">Select Student <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="student_id" id="student_id">
                                        <option selected disabled>Select One---</option>
                                        @foreach(App\Models\Student::orderBy('id','desc')->get() as $student)
                                            <option {{ $success->student_id == $student->id?'selected':'' }}  value="{{ $student->id }}">{{ $student->first_name .' '.$student->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Current Image <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('images/success/'.$success->image) }}" height="200px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Success Image <span class="text-danger">*</span></label>
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