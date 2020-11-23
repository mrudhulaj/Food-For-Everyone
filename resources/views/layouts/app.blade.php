<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    /* .header .header-top {
        background: #01d262 none repeat scroll 0 0;
        height: 50px;
    }

    .contact>p {
        line-height: 50px;
        margin: 0;
        padding: 0;
    }

    .header .header-top .contact p span {
        margin-right: 45px;
    }

    .header .header-top .contact p a {
        color: #fff;
        font-size: 14px;
        font-weight: 400;
        text-decoration: none;
        font-family: 'Roboto', sans-serif;
    }

    .join-us>p {
        background: #089549 none repeat scroll 0 0;
        line-height: 50px;
        margin: 0;
        padding: 0;
    }

    .header .header-top .join-us p a {
        background: #089549 none repeat scroll 0 0;
        color: #fff;
        float: right;
        font-size: 15px;
        font-weight: 500;
        padding: 0 40px;
        text-decoration: none;
        font-family: 'Roboto', sans-serif;
    }

    .header .header-bottom .menu ul {
    float: right;
}
.header .header-bottom .menu {
    margin: 34px 0;
}

.nav > li {
    position: relative;
    display: block;
}

.header .header-bottom .menu ul li a {
    color: #000;
    font-family: "Roboto", sans-serif;
    font-size: 15px;
    font-weight: 400;
    margin-right: 0;
    padding-left: 40px;
    padding-right: 0;
}

.main-logo {
    margin: 29px 0;
}

.main-logo>img {
    display: inline-block;
}

.main-logo>h2 {
    display: inline-block;
    font-size: 20px;
    font-weight: bold;
    margin-left: 11px;
    color: #01d262;
} */

</style>

<body>
    <div id="app">
        {{--  <header class="header">
            <section class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="contact">
                                <p><span class="phone join-us"><a href="#">Phone: +91 9998881111</a></span><span
                                        class="email join-us"><a href="#">Email: info@foodforeveryone.com</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="header-bottom">
              <div class="container">
                  <div class="row">
                      <div class="col-md-3 col-sm-12 col-xs-12">
                          <a href="#">
                              <div class="main-logo">
                                  <img src="{{ url('images/mainLogo.png') }}" width="50"
                                      height="50">
                                  <h2>Food For Everyone</h2>
                              </div>
                          </a>
                      </div>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                          <div class="menu">
                              <ul class="nav navbar-nav">
                                  @php
                                      $activeTab = Session::get('activeTab');
                                  @endphp
                                  <li class=" @if($activeTab == 'HOME') active-nav @endif ">
                                      <a href="{{ route('home') }}">HOME</a>
                                  </li>
                                  <li class=" @if($activeTab == 'ABOUT US') active-nav @endif">
                                      <a href="{{ route('aboutUs') }}">ABOUT US</a>
                                  </li>
                                  <li class=" @if($activeTab == 'AVAILABLE FOODS') active-nav @endif ">
                                      <a href="{{ route('availableFoods') }}">AVAILABLE FOODS</a>
                                  </li>
                                  <li class=" @if($activeTab == 'CAUSES') active-nav @endif ">
                                      <a href="{{ route('causesView') }}">CAUSES</a>
                                  </li>
                                  <li class=" @if($activeTab == 'VOLUNTEERS') active-nav @endif ">
                                    <a href="{{route('volunteers')}}">VOLUNTEERS </a>
                                  </li>
                                  <li class=" @if($activeTab == 'EVENTS') active-nav @endif ">
                                    <a href="{{route('events')}}">EVENTS</a>
                                  </li>
                                  <li class=" @if($activeTab == 'CONTACT') active-nav @endif ">
                                      <a href="{{ route('contactUs') }}">CONTACT</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
        </header>  --}}
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('images/mainLogo.png') }}" width="30" height="30">
                    Food For Everyone
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" style="display: none;">
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
    </div>
</body>
</html>
