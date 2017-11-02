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
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <style>
        .overflow-fix {
            height: auto;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div>

    @include('components.header')

    {{--@if (Route::has('login'))--}}
        {{--<div class="top-right links">--}}
            {{--<a href="{{ url('/home') }}">Applications</a>--}}
            {{--@auth--}}
                {{--<a href="{{ url('/home') }}">Home</a>--}}
                {{--@else--}}
                    {{--<a href="{{ route('login') }}">Login</a>--}}
                    {{--<a href="{{ route('register') }}">Register</a>--}}
                    {{--@endauth--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class="container content">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif

        @yield('content')
    </div>


    @yield('scripts')

    <script type="text/javascript" src="{{asset('vendor/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/bootstrap/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
</div>
</body>
</html>
