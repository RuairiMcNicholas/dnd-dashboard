@extends('layouts.master-home')

@section('content')

<style type="text/css">
    
    #welcomeText {
        background-color: rgba(50, 50, 50, 0.8);

        border-radius: 20px;
        border-width: 4px;
        border-color: rgba(50, 50, 50, 0.8);

        color: #ffffff;
        font-size: 120%;
        padding-right: 30px;
        padding-left: 30px;
        padding-top: 20px;
        padding-bottom: 20px;

        margin-top: 30px;
        margin-bottom: 30px;
    }

</style>

    <div id="page-wrapper"
    style="background-image: url('./assets/img/home-img-1.jpg'); background-position: center center;"
    >

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-centre">
                            <h1 class="text-center" style="color:#ffffff;">
                                Welcome To
                            </h1>
                            <h1 class="page-header text-center" style="font-size: 600%; color:#ffffff;">The D&D Dashboard</h1>

                            <div id="welcomeText">
                                <p>Welcome to the Beta 1.0 version of The D&D Dashboard - an online tool for both the Players and Dungeon Master of Dungeons & Dragons 5th Ed.</p>
                                <p>This Dashboard aims to take out some of the hassle of campaign and character management, through the wonderful power of web technologies. </p>
                                <p>At the moment, it's only useful for character mananagement. Users can create, edit and delete as many characters as they want. We're constantly developing new features, and welcoem suggestions, critiques and feedback!</p>
                            </div>

                        </div>
                        <div class="text-centre">
                            <a href="{{ url('/login') }}"><button type="button" class="btn btn-primary">Login</button></a>
                            <a href="{{ url('/register') }}"><button type="button" class="btn btn-primary">Register</button></a>
                        <div class="text-centre">
                    </div>
                </div>
            </div>
            </div>


@endsection

