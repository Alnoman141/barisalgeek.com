@extends('backend.layouts.master')
@section('title')
    Batches | List
@endsection
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
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
                                <h2>Batches List</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('admin.batch.create') }}" class="btn btn-info m-2">Create Batch</a>
                            </div>
                        </div>
                        <hr>
                        @include('global.msg')

                        <table class="table table-striped display" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">Id</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col" width="15%">Type</th>
                                <th scope="col" width="10%">Total Student</th>
                                <th scope="col" width="15%">Description</th>
                                <th scope="col" width="20%">Image</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($batches as $batch)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $batch->name }}</td>
                                    <td>
                                        @if($batch->type == 1)
                                          Running Batch
                                        @elseif($batch->type == 2)
                                            Upcoming Batch
                                        @elseif($batch->type == 3)
                                            Previous Batch
                                        @endif
                                    </td>
                                    <td>{{ $batch->total_students }}</td>
                                    <td>{{ $batch->description }}</td>
                                    <td><img src="{{ asset('images/batch/'.$batch->image) }}" height="80px"></td>
                                    <td>
                                        <a href="{{ route('admin.batch.edit',$batch->id) }}" class="btn btn-success btn-sm">Edit</a>

                                        @if(Auth::user()->role != 'Editor')
                                        <a class="btn btn-danger btn-sm" href="#deleteBatch{{ $batch->id }}" data-toggle="modal" data-target="">Delete</a>
                                    @endif
                                    <!--Delete Modal -->
                                        <div class="modal fade text-center" id="deleteBatch{{ $batch->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                                        <a href="{{ route('admin.batch.delete',$batch->id) }}" class="btn btn-danger" >Yes</a>
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
@endsection
