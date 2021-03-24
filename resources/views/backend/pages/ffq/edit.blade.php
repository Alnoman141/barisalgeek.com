@extends('backend.layouts.master')

@section('title')
    FFQ | Edit
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
                                <h2>Update FFQ</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.ffq.index') }}" class="btn btn-info m-2">FFQ List</a>
                            </div>
                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <h6><span class="text-danger">**</span> Fields Are Required & Unique</h6>
                        <hr>
                        @include('global.msg')
                        <form action="{{ route('admin.ffq.update',$ffq->id) }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="question" class="col-sm-2 col-form-label">FFQ Question <span class="text-danger">**</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="question" name="question" value="{!! $ffq->question !!}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="answer" class="col-sm-2 col-form-label">FFQ Answer <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="answer" class="form-control">
                                        {!! $ffq->answer !!}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info btn-sm"  >Update FFQ</button>
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
        CKEDITOR.replace( 'answer' );
    </script>
@endsection