@extends('backend.layouts.master')

@section('title')
    Testimonial | Edit
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
                                <h2>Update Testimonial</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-info m-2">Testimonial List</a>
                            </div>
                        </div>
                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <hr>

                        @include('global.msg')
                        <form action="{{ route('admin.testimonial.update',$testimonial->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">


                            <div class="form-group row">
                                <label for="category_id " class="col-sm-3 col-form-label">Select A Category <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="custom-select" name="category_id">
                                        <option selected disabled>Select One ---</option>
                                        @foreach($categories as $cat)
                                            <option {{ $cat->id == $testimonial->category_id?'selected':'' }}  value="{{ $cat->id }}" >{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Current Picture</label>
                                <div class="col-sm-9">
                                    <img src="{{ asset('images/testimonial/review/'.$testimonial->picture) }}" height="100px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture" class="col-sm-3 col-form-label">Testimonial Picture <h6 style="color: red;font-size: 10px">upload 800*610 image for better view</h6></label>
                                <div class="col-sm-9">
                                    <input type="file" id="picture" name="picture">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Current Logo</label>
                                <div class="col-sm-9">
                                    <img src="{{ asset('images/testimonial/sitelogo/'.$testimonial->site_logo) }}" height="80px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="site_logo" class="col-sm-3 col-form-label">Website Logo</label>
                                <div class="col-sm-9">
                                    <input type="file" id="site_logo" name="site_logo">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Add To HomePage</label>
                                <div class="col-sm-9">
                                    <div>
                                        <input {{ $testimonial->status == 1?'checked':'' }} type="radio" id="status" value="1" name="status">
                                        Yes
                                        |
                                        <input {{ $testimonial->status == 0?'checked':'' }} type="radio" id="status" value="0" name="status">
                                        No
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="details" class="col-sm-3 col-form-label">Testimonial Details </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="details" name="details">
                                        {!! $testimonial->details !!}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="done_at" class="col-sm-3 col-form-label">Project Done At</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="done_at" name="done_at" value="{{ $testimonial->done_at }}">
                                </div>
                            </div>

                            <div class="row mb-5">
                                <label class="col-md-3 col-form-label">Current Image</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        @foreach(App\Models\TestimonialImage::where('testimonial_id',$testimonial->id)->get() as $image)
                                            <div class="col-md-3">
                                                <img src="{{ asset('images/testimonial/'.$image->image) }}" width="150px" height="150px">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>


                            <div class="row" id="app">
                                <label for="image" class="col-md-3 col-form-label">Project Image</label>
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
                                    <button type="submit" class="btn btn-info btn-sm"  >Update Testimonial</button>
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
        CKEDITOR.replace( 'testimonial_text' );
    </script>

    <script>
        CKEDITOR.replace( 'details' );
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