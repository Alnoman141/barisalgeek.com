@extends('backend.layouts.master')

@section('title')
    Privacy | Edit
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
                                <h2>Update Privacy</h2>
                            </div>

                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <hr>
                        @include('global.msg')
                        <form action="{{ route('admin.privacy.update',$privacy->id) }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Page Content <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="page_content">
                                        {!! $privacy->page_content !!}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info btn-sm"  >Update Privacy Page</button>
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