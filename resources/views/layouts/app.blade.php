<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- <script src=“https://js.pusher.com/3.2/pusher.min.js“></script>s -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- <script src="{{ asset('js/fontawesome.js') }}"></script> -->
    <!-- <script src=“https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js></script> -->
    <!-- <script src="./push.min.js"></script> -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('style')
    <style>
        .navbar {
            background-color: #FFBA08;
        }
        a.white:link {
            color : #ffffff;
        }
        a.white:visited {
            color : #ffffff;
        }
        a.white:hover {
            color : #ffffff;
        }
        a.white:active {
            color : #ffffff;
        }
        .font-size{
            font-size: 10px;
        }
        .bg-menu{
            background-color: #370617;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                    @yield('navtitle')
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
                            <li class="nav-item pr-3">
                                    {{ Auth::user()->name }} 様
                            </li>
                            <li class="nav-item ">
                                    <a class="nav-link p-0" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウトする
                                    </a>
                            </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
            @yield('script')
    </div>
</body>
    <div class="pt-5">
        <nav class="nav nav-pills nav-justified fixed-bottom bg-menu">
            <a class="white nav-item nav-link font-size" href="/user/top"><i class="fas fa-home"></i><p>ホーム</p></a>
            <a class="white nav-item nav-link font-size" href="/user/favorite"><i class="fas fa-heart"></i><p>お気に入り</p></a>
            <a class="white nav-item nav-link font-size" href="/user/userchatselect"><i class="fas fa-comments"></i><p>チャット</p></a>
            <a class="white nav-item nav-link font-size" href="/user/reservationcheck"><i class="fas fa-clipboard-check"></i><p>予約確認</p></a>
            <a class="white nav-item nav-link font-size" href="#"><i class="fas fa-user-alt"></i><p>マイページ</p></a>
        </nav>
    </div>
</div>
</html>
