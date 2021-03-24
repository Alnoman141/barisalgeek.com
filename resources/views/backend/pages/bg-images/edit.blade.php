@extends('backend.layouts.master')

@section('title')
    Pages-Background-Images | Edit
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
                                <h2>Update Background-Images</h2>
                            </div>
                        </div>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.bg.update',$bg->id) }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Current Portfolio Background</label>
                                <div class="col-sm-9">
                                    <img src="{{ asset('images/bg/'.$bg->portfolio_bg) }}" height="100px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="portfolio_bg" class="col-sm-3 col-form-label">Portfolio Background <h6 style="font-size: 10px;color: red">Upload 1920*900 image for better view</h6></label>

                                <div class="col-sm-9">
                                    <input type="file"  id="portfolio_bg" name="portfolio_bg">
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Current Subscribe Background</label>
                                <div class="col-sm-9">
                                    <img src="{{ asset('images/bg/'.$bg->subscribe_bg) }}" height="100px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subscribe_bg" class="col-sm-3 col-form-label">Subscribe Background <h6 style="font-size: 10px;color: red">Upload 1920*900 image for better view</h6></label>

                                <div class="col-sm-9">
                                    <input type="file"  id="subscribe_bg" name="subscribe_bg">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Current About Background</label>
                                <div class="col-sm-9">
                                    <img src="{{ asset('images/bg/'.$bg->about_bg) }}" height="100px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="about_bg" class="col-sm-3 col-form-label">About Background <h6 style="font-size: 10px;color: red">Upload 1920*900 image for better view</h6></label>

                                <div class="col-sm-9">
                                    <input type="file"  id="about_bg" name="about_bg">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Update Banner</button>
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

