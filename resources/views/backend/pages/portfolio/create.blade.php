@extends('backend.layouts.master')

@section('title')
    Portfolio | Create
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/backend/addmultipletags.css') }}">

    <style>
        .form-row {
            border:  1px solid #e2e2e2;
            margin:  10px;
            padding: 20px;
            background: #f2f2f2;
        }
        .subrow {
            margin: 5px;
            padding:  5px;
        }
    </style>
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
                                <h2>Create Portfolio</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-info m-2">Portfolio List</a>
                            </div>
                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <hr>
                        @include('global.msg')
                        <form action="{{ route('admin.portfolio.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Portfolio Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Postfolio Title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id " class="col-sm-3 col-form-label">Select A Category <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="custom-select" name="category_id">
                                        <option selected disabled>Select One ---></option>
                                        @foreach($categories as $category)
                                        <option  value="{{ $category->id }}" >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Select A Rating <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="custom-select" name="rating">
                                        <option selected disabled>Select One---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="website" class="col-sm-3 col-form-label">Website Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="website" name="website" placeholder="Enter Your Website">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="project_type" class="col-sm-3 col-form-label">Project Type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="project_type" name="project_type" placeholder="Enter Your Website">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Add To HomePage</label>
                                <div class="col-sm-9">
                                    <div>
                                        <input type="radio" id="status" value="1" name="status">
                                        Yes
                                        |
                                        <input type="radio" id="status" value="0" name="status">
                                        No
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="completed" class="col-sm-3 col-form-label">Completed At</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="completed" name="completed">
                                </div>
                            </div>

                            <!-- Grid row -->
                            <div class="form-group row">
                                <!-- Material input -->
                                <label for="form-tags-1" class="col-sm-3 col-form-label">Tags</label>
                                <div class="col-sm-9">
                                    <div class="md-form mt-0">
                                        <input id="form-tags-1" name="tags[]" type="text" >
                                    </div>
                                </div>
                            </div>
                            <!-- Grid row -->

                            <div class="row" id="app">
                                <label for="image" class="col-md-3 col-form-label">Portfolio Image <span class="text-danger">*</span><h6 style="color: red;font-size: 10px">upload 512*512 image for better view</h6></label>
                                <div  class="container col-md-7">
                                    <div class="row  form-row" v-for="row in rows">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <input type="file" class="form-control-plaintext" name="image[]" id="image">
                                                </div>
                                                <div class="col-md-2 ">
                                                    <button class="btn btn-danger d-flex justify-content-end" @click="deleteRow(row)">X</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-success text-white" @click="addRow">Add Row</a>
                                </div>
                            </div>

                            <div class="form-group row mt-5">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Add Portfolio</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>
    <script src="{{ asset('js/backend/addmuslipletags.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
    <script>
        new Vue({
            el: '#app',
            data: {
                options: [
                    { 'label': 'Image'}
                ],
                rows: [
                    { 'name': 'image[]', 'check': false}
                ]
            },
            methods: {
                addRow: function() {
                    this.rows.push({ 'name': 'image[]', 'check': false});
                },
                deleteRow: function(row) {
                    this.rows.$remove(row);
                }
            }
        })
    </script>
@endsection