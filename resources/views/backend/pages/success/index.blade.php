@extends('backend.layouts.master')
@section('title')
    Student Success | List
@endsection
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
    <style>
        #success-img .col-md-4{
            border: 1px solid #ddd;
            padding: 10px;
        }
        #success-img .figure{
            position: relative;
            top: 0;
            left: 0;
        }
        #success-img .figure .figure-caption{
            position: absolute;
            top: 50%;
            left: 50%;
            height: 100%;
            width: 100%;
            background-color: rgba(0,0,0,0.5);
            transform: translate(-50%,-50%);
            display: none;
        }

        #success-img .figure .figure-caption i{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: #fff;
        }

        #success-img .figure:hover .figure-caption{
            display: block;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/frontend/lightbox.min.css') }}">
@endsection
@section('content')
    <div class="container-scroller">
        @include('backend.partials.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.partials.sidenav')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Student Success List</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.success.create') }}" class="btn btn-info m-2">Create Success Student</a>
                            </div>
                        </div>
                        <hr>
                        @include('global.msg')

                        <table class="table table-striped display" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">Id</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col" width="15%">Course Name</th>
                                <th scope="col" width="10%">Batch Name</th>
                                <th scope="col" width="20%">Image</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($successes as $success)
                                <tr>

                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $success->student->first_name .' '.$success->student->last_name }}</td>
                                    <td>{{ $success->course->name }}</td>
                                    <td>{{ $success->batch->name  }}</td>
                                    <td>
                                        <div class="container" id="success-img">
                                            <figure class="figure m-0">
                                                <img src="{{ asset('images/success/'.$success->image) }}" class="figure-img  rounded m-0 p-0" alt="{{ $success->image }}" height="85px">
                                                <figcaption class="figure-caption">
                                                    <a class="example-image-link" href="{{ asset('images/success/'.$success->image) }}" data-lightbox="example-1"><i class="fa fa-search-plus fa-2x"></i></a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.success.edit',$success->id) }}" class="btn btn-success btn-sm">Edit</a>

                                        @if(Auth::user()->role != 'Editor')
                                        <a class="btn btn-danger btn-sm" href="#deleteStudent{{ $success->id }}" data-toggle="modal" data-target="">Delete</a>
                                    @endif
                                    <!--Delete Modal -->
                                        <div class="modal fade text-center" id="deleteStudent{{ $success->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                             aria-hidden="true">

                                            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                            <div class="modal-dialog modal-dialog-centered" role="document">


                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title text-danger" id="exampleModalLabel" >Delete!</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class=" text-danger" >Are You Sure To Delete!!!</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('admin.success.delete',$success->id) }}" class="btn btn-danger" >Yes</a>
                                                        <button  type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <script src="{{ asset('js/frontend/lightbox-plus-jquery.min.js') }}"></script>
@endsection
