@extends ('layout')

@section ('content')

<div class="menu visible-md visible-lg">
    <div class="top_bg">
        <div class="wrap">
            <div class="container">
                <div class="homepage-title">HBKFit</div>
                <div class="homepage-subtitle">Explore the Experience</div>
                <div class="clear"></div>
        </div>  
    </div>
</div>
      
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul id="menu-list">
        <li class="active"><a href="http://127.0.0.1:8000/">Home</a></li>
        <li class=""><a href="http://127.0.0.1:8000/thread">Forum</a></li>
        <li class=""><a href="http://127.0.0.1:8000/contact">Contact</a></li>
      </ul>
      @if (Route::has('login'))
      <ul id="menu-list">
      @auth
      <li><a href="{{ url('/home') }}">Dashboard</a></li>
      @else
        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>
        @if (Route::has('register'))
        <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
        @endif
      @endauth
      </ul>
      <ul id="menu-list">
        <li><a href="http://127.0.0.1:8000/admin">Admin</a></li>
      </ul>
      @endif
    </div>
    </div>
           
@endsection