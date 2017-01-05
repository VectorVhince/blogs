<div class="wd100P mgt40">
    <div class="wd100P mgv20 bgc-red" style="height: 100px;">
        <div class="container">
            <a href=" {{ url('/') }} ">
                <div style="row">
                    <div class="col-xs-1 pdl0">
                        <img src="{{ asset('/img/TheAngelite.png') }}" style="height: 150px; margin-top: -30px; margin-left: -50px;">                
                    </div>
                    <div class="fc-white col-xs-4 pdh0 mgv15">
                        <span class="dp-bl"  style="font-size: 50px; font-family: arongrotesque">
                            THE ANGELITE
                        </span>
                        <span class="dp-bl" style="font-style: italic; font-size: 15px;">
                            The Official Student Publication of Holy Angel University
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="container pdh0">
    <nav class="navbar navbar-default navbar-static-top bgc0 bd0">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="fs17 pdh20"><a class="fc-black" href=" {{ route('news.index') }} ">NEWS</a></li>
                <li class="fs17 pdh20"><a class="fc-black" href=" {{ route('editorial.index') }} ">EDITORIAL</a></li>
                <li class="fs17 pdh20"><a class="fc-black" href=" {{ route('opinion.index') }} ">OPINION</a></li>
                <li class="fs17 pdh20"><a class="fc-black" href=" {{ route('feature.index') }} ">FEATURE</a></li>
                <li class="fs17 pdh20"><a class="fc-black" href=" {{ route('humor.index') }} ">HUMOR</a></li>
                <li class="fs17 pdh20"><a class="fc-black" href=" {{ route('sports.index') }} ">SPORTS</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                    <li class="mgr10 pdv10">
                        <form action="{{ route('search') }}" method="get">
                            <div style="display: flex;">
                                <input type="text" name="search" class="form-control dp0 input-sm" placeholder="Search.." style="flex: 1;" id="searchInput">
                                <button type="submit" class="hidden">Submit</button>
                                <span class="mgr20 mgl10 pdv5" id="searchIcon"><i class="glyphicon glyphicon-search pointer"></i></span>
                            </div>
                        </form>
                    </li>
                @if (Auth::guest())
                    <li class="mg15 hidden"><a href="{{ url('/login') }}" class="pdv0 pdh15 mgh15 bdb0"><button class="btn-red-o bd-rad10 fc-white pd15"><i class="glyphicon glyphicon-user"></i> Log In</button></a></li>
                    <li class="hidden"><a href="{{ url('/register') }}" class="fc-black">Register</a></li>
                @else
                    <li class="dropdown mgr15 hidden">
                        <a href="#" class="dropdown-toggle fc-black" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('create') }}">Add New Post</a></li>
                            <li><a href="{{ url('create/announcement') }}">Make Announcement</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>        
</div>
@if (Auth::user())
<div class="user-menu pointer dropdown">
    <a href="#" class="dropdown-toggle fc-black" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="glyphicon glyphicon-user fc-white"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu1" role="menu">
        <div class="box-arrow"></div>
        <li><a href="{{ url('settings') }}" style="font-weight: bold; color: #9e1e1c;">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ url('myposts') }}">My Posts</a></li>
        <li><a href="{{ url('create') }}">Add New Post</a></li>
        <li><a href="{{ url('create/announcement') }}">Make Announcement</a></li>
        <li>
            <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
@endif