<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{mix('css/app.css')}}" rel="stylesheet">

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

    @include('components.footer')

    @yield('scripts')

    <script type="text/javascript" src="{{asset('vendor/jquery/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    {{--<script src="https://d3js.org/d3.v4.min.js"></script>--}}
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script type="text/javascript" src="{{mix('js/app.js')}}"></script>
</div>
</body>
</html>
