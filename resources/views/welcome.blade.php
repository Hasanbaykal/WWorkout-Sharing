@extends ('layout')

@section ('content')
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
</div>

            <div class="menu visible-md visible-lg">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul id="menu-list">
                            <li class="active"><a href="http://127.0.0.1:8000/forum">Forum</a></li>
                            <li class=""><a href="http://127.0.0.1:8000/contact">Contact</a></li>
                        </ul>

       <!--     @if (Route::has('login'))
                <ul id="menu-list" class="menu-list1">
            @auth
                <li><a href="{{ url('/home') }}">Home</a></li>
            @else
                <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>
            @if (Route::has('register'))
                <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
            @endif
            @endauth
                </ul>
            @endif

            -->
@endsection