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
    <!-- <script src=“https://js.pusher.com/3.2/pusher.min.js“></script>s -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- <script src=“https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js”></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/a_Invalid.css') }}" rel="stylesheet">

    <style>

    </style>

    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    EatingApp
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
                        @auth('admin')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        @auth('admin')
        <div class="row container-fluid p-0" > 
            <div class="col-2">
            <div class="sidebar-sticky bg-white border ">
            <h5 class="pl-4 pt-4">{{ Auth::guard('admin')->user()->name }}様</h5>
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link active" href="/admin/top">
                    <i class="fas fa-home fa-2x fa-fw"></i>
                      <!-- Dashboard <span class="sr-only">(current)</span> -->
                      ホーム <span class="sr-only">(現在位置)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/chart">
                    <i class="fas fa-chart-bar fa-2x fa-fw"></i>
                      <!-- Orders -->
                    来店情報
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/reservation">
                    <i class="fas fa-clipboard-list fa-2x fa-fw"></i>
                      <!-- Products -->
                      予約状況
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/adminchatselect">
                    <i class="fas fa-comments fa-2x fa-fw"></i>
                      <!-- Products -->
                      チャット
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/setting">
                    <i class="fas fa-cog fa-2x fa-fw"></i>
                      <!-- Customers -->
                      設定
                    </a>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <!-- <span>Saved reports</span> -->
                  <span>EatingApp</span>
                  <a class="d-flex align-items-center text-muted" href="#">
                  </a>
                </h6>
            </div>
            </div>
            <div class="col-10">
                @yield('content')
            </div>
            @endauth
            @guest
            <div>
                @yield('content')
            </div>
            @endguest
        </div>
            @yield('script')
    </div>
</body>
</html>
