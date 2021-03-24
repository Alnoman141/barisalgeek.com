@extends('backend.layouts.master')
@section('title')
    |  Messages
@endsection
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
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
                                <h2>Unread Messages List</h2>
                            </div>
                        </div>
                        @include('global.msg')
                        <hr>

                        <table class="table table-striped display" id="table_id">
                            <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="15%">Name</th>
                                <th width="10%">Email</th>
                                <th width="10%">Subject</th>
                                <th width="20%">Message</th>
                                <th width="30%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($unseenmessages as $unseenmessage)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $unseenmessage->name }}</td>
                                    <td>{{ $unseenmessage->email }}</td>
                                    <td>{{ str_limit($unseenmessage->subject,20) }}</td>
                                    <td>{{ str_limit($unseenmessage->message,50) }}</td>
                                    <td>
                                        <a class="btn btn-info btn-small" href="{{ route('admin.message.show',$unseenmessage->id) }}">View</a>
                                        <a class="btn btn-success btn-small" href="{{ route('admin.message.reply',$unseenmessage->id) }}">reply</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="row mt-5 pt-3" style="border-top: 3px solid #ddd">
                            <div class="col-md-6">
                                <h2>Seen Messages List</h2>
                            </div>
                        </div>
                        <hr>

                        <table class="table table-striped display" id="myTable_Id">
                            <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="15%">Name</th>
                                <th width="10%">Email</th>
                                <th width="10%">Subject</th>
                                <th width="20%">Message</th>
                                <th width="30%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($seenmessages as $seenmessage)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $seenmessage->name }}</td>
                                    <td>{{ $seenmessage->email }}</td>
                                    <td>{{ str_limit($seenmessage->subject,20) }}</td>
                                    <td>{{ str_limit($seenmessage->message,50) }}</td>
                                    <td>
                                        <a class="btn btn-info btn-small" href="{{ route('admin.message.show',$seenmessage->id) }}">View</a>
                                        <a class="btn btn-success btn-small" href="{{ route('admin.message.reply',$seenmessage->id) }}">reply</a>
                                        @if(Auth::user()->role != 'Editor')
                                        <a class="btn btn-danger btn-small" href="#deleteMessage{{ $seenmessage->id }}" data-toggle="modal" data-target="">Delete</a>
                                        @endif
                                        <!--Delete Modal -->
                                        <div class="modal fade text-center" id="deleteMessage{{ $seenmessage->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                                        <a href="{{ route('admin.message.delete',$seenmessage->id) }}" class="btn btn-danger" >Yes</a>
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
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

    <script>
        $(document).ready( function () {
            $('#myTable_Id').DataTable();
        } );
    </script>
@endsection
