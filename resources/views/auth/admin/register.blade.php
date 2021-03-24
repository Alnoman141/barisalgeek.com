@extends('backend.layouts.master')
@section('title')
    | Register
@endsection

@section('content')
    <div class="container-scroller">
        @include('backend.partials.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.partials.sidenav')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row my-3">
                            <div class="col-md-6">
                                <h2>Create Admin</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.list') }}" class="btn btn-info m-2">Admin List</a>
                            </div>
                        </div>
                        <hr>
                        @include('global.msg')
                        <form action="{{ route('admin.register') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">User-Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <div class="md-form mt-0">
                                        <input type="password" class="form-control" id="password-confirm" placeholder="Enter Password Again" name="password_confirmation">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Select Admin Role</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="role">
                                        <option selected disabled>Select One---</option>
                                        <option value="Admin" >Admin</option>
                                        <option value="Author" >Author</option>
                                        <option value="Editor" >Editor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" id="image" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info btn-sm"  >Add Admin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection