@extends('layouts.master')

@section('content')

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Login or Register
                        </h1>
                        <h3>You must login or register to view this page.</h3>
                        <br>    

                        <div class="text-centre" style="text-align:center; ">
                            <a href="{{ url('/login') }}"><button type="button" class="btn btn-primary" style="font-size: 160%;"><i class="fa fa-fw fa-sign-in"></i> Login</button></a>
                            <a href="{{ url('/register') }}"><button type="button" class="btn btn-primary" style="font-size: 160%;"><i class="fa fa-fw fa-sign-out"></i> Register</button></a>
                        
                        </div>
                        <br>    

                    </div>
                </div>








            </div>
</div>

@endsection