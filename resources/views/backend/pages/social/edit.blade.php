@extends('backend.layouts.master')

@section('title')
    Social-Links | Edit
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
                                <h2>Update Social-Links</h2>
                            </div>
                        </div>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.social.update',$social->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="facebook_link" class="col-sm-2 col-form-label">Facebook Link</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ $social->facebook_link }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="linkedin_link" class="col-sm-2 col-form-label">Linked-In Link </label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ $social->linkedin_link }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter_link" class="col-sm-2 col-form-label">Twitter Link</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" id="twitter_link" name="twitter_link" value="{{ $social->twitter_link }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dribbble_link" class="col-sm-2 col-form-label">Dribbble Link</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" id="dribbble_link" name="dribbble_link" value="{{ $social->dribbble_link }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="instagram_link" class="col-sm-2 col-form-label">Instagram  Link</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="{{ $social->instagram_link }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="behance_link" class="col-sm-2 col-form-label">Logo Image</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" id="behance_link" name="behance_link" value="{{ $social->behance_link }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info btn-sm"  >Update Links</button>
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