<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('admin-logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @else
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('user-logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @endif
                            </li>
                            @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card h2 text-center">
                            <div class="card-header bg-primary text-light">{{ __('Admin Dashboard') }}</div>

                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                </div>
                                    @endif

                                    {{ __('You are logged in!') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

<br>
<br>
<br>
<div class="container">
        <h1>List of User Profiles</h1>

        <br>
        <br>
        <div id="message"></div>
        <table class="table table-bordered h2">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
               </tr> 
            </thead>
            <tbody>
               @foreach($users as $user)
                  <tr>
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->email }}</td>
                     <td>
                     <label class="switch">
                        <input id="{{$user->id}}" type="checkbox"
                                {{ $user->status ? 'checked' : '' }}
                                onclick="changeStatus(event.target, {{ $user->id }});">
                                <span class="slider round"></span>
                    </label>
                        <style>
                        .switch {
                            position: relative;
                            display: inline-block;
                            width: 110px;
                            height: 34px;
                            }

                            .switch input {
                                opacity: 0;
                                width: 0;
                                height: 0;
                            }

                            .slider {
                                position: absolute;
                                cursor: pointer;
                                top: 0;
                                left: 0;
                                right: 0;
                                bottom: 0;
                                background-color: #ccc;
                                -webkit-transition: .4s;
                                transition: .4s;
                                }

                            .slider:before {
                                position: absolute;
                                content: "";
                                height: 26px;
                                width: 26px;
                                left: 4px;
                                bottom: 4px;
                                background-color: white;
                                -webkit-transition: .4s;
                                transition: .4s;
                                }

                            input:checked + .slider {
                                background-color: #2196F3;
                                }

                            input:focus + .slider {
                                box-shadow: 0 0 1px #2196F3;
                                }

                            input:checked + .slider:before {
                                -webkit-transform: translateX(26px);
                                -ms-transform: translateX(26px);
                                transform: translateX(26px);
                                }

                            .slider.round {
                                border-radius: 34px;
                                }

                            .slider.round:before {
                                border-radius: 50%;
                                }

                                /*------ ADDED CSS ---------*/
                            .slider:after {
                                content:'Inactive';
                                color: black;
                                display: block;
                                position: absolute;
                                transform: translate(-50%,-50%);
                                top: 50%;
                                left: 75%;
                                font-size: 13px;
                                
                                        }

                            input:checked + .slider:after {  
                                content:'Active';
                                color: white;
                                        }
                       
                        </style>   
                     </td>
                  </tr>
               @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>

<script>
function changeStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '{{route("change.status")}}',
        type: 'POST',
        data: {
            _token: _token,
            id: id,
            status: status 
        },
        success: function(data){
            if (data.type == "error") {
                $('#message').html("<div class='alert alert-danger card h2'>"+data.fail+"</div>");} 
                else {
                    $('#message').html("<div class='alert alert-success card h2'>"+data.success+"</div>");
}}
    });
}

</script>