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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <div>
            <b-nav>
                <b-nav-item href="https://www.ufolepgym.com/brochure.htm">Ufolep Brochure</b-nav-item>
                <b-nav-item>FJEP Gymnastique</b-nav-item>


                @guest

                    <b-nav-item  right href="{{Route('login')}}">{{__('Login')}}</b-nav-item>
                    @if (Route::has('register'))

                        <b-nav-item right href="{{ route('register') }}">{{ __('Register') }}</b-nav-item>

                    @endif
                @else


                    <b-nav-item-dropdown text="{{ Auth::user()->name }}" right>
                        <b-dropdown-item href="{{ route('logout') }}">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </b-dropdown-item>

                    </b-nav-item-dropdown>

                @endguest



            </b-nav>
        </div>

        <div class="header" >
            <div class="title">{{ config('app.name', 'Laravel') }}</div>
            @IF( isset($title) )<div class="subtitle">{{$title}}</div>@endif
            <b-img src="https://ufolepbrochure.s3.eu-west-3.amazonaws.com/agres/anneaux.png" width="75" center alt="Responsive image"></b-img>

        </div>



        <b-container >
            @yield('content')
        </b-container>
    </div>
</body>
</html>
