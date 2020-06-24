<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Sunbnb</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/a4b239dea5.js" crossorigin="anonymous"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @toastr_css
</head>
<body>
    {{-- <div id="app"> --}}
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('sunbnb/') }}">
                SunBnb
            </a>

            {{-- add navigation bar --}}
            <form action="/search" method="GET" class="form-inline" >
                <input class="form-control mr-sm-2" type="text" name="name" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

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
                        @if(Auth::user())
                            <li class="nav-item dropdown">
                                <a href="/sunbnb/listing/createroom" class="btn btn-primary">
                                    Become a Host
                                </a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                {{-- add here --}}
                                <a class="dropdown-item" href="/sunbnb/user/managelisting">Manage Listings</a>

                                <a class="dropdown-item" href="/sunbnb/user/reservation">Reservations</a>

                                <a class="dropdown-item" href="/sunbnb/user/trip">Your Trips</a>

                                <a class="dropdown-item" href="/sunbnb/user/editprofile">Edit Profile</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
    {{-- </div> --}}
    @jquery
    @toastr_js
    @toastr_render
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    @yield('script')
    <script type="text/javascript">
    $(function(){
        if($('#slider').length){
            console.log('there');
        }
    });
    </script>
  
  <script type="text/javascript">
    jQuery( function() {
    $( "#slider" ).slider();
  } );
  $(function() {
    // 2スライダーを適用
  ('#slider').slider(
        min: 0,
        max: 100,
        step: 2,
        range: true,
        // 2初期値（配列指定）
        values: [10, 70],
        // 3スライダー変更時／初期化時の処理
        change: function(e, ui) {
        $('#min').val(ui.values[0]);
        $('#max').val(ui.values[1]);
        },
        create: function(e, ui) {
        var values = $(this).slider('option', 'values')
        $('#min').val(values[0]);
        $('#max').val(values[1]);
        }
    );
  });
  </script>
</body>
</html>
