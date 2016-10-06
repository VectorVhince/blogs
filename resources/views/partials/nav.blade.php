<div class="container">
    <div class="text-center wd100P">
        <img src="{{ asset('/img/hau_logo.png') }}" class="dp-bl center-block hidden">
        <span class="fs40 fc-red">THE ANGELITE</span>
    </div>
    <nav class="navbar navbar-default navbar-static-top bgc-maroon bd-rad5">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand fc-white fs30 mgt-5" href=" {{ url('/') }} ">
                <i class="glyphicon glyphicon-home"></i>
            </a>
        </div>

        <div class="collapse navbar-collapse pdh15" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href=" {{ route('news.index') }} " class="fc-white fs17 pdh5">NEWS</a></li>
                <li><a href=" {{ route('opinion.index') }} " class="fc-white fs17 pdh5">OPINION</a></li>
                <li><a href=" {{ route('features.index') }} " class="fc-white fs17 pdh5">FEATURES</a></li>
                <li><a href=" {{ route('editors.index') }} " class="fc-white fs17 pdh5">EDITOR'S NOTE</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                    <li class="mgr10">
                        <div class="search-group">
                            <span class="search-icon"><i class="glyphicon glyphicon-search"></i></span>
                            <input type="text" name="" class="form-control search-input" placeholder="Search..">
                            <button class="search-btn">Search</button>
                        </div>
                    </li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" class="fc-white">Login</a></li>
                    <li><a href="{{ url('/register') }}" class="fc-white">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle fc-white" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('posts.index') }}">Posts</a></li>
                            <li><a href="{{-- route('guardians.index') --}}">Golden Guardians</a></li>
                            <li><a href="{{-- route('guardians.index') --}}">Announcements</a></li>
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