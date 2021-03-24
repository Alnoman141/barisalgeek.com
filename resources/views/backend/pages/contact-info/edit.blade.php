@extends('backend.layouts.master')

@section('title')
    Contact-Info | Edit
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
                                <h2>Update Contact-Info</h2>
                            </div>
                        </div>
                        <h5><span class="text-danger">*</span> Fields Are Required</h5>
                        <hr>

                        @include('global.msg')

                        <form action="{{ route('admin.contactinfo.update',$contact->id) }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone Number <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street_address" class="col-sm-2 col-form-label">Street Address <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="street_address" name="street_address" value="{{ $contact->street_address }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-sm-2 col-form-label">City <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $contact->city }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-sm-2 col-form-label">Country <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="country" name="country" value="{{ $contact->country }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info btn-sm"  >Update Contact-Info</button>
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