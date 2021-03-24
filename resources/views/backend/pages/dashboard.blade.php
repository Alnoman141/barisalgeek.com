@extends('backend.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('backend.partials.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="margin-left: 30px">
            <!-- partial:partials/_sidebar.html -->
            @include('backend.partials.sidenav')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('global.msg')
                    <div class="container">
                        <div class="row">
                            <h2>Visit Site <a href="{{ route('index') }}" target="_blank">Click Me</a></h2>
                        </div>
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