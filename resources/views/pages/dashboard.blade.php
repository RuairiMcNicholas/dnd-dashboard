@extends('layouts.master')

@section('content')


<script type="text/javascript">
  
$(window).on('load', function(){ 

console.log($charNum);
console.log($characters);

})



</script>


       <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


                     @if (Auth::check())
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like D&D Dashboard?</strong> Donate me all ur moniez on PayPal - BitCoin also accepted c: 
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="ra ra-helmet ra-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ $charNum }}</div>
                                        <div>Characters</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./characters">
                                <div class="panel-footer">
                                    <span class="pull-left">View Characters</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="ra ra-scroll-unfurled ra-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">1</div>
                                        <div>Campaigns</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./campaigns">
                                <div class="panel-footer">
                                    <span class="pull-left">View Campaigns</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="ra ra-death-skull ra-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">0</div>
                                        <div>Monsters</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Monsters</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="ra ra-daisy ra-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">42</div>
                                        <div>Daisies</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Daisies</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
               

                
                </div>
                 <!-- /.row -->


            @else
            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Login & Register</small>
                        </h1>

                            <p>Welcome to the D&D Dashboard. Nothing works properly, features are missing and/or buggy, pages aren't mobile responsive, the whole thing is just fucked really. But hey, isn't everything? 
                            <br> If you're so inclined, you can login or register below. Notice how this is the 6th time "Login" & "Register" appear together on one page. I really haven't a goddamn clue.</p><br>

                            <a href="{{ url('/login') }}"><button type="button" class="btn btn-primary">Login</button></a>
                            <a href="{{ url('/register') }}"><button type="button" class="btn btn-primary">Register</button></a>
                    </div>
                </div>
            @endif


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    @endsection