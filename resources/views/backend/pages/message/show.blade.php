@extends('backend.layouts.master')
@section('title')
    | Message | Show
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
                                <h2>Comment's Details</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a class="btn btn-info btn-sm " href="{{ route('admin.messages') }}">Message List</a>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                                <h6>Name :</h6>
                            </div>
                            <div class="col-md-10 ">
                                <strong>{{ $message->name }}</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <h6>Email :</h6>
                            </div>
                            <div class="col-md-10 ">
                                <strong>{{ $message->email }}</strong>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                                <h6>Subject  :</h6>
                            </div>
                            <div class="col-md-10 ">
                                <strong>{{ $message->subject }}</strong>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                                <h6>Message :</h6>
                            </div>
                            <div class="col-md-10 ">
                                <strong>{{ $message->message }}</strong>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                                <h6>Reply :</h6>
                            </div>
                            <div class="col-md-10 ">
                                <strong>{{ $message->reply }}</strong>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                                <h6>Replied By :</h6>
                            </div>
                            <div class="col-md-10 ">
                                <strong>{{ $message->replied_by }}</strong>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10 ">
                                @if(!isset($message->replied_by))
                                <a href="{{ route('admin.message.replyform',$message->id) }}" class="btn btn-success btn-sm">Reply</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

