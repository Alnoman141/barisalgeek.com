@extends('backend.layouts.master')
@section('title')
    | Message | Reply
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
                                <h2>Message Reply To {{ $message->name }}</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a style="align-items: center;display: flex" class="btn btn-info btn-sm m-3" href="{{ route('admin.messages') }}">Message List</a>
                            </div>
                        </div>

                        <hr>
                        <h6><span class="text-danger">*</span> Fields Are Required</h6>
                        <hr>
                        @include('global.msg')
                        <form action="{{ route('admin.message.reply',$message->id) }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="replied_by" class="col-sm-3 col-form-label">Send Message From (Admin User-Name) <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="replied_by" name="replied_by" value="{{ Auth::user()->username }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Send Message To (Name) <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $message->name }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Send Message To (Email) <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $message->email }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subject" class="col-sm-3 col-form-label">Sender Subject <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="subject" name="subject" value="{{ $message->subject }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="message" class="col-sm-3 col-form-label">Sender Message <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="message" name="message" value="{{ $message->message }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reply" class="col-sm-3 col-form-label">Your Reply <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea type="text" id="contact-message" name="reply" class="form-control md-textarea" rows="3"></textarea>                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info btn-sm"  >Reply</button>
                                </div>
                            </div>
                        </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'reply' );
    </script>
@endsection

