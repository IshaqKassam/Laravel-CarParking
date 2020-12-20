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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                    <!-- {{__()}} -->
                </a>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                     <!-- <ul class="navbar-nav mr-auto">

                    </ul>  -->

                    <!-- Right Side Of Navbar -->
                    
                        <!-- Authentication Links -->
                        @guest
                        <!-- the login -->
                            <!-- <li class="nav-item"> -->
                                <div class="navigation">
                                <ul class="nav-links">
                                <li><a style="text-decoration:none"  href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <!-- </li> -->
                            <!-- the register -->
                            @if (Route::has('register'))
                                <!-- <li class="nav-item"> -->
                                    <li><a style="text-decoration:none" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                <!-- </li> -->
                                </ul>
                             </div>
                            @endif
                        @else
                        <ul class="status">
                            <li class="nav-item dropdown">
                                <!-- the username -->
                                <a id="navbarDropdown" class="reg" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <!-- the logout -->
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        @include('flash-message')
            @yield('content')
        </main>
    </div>
</body>
</html>
