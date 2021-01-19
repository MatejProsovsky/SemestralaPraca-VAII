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
    <style>
        body {
            background-color: black;
            overflow-x: hidden;
        }
    </style>
</head>
<body onload="menuBar()" onresize="menuBar()">
<img src=<?= asset('/transp.png') ?> alt="nice" style="left: 70vw;width: 30vw;position: absolute;top: 120px;color: cyan">
<img src=<?= asset('/transpR.png') ?> alt="nice" style="left: 70vw;width: 30vw;position: absolute;top: 350px;color: cyan">
<img src=<?= asset('/transp.png') ?> alt="nice" style="left: 70vw;width: 30vw;position: absolute;top: 650px;color: cyan">
<img src=<?= asset('/transpR.png') ?> alt="nice" style="left: 70vw;width: 30vw;position: absolute;top: 1000px;color: cyan">

<div class="menu">
        <nav class="menu2">
                <a href="{{ route('menu.welcome') }}" class="menuText" style="border: 1px solid cyan">
                    DOMOV
                </a>
                <a href="{{ route('menu.cpu') }}" class="menuText" style="border: 1px solid cyan">
                    CPU&MB
                </a>
                <a href="{{ route('menu.gpu') }}" class="menuText" style="border: 1px solid cyan">
                    GPU
                </a>
                <a href="{{ route('menu.memory') }}" class="menuText" style="border: 1px solid cyan">
                    PAMÄTE
                </a>
                <a href="{{ route('menu.ntb') }}" class="menuText" style="border: 1px solid cyan;font-size: 20px ">
                    NOTEBOOKY
                </a>
                <a href="{{ route('menu.smart') }}" class="menuText" style="border: 1px solid cyan;font-size: 18px ">
                    SMARTPHÓNY
                </a>
                <a href="{{ route('menu.others') }}" class="menuText" style="border: 1px solid cyan">
                    OSTATNÉ
                </a>
                <a href="https://github.com/MatejProsovsky/MatejProsovsky.github.io" class="menuText" style="border: 1px solid cyan">
                    <img src=<?= asset('/git.png') ?> alt="git" style="width: 50px">
                </a>

            <div class="menuline"></div>
        </nav>

    </div>
</div>


<div class="popUpMenuButtom" style="width: 50px" >
        <a onclick="popUpMenu()" onresize="menuBar()">
            <img src=<?= asset('/menuButton.PNG') ?> alt="HTML"
                 style="width: 45px;height:45px;top: 0px;position: absolute;cursor: pointer">
        </a>
</div>
<nav class="navbar navbar-inverse justify-content-end" style="font-size: 20px">
    @guest
        @if (Route::has('login'))
            <a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span>{{ __('Prihlásiť←') }}</a>
        @endif

        @if (Route::has('register'))
            <a href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span>{{ __('| Zaregistrovať |') }}</a>
        @endif
    @else
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{\Illuminate\Support\Facades\Auth::user()->name}}
            </button>
            <div class="dropdown-menu" style="left:-6vw" aria-labelledby="dropdownMenuButton">
                @auth
                    @if (\Illuminate\Support\Facades\Auth::user()->name == 'admin')
                        <a class="dropdown-item" style="color: black" href="{{ route('user.index') }}">{{ __('Užívatelia') }}</a>
                    @endif
                @endauth
                    @auth
                        <a class="dropdown-item" style="color: black" href="{{ route('post.create') }}">{{ __('Pridať článok') }}</a>
                    @endauth
                    @auth
                        <a class="dropdown-item" style="color: black" href="{{ route('user.profile') }}">{{ __('Profil') }}</a>
                    @endauth
                    <a class="dropdown-item" style="color: black" href="{{ route('menu.welcome') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Odhlásiť') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
        </div>



    @endguest
</nav>



<div class="popUpMenu" >
    <nav class="popUpMenu2">
        <a href="{{ route('menu.welcome') }}" class="menuText">
            DOMOV
        </a>
        <a href="{{ route('menu.cpu') }}" class="menuText">
            CPU&MB
        </a>
        <a href="{{ route('menu.gpu') }}" class="menuText">
            GPU
        </a>
        <a href="{{ route('menu.memory') }}" class="menuText">
            PAMÄTE
        </a>
        <a href="{{ route('menu.others') }}" class="menuText">
            OSTATNÉ
        </a>
        <a href="https://github.com/MatejProsovsky/MatejProsovsky.github.io" class="menuText">
            <img src=<?= asset('/git.png') ?> alt="git" style="width: 100px">
        </a>
    </nav>


</div>
<main class="py-4">
    @yield('content')
</main>

</body>
</html>
