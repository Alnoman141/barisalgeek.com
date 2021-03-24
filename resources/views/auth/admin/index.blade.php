@extends('backend.layouts.master')
@section('title')
    | List
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
                                <h2>Admin List</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                @if(Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin')
                                    <a href="{{ route('admin.register.form') }}" class="btn btn-info m-2">Create Admin</a>
                                @endif

                            </div>
                        </div>
                        <hr>
                        @include('global.msg')

                        <table class="table table-striped display" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">Id</th>
                                <th scope="col" width="20%">Email</th>
                                <th scope="col" width="15%">Role</th>
                                <th scope="col" width="25%">Image</th>
                                <th scope="col" width="35%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->role }}</td>
                                    <td><img src="{{ asset('images/admins/'.$admin->image) }}" width="100px" height="60px"></td>
                                    <td>
                                        <a href="{{ route('admin.show',$admin->id) }}" class="btn btn-info btn-sm">View</a>
                                        @if(Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin')
                                            @if($admin->status == 1)
                                                <a href="{{ route('admin.block',$admin->id) }}" class="btn btn-warning btn-sm">Block</a>
                                            @elseif($admin->status == 2)
                                                <a href="{{ route('admin.unblock',$admin->id) }}" class="btn btn-warning btn-sm">Unblock</a>
                                            @else
                                                <a class="btn btn-warning btn-sm">Inactive</a>
                                            @endif
                                        @endif
                                        @if(Auth::user()->role == 'Super-Admin')
                                            <a class="btn btn-danger btn-sm" href="#deleteAdmin{{ $admin->id }}" data-toggle="modal" data-target="">Delete</a>
                                    @endif
                                    <!--Delete Modal -->
                                        <div class="modal fade text-center" id="deleteAdmin{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                                        <a href="{{ route('admin.delete',$admin->id) }}" class="btn btn-danger" >Yes</a>
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
