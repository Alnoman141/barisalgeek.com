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
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.success.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="batch_id" class="col-sm-2 col-form-label">Select Batch Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="batch_id" id="batch_id">
                                        <option selected disabled>Select One---</option>
                                        @foreach(App\Models\Batch::orderBy('id','desc')->get() as $batch)
                                            <option value="{{ $batch->id }}">{{ $batch->name }}</option>
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
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="batch_id" class="col-sm-2 col-form-label">Select Student <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="student_id" id="student_id">
                                        <option selected disabled>Select One---</option>

                                    </select>
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
                                    <button type="submit" class="btn btn-info btn-sm"  >Add Students Success</button>
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
    <script>
        $('#batch_id').change(function () {
            var batch = $('#batch_id').val();
            //    Send an axax request to server with this division

            var option = '<option>Choose One---</option>';
            $.get('http://localhost/barisalgeek.com/public/get-student/'+batch,
                function (data) {
                    // alert(data);
                    data = JSON.parse(data);
                    // alert(data);
                    data.forEach(function (element) {

                        option += "<option value='"+element.id+"'>"+element.name+"</option>";
                    });
                    $('#student_id').html(option);
                });
        });
    </script>
@endsection