<div class="collapse navbar-collapse navbar-ex1-collapse">
            @if (Auth::check())
                <ul class="nav navbar-nav side-nav">
                    <li class="{{Request::path() == 'dashboard' ? 'active' : ''}}">
                        <a href="./dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>


                    <li class="{{Request::path() == 'characters' ? 'active' : ''}} {{Request::path() == 'create-character' ? 'active' : ''}}">
                        <a href="/dndlaravel/dndlaravel/public/characters"><i class="ra ra-helmet ra-fw"></i> Characters</a>

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