<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet"/>
    <link href="{{asset('bootstrap/css/bootstrap-theme.css')}}" rel="stylesheet"/>

    <style>
        .overflow-fix {
            height: auto;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/home') }}">Applications</a>
            @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    @endauth
        </div>
    @endif

    <div class="container content">
        <div class="page-header overflow-fix">
            <span class="col-md-6"><h1>Empatica</h1></span>
            <span class="col-md-6">
                <nav class="navbar">
                    <ul class="navbar">
                        <li><a href="{{ url('/home') }}">Applications</a></li>
                    </ul>
                </nav>
            </span>
        </div>

        @yield('content')
    </div>


    @yield('scripts')

    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</div>
</body>
</html>
