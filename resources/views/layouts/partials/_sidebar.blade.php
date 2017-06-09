<style type="text/css">
    
    .side-nav>li>ul>li>a {
    display: block;
    padding: 10px 15px 10px 38px;
    text-decoration: none;
    color: #000000 ;
}

.side-nav>li>ul>li>a:hover {
    color: #fff ;
}

.dropdown i:hover {
    color: #ffffff !important;
}

</style>


<div class="collapse navbar-collapse navbar-ex1-collapse">
            @if (Auth::check())
                <ul class="nav navbar-nav side-nav " data-hover="dropdown">
                    <li class="{{Request::path() == 'dashboard' ? 'active' : ''}}">
                        <a href="./dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    

                    <li class="dropdown {{Request::path() == 'characters' ? 'active' : ''}} {{Request::path() == 'create-character' ? 'active' : ''}}">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/dndlaravel/dndlaravel/public/characters"><i class="ra ra-helmet ra-fw"></i> Characters</a>

                         <ul class="dropdown-menu">
                            <li>
                                <a href="/dndlaravel/dndlaravel/public/characters" class="dropdown-item" ><i style="padding-right: 3px;" class="ra ra-helmet ra-fw"></i>List</a>
                            </li>

                            <li>
                                <a href="/dndlaravel/dndlaravel/public/create-character" class="dropdown-item" ><i style="padding-right: 3px;" class="ra ra-health ra-fw"></i>Create</a>
                            </li>

                            <li>
                                <a href="/dndlaravel/dndlaravel/public/deleted-characters" class="dropdown-item" ><i style="padding-right: 3px;" class="ra ra-skull ra-fw"></i>View Deleted</a>
                            </li>
 
                        
                         </ul>

                    </li>



                    
                    <li class="{{Request::path() == 'campaigns' ? 'active' : ''}}">
                        <a href="./campaigns"><i class="ra ra-scroll-unfurled ra-fw"></i> Campaigns</a>
                    </li>

                
                @if (Auth::user()->admin == 1)   
             
                    <li class="{{Request::path() == 'campaigns' ? 'active' : ''}}">
                        <a href=""><i class="fa fa-fw fa-database"></i> Admin Panel  </a>
                    </li>

                @else
                
                @endif    

                </ul>

                @else

                <ul class="nav navbar-nav side-nav">
                    <li class="{{Request::path() == 'campaigns' ? 'active' : ''}}">
                        <a href="./dashboard"><i class="fa fa-fw fa-dashboard"></i>Login/Register</a>
                    </li>
                @endif

            </div>
            <!-- /.navbar-collapse -->
        </nav>