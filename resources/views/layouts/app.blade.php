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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Authentication Links -->
                        @guest
                            <div class="navigation">
                                <ul class="nav-links">
                                        <li><a style="text-decoration:none "  href="{{ route('login') }}">
                                            {{ __('Login') }}</a>
                                        </li>                         
                                            @if (Route::has('register'))    
                                        <li><a style="text-decoration:rgb(241, 175, 113)" href="{{ route('register') }}">
                                            {{ __('Register') }</a>
                                        </li>                              
                                </ul>
                            </div>
                                            @endif
                        @else
                <div class="navigation">
                    <ul class="nav-links">
                            <li>
                                <!-- the username -->
                                    <a id="navbarDropdown" class="reg" href="#" role="button" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                <!-- the logout -->
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                                    class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
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
