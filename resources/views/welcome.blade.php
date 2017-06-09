@extends('layouts.master')

@section('content')

    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Login & Register</small>
                        </h1>
                            <a href="{{ url('/login') }}"><button type="button" class="btn btn-primary">Login</button></a>
                            <a href="{{ url('/register') }}"><button type="button" class="btn btn-primary">Register</button></a>
                    </div>
                </div>
            </div>
            </div>


@endsection

