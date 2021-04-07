<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Food For Everyone</title>
    <link rel="icon" href="{{ url('images/mainLogo.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/feedkeralahome.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/responsive.css') }}">
    <link href="{{ url('css/form.css') }}" rel="stylesheet" media="all">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <section class="header-top">
                <div class="container pright-0" style="width: 100%">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="contact">
                                <p><span class="phone join-us"><a href="#">Phone: +91 9998881111</a></span><span
                                        class="email join-us"><a href="#">Email: info@foodforeveryone.com</a></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4" style="text-align: end;">
                            <div class="join-us">
                                <p>

                                    @guest
                                        <a href="{{ route('login') }}">
                                            @if($activeTab == 'LOGIN')
                                                <a href="{{ route('home') }}">Home</a>
                                            @else
                                                Sign Up / Login
                                            @endif
                                        </a>
                                    @else
                                        <div class="dropdown" style="height: 50px;">
                                            <button class="dropdown-toggle cust-login-btn" type="button"
                                                data-toggle="dropdown">
                                                <div style="width: 100%;" class="col-lg-12">
                                                    <i style="font-size: 20px;" class="fa fa-user-circle-o"
                                                        aria-hidden="true"></i>
                                                    {{ Auth::user()->FirstName }}
                                                    <span class="caret"></span>
                                                </div>
                                            </button>
                                            <ul class="dropdown-menu" id="dmenu">
                                                <li class="cust-login-li">
                                                    <a class="dropdown-item"
                                                        href="{{ route('editProfileView') }}">
                                                        Profile
                                                    </a>
                                                </li>
                                                <li class="cust-login-li" style="border-top: 1px solid #00A348;">
                                                    <a class="dropdown-item"
                                                        href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                    <form id="logout-form"
                                                        action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endguest
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <div class="container" style="min-height: 500px;">
            <div style="text-align: center;margin-top: 150px">
                <div class="main-logo">
                    <img src="{{ url('images/mainLogo.png') }}" width="50" height="50">
                    <h2>Food For Everyone</h2>
                </div>
                <h4>Sorry, we have encountered an error!</h4>
                <div class="col-md-12" style="display: flex;justify-content: center;margin-top: 30px">
                    <button type="button" class="button-bg-green btn btn-primary"
                        style="padding: 0px;width: 15%;height: 40px;margin-right: 15px">
                        <a class="a-none" href="{{ route('home') }}">
                            Home
                        </a>
                    </button>
                </div>
            </div>
        </div>
</body>

</html>
