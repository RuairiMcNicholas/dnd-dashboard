@extends('layouts.master-home')

@section('content')

<style type="text/css">
    
    .welcomeText {
        background-color: rgba(50, 50, 50, 0.8);

        border-radius: 5px;
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

    .dnd-footer .col-lg-12 {
        bottom: initial !important;
    }

    @media screen and (min-device-width: 1200px) {
        #page-wrapper {
            background-size: contain;
        }
    }

     @media only screen 
      and (min-device-width: 320px) 
      and (max-device-width: 1199px) {
        #page-wrapper {
            background-size: cover;
        }
        .page-header {
            font-size: 400% !important;
        }
    }

</style>

    <div id="page-wrapper"
    style="background-image: url('./assets/img/home-img-2.jpg'); background-position: center center; background-attachment: fixed;"
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

                            <div class="welcomeText">
                                <p>Welcome to the Beta 1.0 version of The D&D Dashboard - an online tool for both the Players and Dungeon Master of Dungeons & Dragons 5th Ed.</p>
                                <p>This Dashboard aims to take out some of the hassle of campaign and character management, through the wonderful power of web technologies. </p>
                                <p>At the moment, it's only useful for character mananagement. Users can create, edit and delete as many characters as they want. We're constantly developing new features, and welcome suggestions, critiques and feedback!</p>
                            </div>

                        </div>
                        @if (Auth::check())
                        <div class="text-centre" style="text-align:center; ">
                            <a href="{{ url('/dashboard') }}"><button type="button" class="btn btn-primary" style="font-size: 160%;"><i class="fa fa-fw fa-sign-in"></i> Go to Dashboard</button></a>                     
                        </div>
 

                        @else

                        <div class="text-centre" style="text-align:center; ">
                            <a href="{{ url('/login') }}"><button type="button" class="btn btn-primary" style="font-size: 160%;"><i class="fa fa-fw fa-sign-in"></i> Login</button></a>
                            <a href="{{ url('/register') }}"><button type="button" class="btn btn-primary" style="font-size: 160%;"><i class="fa fa-fw fa-sign-out"></i> Register</button></a>
                        
                        </div>
                       

                        @endif

                        <div style="margin-top: 70px;">
                            <h1 class="text-center" style="color:#ffffff;">
                                Features
                            </h1>                      

                            <div class="welcomeText row" style="text-align: center;">

                                <div class="col-lg-3">
                                    <i class="ra ra-helmet ra-4x"></i><h3>Character Creater</h3>
                                </div>

                                <div class="col-lg-3">
                                    <i class="ra ra-scroll-unfurled ra-4x"></i><h3>Campaign Manager (WIP)</h3>
                                </div>

                                <div class="col-lg-3">
                                    <i class="ra ra-crown ra-4x"></i><h3>Real-time Loot (WIP)</h3>
                                </div>

                                <div class="col-lg-3">
                                    <i class="ra ra-dragon ra-4x"></i><h3>NPC & Moster Manager (WIP)</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

